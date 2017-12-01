<?php

use App\Entities\PurchaseItem;
use Illuminate\Database\Seeder;

class PurchaseItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $purchaseItems = factory(PurchaseItem::class, 100)->make();

        foreach ($purchaseItems as $purchaseItem) {
            repeat: {
                try {
                    $purchaseItem->save();
                } catch (\Illuminate\Database\QueryException $e) {
                    // Try again if unique constrait failure
                    $purchaseItem = factory(PurchaseItem::class)->make();
                    goto repeat;
                }
            }
        }
    }
}
