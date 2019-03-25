<?php

use Illuminate\Database\Seeder;

class NotificationActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = 'notify';

        $receiver = (object) [
            'id'   => '2',
            'name' => 'Toan Pham',
        ];

        $faker = \Faker\Factory::create();

        app('activity')->create([
            'actor'   => (object) ['id' => '2', 'name' => 'Mr. Doe', 'avatar_url' => $faker->imageUrl(100, 100, 'people') ],
            'type'    => $type,
            'object'  => (object) ['id' => '1', 'object_type' => 'PostVideo' ],
            'target'  => $receiver,
            'summary' => '{{actor.name}} shared a video',
            'meta'    => [
                'object' => [
                    'resource' => 'https://www.youtube.com/embed/tMWkeBIohBs'
                ]
            ]
        ]);

        app('activity')->create([
            'actor'   => (object) ['id' => '3', 'name' => 'Mina Lee', 'avatar_url' => $faker->imageUrl(100, 100, 'people') ],
            'type'    => $type,
            'object'  => (object) ['id' => '1', 'object_type' => 'PostImage' ],
            'target'  => $receiver,
            'summary' => '{{actor.name}} uploaded new photos',
            'meta'    => [
                'object' => [
                    'resource' => [
                        $faker->imageUrl(150, 100),
                        $faker->imageUrl(150, 100),
                        $faker->imageUrl(150, 100),
                        $faker->imageUrl(150, 100),
                    ]
                ]
            ]
        ]);

        app('activity')->create([
            'actor'   => (object) ['id' => '4', 'name' => 'Jay White', 'avatar_url' => $faker->imageUrl(100, 100, 'people') ],
            'type'    => $type,
            'object'  => (object) ['id' => '1', 'object_type' => 'Comment' ],
            'target'  => $receiver,
            'summary' => '{{actor.name}} commented on your post',
            'content' => '{{meta.object.content}}',
            'meta'    => [
                'object' => [
                    'content' => 'Take me to your leader! Switzerland is small and neutral! We are more like Germany, ambitious and misunderstood!'
                ],
                'post' => [
                    'type' => 'Post',
                    'id'   => '1',
                ]
            ]
        ]);

        app('activity')->create([
            'actor'   => (object) ['id' => '5', 'name' => 'Sarah Young', 'avatar_url' => $faker->imageUrl(100, 100, 'people') ],
            'type'    => $type,
            'object'  => (object) ['id' => '1', 'object_type' => 'FriendRequest' ],
            'target'  => $receiver,
            'summary' => '{{actor.name}} accepted your friend request',
        ]);

        app('activity')->create([
            'actor'   => (object) ['id' => '6', 'name' => 'Support Team', 'avatar_url' => $faker->imageUrl(100, 100, 'people') ],
            'type'    => $type,
            'object'  => (object) ['id' => '1', 'object_type' => 'Email' ],
            'target'  => $receiver,
            'summary' => '{{actor.name}} sent you an email',
            'content' => '{{meta.object.content}}',
            'meta'    => [
                'object' => [
                    'content' => 'Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle quora plaxo ideeli hulu weebly balihoo...'
                ]
            ]
        ]);
    }
}
