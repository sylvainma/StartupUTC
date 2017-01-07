<?php

use Illuminate\Database\Seeder;
use App\Startup;

class TrueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $this->call(FieldsTableSeeder::class);
      $this->call(AddressesTableSeeder::class);
      $this->call(LegalStatusesTableSeeder::class);
      $this->call(StartupsTableSeeder::class);
      $this->call(IndividualsTableSeeder::class);
      $this->call(IndividualStartupTableSeeder::class);

    }
}
