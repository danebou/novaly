<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * @var array
     */
    protected $seeders = [
        UsersTableSeeder::class,
        ProductCategoriesTableSeeder::class,
        ProductsTableSeeder::class,
        ReviewsTableSeeder::class,
        PurchaseOrdersTableSeeder::class,
        PurchaseItemsTableSeeder::class,
        // ProductImagesTableSeeder::class,
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call($this->seeders);
    }
}
