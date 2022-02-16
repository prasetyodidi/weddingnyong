<?php

namespace Database\Seeders;

use App\Models\Design;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $this->call([
            PriceSeeder::class,
            RoleSeeder::class
        ]);
        User::create([
            'name' => 'Didi',
            'email' => 'didiprasetyo360@gmail.com',
            'role_id' => 1,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        Design::create([
            'slug' => 'design1',
            'thumb' => 'img/invitation/design/thumb/default1.jpg',
            'name' => $faker->slug()
        ]);
        Design::create([
            'slug' => 'design2',
            'thumb' => 'img/invitation/design/thumb/default2.jpg',
            'name' => $faker->slug(3)
        ]);
        \App\Models\User::factory(3)->create();
        // \App\Models\Design::factory(2)->create();
        \App\Models\Invitation::factory(5)->create();
        $this->call([
            AttendeeListSeeder::class,
            GuestBookSeeder::class
        ]);
    }
}
