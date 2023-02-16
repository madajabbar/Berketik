<?php

namespace Database\Seeders;

use App\Models\Access;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Access::create(
            [
                'name'=>'Siskom 1',
                'start_at'=>Carbon::now(),
                'end_at'=>Carbon::now(),
                'unique_key'=>'test',
                'slug'=>'Siskom-1',
                'room_id'=>1
            ]
        );
        Access::create(
            [
                'name'=>'Siskom 2',
                'start_at'=>Carbon::now(),
                'end_at'=>Carbon::now(),
                'unique_key'=>'testi',
                'slug'=>'Siskom-2',
                'room_id'=>2
            ]
        );
        Access::create(
            [
                'name'=>'Siskom 1',
                'start_at'=>Carbon::now(),
                'end_at'=>Carbon::now(),
                'unique_key'=>'testimoni',
                'slug'=>'Siskom-3',
                'room_id'=>3
            ]
        );
    }
}
