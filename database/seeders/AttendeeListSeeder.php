<?php

namespace Database\Seeders;

use App\Models\Attendee_list;
use Illuminate\Database\Seeder;
use Faker;

class AttendeeListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 20; $i++) {
            Attendee_list::create([
                'invitation_id' => mt_rand(1, 5),
                'name' => $faker->name(),
                'address' => $faker->address(),
            ]);
        }
    }
}
