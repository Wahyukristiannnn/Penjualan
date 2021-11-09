<?php

namespace Database\Seeders;

use App\Models\KategoriGaji;
use Faker\Factory;
use Illuminate\Database\Seeder;


class KategoriGajiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KategoriGaji::factory(50)->create();
    }
}
