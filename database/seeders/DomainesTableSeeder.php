<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Domaines;
class DomainesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $count = 500;
        factory(Domaines::class, $count)->create();
    }
}
