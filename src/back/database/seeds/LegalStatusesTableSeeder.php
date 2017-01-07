<?php

use Illuminate\Database\Seeder;
use App\LegalStatus;

class LegalStatusesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        $legal = array (
            0 =>
            array (
                'id' => 11,
                'name' => 'SAS',


            ),
            1 =>
            array (
                'id' => 12,
                'name' => 'SA',


            ),
            2 =>
            array (
                'id' => 13,
                'name' => 'SARL',


            ),
            3 =>
            array (
                'id' => 14,
                'name' => 'SASU',


            ),
            4 =>
            array (
                'id' => 15,
                'name' => 'SARLU',


            ),
            5 =>
            array (
                'id' => 16,
                'name' => 'Société civile',


            ),
        );

        foreach($legal as $l)
          LegalStatus::create($l);

    }
}
