<?php

use App\Entities\User;
use App\Entities\UserType;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'given_name' => 'testBuyer',
            'family_name' => 'test',
            'email' => 'buyer@test.com',
            'password' => bcrypt('secret'),
            'user_type_id' => UserType::BUYER_ID,
        ]);

        User::create([
            'given_name' => 'testVendor',
            'family_name' => 'test',
            'email' => 'vendor@test.com',
            'password' => bcrypt('secret'),
            'user_type_id' => UserType::VENDOR_ID,
        ]);

        User::create([
            'given_name' => 'testAdmin',
            'family_name' => 'test',
            'email' => 'admin@test.com',
            'password' => bcrypt('secret'),
            'user_type_id' => UserType::ADMIN_ID,
        ]);

        factory(User::class, 50)->create();
    }
}
