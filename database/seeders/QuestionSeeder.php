<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert([

            'name' => 'Lieblingsfarbe',
            'text' => 'Wie ist deine Lieblingsfarbe?',
            'showDate' => today(),
            'endDate' => today()->addDay(),
            'time'    =>0,
            'Punkte'    =>5,

        ]);

        DB::table('questions')->insert([

            'name' => 'Haustier',
            'text' => 'Wie heißt dein Haustier?',
            'showDate' => Carbon::now()->addDay(),
            'endDate' => today()->addDay()->addDay(),
            'time'    =>0,
            'Punkte'    =>10,

        ]);

        DB::table('questions')->insert([

            'name' => 'Video Antwort',
            'text' => 'Lade eine Video hoch',
            'showDate' => Carbon::now(),
            'endDate' => today()->addDay()->addDay(),
            'media_answer' => 1,
            'time'    =>0,
            'Punkte'    =>10,

        ]);
    }
}
