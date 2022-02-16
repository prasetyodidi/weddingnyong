<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InvitationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => mt_rand(1, 3),
            'design_id' => mt_rand(1, 2),
            'price_id' => 1,
            'active' => now(),
            'slug' => $this->faker->slug(3),
            'cover_image' => 'img/invitation/default_cover.jpg',
            'groom_name' => $this->faker->firstName(),
            'bride_name' => $this->faker->firstName(),
            'groom_fullname' => $this->faker->name(),
            'bride_fullname' => $this->faker->name(),
            'groom_info' => $this->faker->sentence(),
            'bride_info' => $this->faker->sentence(),
            'groom_image' => 'img/invitation/default_groom.jpg',
            'bride_image' => 'img/invitation/default_bride.jpg',
            'wedding_date' => $this->faker->date(),
            'wedding_time_start' => $this->faker->time('H:i'),
            'wedding_time_end' => $this->faker->time('H:i'),
            'wedding_address' => $this->faker->address(),
            'wedding_venue' => 'Gedung sapta Pesona',
            'reception_date' => $this->faker->date(),
            'reception_time_start' => $this->faker->time('H:i'),
            'reception_time_end' => $this->faker->time('H:i'),
            'reception_address' => $this->faker->address(),
            'reception_venue' => 'Gelora Bung Karno',
            'embed_maps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15825.788301232687!2d109.232269639254!3d-7.415670887246134!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e655e84ad3c0569%3A0x2cfa539df756942c!2sJava%20Heritage%20Hotel%20Purwokerto!5e0!3m2!1sid!2sid!4v1644918751482!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
            'audio' => 'wedding audio1.mp3'
        ];
    }
}
