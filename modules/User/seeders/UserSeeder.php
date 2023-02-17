<?php

namespace Modules\User\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Modules\User\src\Http\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "Thương";
        $user->email = "thuongx1bg@gmail.com";
        $user->password = Hash::make("123456789");
        $user->group_id = 1;
        $user->save();

    }
}
