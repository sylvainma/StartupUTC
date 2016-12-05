<?php

use Illuminate\Database\Seeder;
use App\Individual;
use App\Founder;
use App\Startup;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $i = new Individual(['first_name' => 'Alphonse', 'last_name' => 'Dutronc']);
      $i->save();

      $s = new Startup(['name' => 'Metashot']);
      $s->save();

      $i->startups()->attach($s->id);
      // marche aussi: $s->individuals()->attach($i->id);

    }
}
