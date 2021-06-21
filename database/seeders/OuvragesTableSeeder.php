<?php

namespace Database\Seeders;
use App\Models\Ouvrages;
use Illuminate\Database\Seeder;

class OuvragesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $count = 500;
        factory(Ouvrages::class, $count)->create();

    }
}
