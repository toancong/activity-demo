<?php

use Illuminate\Database\Seeder;

class FeedActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = 'feed';

        $receiver = (object) [
            'id'   => '1',
            'name' => 'Toan Pham',
        ];
        $faker = \Faker\Factory::create();
        app('activity')->add(
            (object) ['id' => '2', 'name' => $faker->name, 'avatar_url' => $faker->imageUrl(100, 100, 'people') ],
            $type,
            (object) ['id' => '1', 'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Lorem ipsum dolor sit amet, <a href="#"># consectetur adipiscing </a>', 'object_type' => 'Post' ],
            $receiver
        );

        app('activity')->add(
            (object) ['id' => '3', 'name' => $faker->name, 'avatar_url' => $faker->imageUrl(100, 100, 'people') ],
            $type,
            (object) ['id' => '1', 'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Lorem ipsum dolor <a href="#"># ipsum dolor </a>adipiscing elit.', 'object_type' => 'Post' ],
            $receiver
        );

        app('activity')->add(
            (object) ['id' => '3', 'name' => $faker->name, 'avatar_url' => $faker->imageUrl(100, 100, 'people') ],
            $type,
            (object) ['id' => '1', 'content' => 'Lorem ipsum dolor <a href="#"># sit amet</a> sit amet, consectetur adipiscing elit.', 'object_type' => 'Post' ],
            $receiver
        );

    }
}
