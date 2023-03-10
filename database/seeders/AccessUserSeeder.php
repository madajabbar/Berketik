<?php

namespace Database\Seeders;

use App\Models\Access;
use App\Models\AccessUser;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccessUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $access = Access::all()->pluck('id');
        $arr_access = $access->all();
        $user = User::where('role_id','=',2)->get()->pluck('id');
        $arr_user = $user->all();
        for($i=0; $i<count($access)-1; $i++){
            AccessUser::create(
                [
                    'user_id' => $arr_user[rand(0,count($arr_user)-1)],
                    'access_id' => $arr_access[rand(0,count($arr_access)-1)],
                ]
            );
        }
    }
}
