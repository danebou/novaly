<?php

use \App\Entities\UserType;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTypesTable extends Migration
{
    /** @var string */
    const TABLENAME = 'user_types';

    /**
     * Runs the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLENAME, function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        UserType::create([
            'id' => UserType::BUYER_ID, 'name' => 'buyer',
        ]);
        UserType::create([
            'id' => UserType::VENDOR_ID, 'name' => 'vendor',
        ]);
        UserType::create([
            'id' => UserType::ADMIN_ID, 'name' => 'admin',
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
