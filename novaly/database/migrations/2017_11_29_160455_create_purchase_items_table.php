<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseItemsTable extends Migration
{
    /** @var string */
    const TABLENAME = 'purchase_items';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLENAME, function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('unit_cost', 13, 2);
            $table->integer('quantity');
            $table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('id')->on(CreateProductsTable::TABLENAME);
            $table->unsignedInteger('purchase_order_id');
            $table->foreign('purchase_order_id')->references('id')->on(CreatePurchaseOrdersTable::TABLENAME);
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['product_id', 'purchase_order_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(self::TABLENAME);
    }
}
