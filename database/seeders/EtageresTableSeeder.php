<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EtageresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $count = 500;
       factory(Etageres::class, $count)->create();
    }
}
