<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*DB::table('companies')->delete();

        $faker=Faker::create();
        $companies =[];
        foreach (range(1,10) as $index)
        {
            $companies[]=[
                'name'=> $name = $faker->company,
                'address'=> $faker->address,
                'website'=> $faker->domainName,
                'email'=> $faker->email,
                'created_at'=> now(),
                'updated_at'=> now(),
            ];
        }*/
        Company::factory()->count(10)->create();
    }
}
