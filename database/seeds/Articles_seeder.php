<?php

use Illuminate\Database\Seeder;
use App\Articles;

class Articles_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        Articles::truncate();
        factory(Articles::class, 10)->create();
    }
}
