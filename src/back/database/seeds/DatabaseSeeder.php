<?php

use Illuminate\Database\Seeder;
use App\Startup;
use App\Keyword;
use App\Department;
use App\Field;
use App\Individual;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker\Factory::create();
      $limit = 40;

      // Departments
      Department::create(['name' => 'GI', 'description' => 'Génie informatique']);
      Department::create(['name' => 'GSU', 'description' => 'Génie des systèmes urbains']);
      Department::create(['name' => 'GM/GSM', 'description' => 'Génie mécanique']);
      Department::create(['name' => 'GB', 'description' => 'Génie biologique']);
      Department::create(['name' => 'GP', 'description' => 'Génie des procédés']);
      Department::create(['name' => 'Autre', 'description' => 'Autre']);

      // Fields
      for ($i = 1; $i <= 10; $i++) {
          $s = Field::create([
              'name' => $faker->sentence($nbWords = 3, $variableNbWords = true),
          ]);
      }

      // Startups
      for ($i = 1; $i <= $limit; $i++) {
          $s = Startup::create([
              'name_official' => $faker->company,
              'name_commercial' => $faker->companySuffix,
              'foundation_date' => $faker->dateTime($max = 'now', $timezone = date_default_timezone_get()),
              'description' => $faker->text($maxNbChars = 500),
              'url' => $faker->freeEmailDomain,
              'facebook' => $faker->url,
              'linkedin' => $faker->url,
              'twitter' => $faker->url,
              'email' => $faker->unique()->email,
              'phone' => $faker->phoneNumber,
          ]);

          $dept = Department::find($faker->numberBetween($min = 1, $max = 6));
          $s->department()->associate($dept->id);

          $field = Field::find($faker->numberBetween($min = 1, $max = 10));
          $s->field()->associate($field->id);

          $s->save();
      }

      // Keywords
      for ($i = 1; $i <= 15; $i++) {
          $k = Keyword::create([
              'name' => $faker->word,
          ]);
          Startup::find($faker->numberBetween($min = 1, $max = $limit))->keywords()->attach($k);
      }

      // Individuals
      for ($i = 1; $i <= $limit; $i++) {
          $k = Individual::create([
              'first_name' => $faker->firstName($gender = null|'male'|'female'),
              'last_name' => $faker->lastName,
              'email' => $faker->companyEmail,
              'promo_utc' => 'GX ' . $faker->year($max = 'now'),
          ]);
          Startup::find($faker->numberBetween($min = 1, $max = $limit))->individuals()->attach($k, ['job_title' => $faker->jobTitle]);
      }

    }
}
