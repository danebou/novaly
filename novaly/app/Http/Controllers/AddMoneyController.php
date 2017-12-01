<?php

namespace App\Http\Controllers;

use App\Entities\Product;
use App\Entities\PurchaseOrder;
use App\Entities\PurchaseItem;
use Illuminate\Http\Request;

use PayPal;
use Redirect;

class AddMoneyController extends Controller
{
    private $_api_context;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->_apiContext = \Paypal::ApiContext(
            config('paypal.client_id'),
            config('paypal.secret'));

		$this->_apiContext->setConfig(config('paypal.settings'));
    }

    public function getCheckout(Request $request)
    {
        $subtotal = request('quantity') * request('unit_price');

        $product = Product::find(request('product_id'));

        $payer = \Paypal::Payer();
        $payer->setPaymentMethod('paypal');

        $amount = \Paypal:: Amount();
        $amount->setCurrency('USD');
        $amount->setTotal($subtotal);

        $transaction = \Paypal::Transaction();
        $transaction->setAmount($amount);
        $transaction->setDescription('Novaly Product: ' . $product->name);

        $redirectUrls = \Paypal::RedirectUrls();
        $redirectUrls->setReturnUrl(route('paypal.done'));
        $redirectUrls->setCancelUrl(route('paypal.cancel'));

        $payment = \Paypal::Payment();
        $payment->setIntent('sale');
        $payment->setPayer($payer);
        $payment->setRedirectUrls($redirectUrls);
        $payment->setTransactions(array($transaction));

        $response = $payment->create($this->_apiContext);
        $redirectUrl = $response->links[1]->href;

        session(['product_id' => request('product_id')]);
        session(['quantity' => request('quantity')]);
        session(['shipping_address' => request('shipping_address')]);
        session(['unit_price' => request('unit_price')]);

        return Redirect::to($redirectUrl);
    }

    public function getDone(Request $request)
    {
        $id = $request->get('paymentId');
        $token = $request->get('token');
        $payer_id = $request->get('PayerID');

        $payment = \Paypal::getById($id, $this->_apiContext);

        $paymentExecution = \Paypal::PaymentExecution();

        $paymentExecution->setPayerId($payer_id);
        $executePayment = $payment->execute($paymentExecution, $this->_apiContext);


        $purchaseOrder = PurchaseOrder::create([
            'shipping_address' => session('shipping_address'),
            'user_id' => auth()->user()->id,
        ]);

        PurchaseItem::create([
            'unit_cost' => session('unit_price'),
            'quantity' => session('quantity'),
            'product_id' => session('product_id'),
            'purchase_order_id' => $purchaseOrder->id,
        ]);

        return redirect()->route('purchase_orders.show', $purchaseOrder->id);

        // return redirect()->route('purchase_orders.store');
    }

    public function getCancel()
    {
        return view('purchase_orders.cancel');
    }
}
