<?php

use App\Message;
use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Message::truncate();

        $faker = Faker\Factory::create();

        for($i = 0; $i < 50; $i++) {
            Message::create([
                'body' => $faker->paragraph
            ]);
        }
    }
}
