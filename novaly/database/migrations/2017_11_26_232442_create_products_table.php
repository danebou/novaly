<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /** @var string */
    const TABLENAME = 'products';

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
            $table->decimal('list_price', 13, 2)->default(0.00);
            $table->decimal('discount', 5, 2)->default(0.00);
            $table->tinyInteger('active')->default(1);
            $table->unsignedInteger('quantity')->default(0);
            $table->text('description');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on(CreateUsersTable::TABLENAME);
            $table->unsignedInteger('product_category_id');
            $table->foreign('product_category_id')->references('id')->on(CreateProductCategoriesTable::TABLENAME);
            $table->timestamps();
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
