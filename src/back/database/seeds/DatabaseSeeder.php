<?php

use Illuminate\Database\Seeder;
use App\Startup;
use App\Keyword;
use App\Department;
use App\Field;
use App\Individual;
use App\Address;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // Données de base (départements, etc)
      $this->call(BaseSeeder::class);

      if(env('APP_ENV') != 'production')
      {
        // Données générées avec Faker
        $this->call(FakeSeeder::class);
      }
      else
      {
        // Réelles données
        $this->call(TrueSeeder::class);
      }

    }
}
