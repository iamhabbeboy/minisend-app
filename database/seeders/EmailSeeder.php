<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EmailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('emails')->insert([
            'sender' => Str::random(10).'@gmail.com',
            'subject' => Str::random(10),
            'recipient' => Str::random(10).'@gmail.com',
            'content' => Str::random(100)
        ]);
    }
}
