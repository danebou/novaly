<?php

use \App\Entities\ProductCategory;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductCategoriesTable extends Migration
{
    /** @var string */
    const TABLENAME = 'product_categories';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLENAME, function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('parent_category_id')->nullable();
            $table->foreign('parent_category_id')->references('id')->on(self::TABLENAME);
            $table->timestamps();
        });

        ProductCategory::Create([
            'id' => ProductCategory::GENERAL_ID,
            'name' => 'General',
        ]);
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
