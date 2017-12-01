<?php

use App\Entities\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // We loop this factory to allow the model to get a parent id from a previously iteration
        foreach(range(1, 20) as $index) {
            factory(ProductCategory::class)->create();
        }
    }
}
