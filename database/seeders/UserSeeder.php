<?php

namespace Database\Seeders;



use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Modules\User\src\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<20;$i++){
            $user = new User();
            $user->name = "Thương";
            $user->email = "thuongx1".$i."bg@gmail.com";
            $user->password = Hash::make("123456789");
            $user->group_id = 1;
            $user->save();
        }

    }
}
