<?php

use App\Entities\PurchaseOrder;
use Illuminate\Database\Seeder;

class PurchaseOrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PurchaseOrder::class, 50)->create();
    }
}
