<?php

namespace Database\Seeders;

use App\Models\Access;
use App\Models\AccessUser;
use App\Models\Room;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class StarterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 5; $i++) {
            $name = fake()->city();
            Room::create(
                [
                    'name' => $name,
                    'slug' => Str::slug($name),
                    'ip_address' => 'ip-' . $i,
                ]
            );
        }
        $room = Room::all()->pluck('id');

        $arr_room = $room->all();
        for ($i = 0; $i < 20; $i++) {
            $name = fake()->city();
            $dateTime = Carbon::today()->subDays(rand(0, 179))->addSeconds(rand(0, 86400));
            Access::create(
                [
                    'name' => $name,
                    'day' => $dateTime->format('l'),
                    'start_at' => $dateTime->format('H:i:s'),
                    'end_at' => $dateTime->addHour()->format('H:i:s'),
                    'unique_key' => fake()->ean13(),
                    'slug' => Str::slug($name),
                    'room_id' => $arr_room[rand(0, count($arr_room) - 1)],
                ]
            );
        }
        $access = Access::all()->pluck('id');
        $arr_access = $access->all();
        $user = User::where('role_id', '=', 2)->get()->pluck('id');
        $arr_user = $user->all();
        for ($i = 0; $i < count($access) - 1; $i++) {
            AccessUser::create(
                [
                    'user_id' => $arr_user[rand(0, count($arr_user) - 1)],
                    'access_id' => $arr_access[rand(0, count($arr_access) - 1)],
                ]
            );
        }
    }
}
