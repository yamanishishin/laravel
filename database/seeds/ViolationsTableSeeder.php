<?php

use Illuminate\Database\Seeder;

class ViolationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('violations')->insert([
            'user_id' => '1',
            'post_id' => '1',
            'title' => 'test',

        ]);
    }
}
