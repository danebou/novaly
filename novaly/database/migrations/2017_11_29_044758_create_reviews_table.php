<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /** @var string */
    const TABLENAME = 'reviews';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLENAME, function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('id')->on(CreateProductsTable::TABLENAME);
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on(CreateUsersTable::TABLENAME);
            $table->tinyInteger('rating');
            $table->string('title');
            $table->text('text')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['product_id', 'user_id']);
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
