<?php

use \App\Entities\User;
use \App\Entities\UserType;
use \Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Seeder;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration
{
    /** @var string */
    const TABLENAME = 'users';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLENAME, function (Blueprint $table) {
            $table->increments('id');
            $table->string('given_name');
            $table->string('family_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedInteger('user_type_id')->default(UserType::BUYER_ID);
            $table->foreign('user_type_id')->references('id')->on(CreateUserTypesTable::TABLENAME);
            $table->rememberToken();
            $table->timestamps();
        });

        User::create([
            'given_name' => 'dev',
            'family_name' => 'novaly',
            'email' => 'dev@novaly.com',
            'password' => bcrypt('password'),
            'user_type_id' => UserType::ADMIN_ID,
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
