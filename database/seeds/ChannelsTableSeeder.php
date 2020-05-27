<?php

use LaravelForum\Channel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Channel::create([
            'name' => 'Laravel',
            'slug' => Str::slug('Laravel'),
        ]);

        Channel::create([
            'name' => 'Yii2',
            'slug' => Str::slug('Yii2'),
        ]);

        Channel::create([
            'name' => 'WordPress',
            'slug' => Str::slug('WordPress'),
        ]);

        Channel::create([
            'name' => 'Vue.js',
            'slug' => Str::slug('Vue.js'),
        ]);
    }
}
