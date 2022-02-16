<?php

namespace Database\Seeders;

use App\Models\Guest_book;
use Illuminate\Database\Seeder;
use Faker;

class GuestBookSeeder extends Seeder
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
            Guest_book::create([
                'invitation_id' => mt_rand(1, 5),
                'name' => $faker->name(),
                'message' => $faker->sentence(),
                'confirmation' => mt_rand(0, 1)
            ]);
        }
    }
}
