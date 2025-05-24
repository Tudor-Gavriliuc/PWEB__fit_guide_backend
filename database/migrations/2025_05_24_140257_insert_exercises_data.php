<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        DB::table('exercises')->insert([
            [
                'name' => 'Pull-up',
                'image' => 'back/back1.png',
                'videoURL' => 'https://www.youtube.com/watch?v=eGo4IYlbE5g',
                'type' => 1,
            ],
            [
                'name' => 'Chin-up',
                'image' => 'back/back2.png',
                'videoURL' => 'https://www.youtube.com/watch?v=b-ztMQpgd3o',
                'type' => 1,
            ],
            [
                'name' => 'Lat Pulldown',
                'image' => 'back/back3.png',
                'videoURL' => 'https://www.youtube.com/watch?v=CAwf7n6Luuc',
                'type' => 1,
            ],
            [
                'name' => 'Barbell Row',
                'image' => 'back/back4.png',
                'videoURL' => 'https://www.youtube.com/watch?v=vT2GjY_Umpw',
                'type' => 1,
            ],
            [
                'name' => 'Seated Cable Row',
                'image' => 'back/back5.png',
                'videoURL' => 'https://www.youtube.com/watch?v=Ixo7sWv4ktk',
                'type' => 1,
            ],
            [
                'name' => 'T-Bar Row',
                'image' => 'back/back6.png',
                'videoURL' => 'https://www.youtube.com/watch?v=JR8AfNd9b2c',
                'type' => 1,
            ],
            [
                'name' => 'One-Arm Dumbbell Row',
                'image' => 'back/back7.png',
                'videoURL' => 'https://www.youtube.com/watch?v=pYcpY20QaE8',
                'type' => 1,
            ],
            [
                'name' => 'Deadlift',
                'image' => 'back/back8.png',
                'videoURL' => 'https://www.youtube.com/watch?v=op9kVnSso6Q',
                'type' => 1,
            ],
            [
                'name' => 'Reverse Fly',
                'image' => 'back/back9.png',
                'videoURL' => 'https://www.youtube.com/watch?v=5A8fi3yMnB8',
                'type' => 1,
            ],
            [
                'name' => 'Straight Arm Pulldown',
                'image' => 'back/back10.png',
                'videoURL' => 'https://www.youtube.com/watch?v=WxXHMKhIhw8',
                'type' => 1,
            ],
        ]);
    }

    public function down()
    {
        DB::table('exercises')->whereIn('name', [
            'Pull-up',
            'Chin-up',
            'Lat Pulldown',
            'Barbell Row',
            'Seated Cable Row',
            'T-Bar Row',
            'One-Arm Dumbbell Row',
            'Deadlift',
            'Reverse Fly',
            'Straight Arm Pulldown'
        ])->delete();
    }
};
