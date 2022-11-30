<?php

require_once '../vendor/autoload.php';
require_once 'ShiftDataInstance.php';

function generate_data()
{
    $data = array();

    $somearr = array();
    $somearr = array("Yoga","Fullbody","Swimm","Pilates");


    $faker = Faker\Factory::create();
    $faker->addProvider(new Faker\Provider\Base($faker));
    $faker->addProvider(new Faker\Provider\DateTime($faker));
    for ($i = 0; $i < 50; $i++) {
        $starttime = date_timestamp_get($faker->dateTimeInInterval('-50 days', '+ 10 days'));
        $endtime = $starttime + 28800;
        $data_row = new ShiftDataInstance(
            $faker->numberBetween(1, 30),
            $faker->numberBetween(0, 60),
            $somearr[$faker->numberBetween(0, 3)],
            $starttime,
            $endtime
        );
        $data[] = $data_row;
    }
    $jsonData = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents('results.json', $jsonData);
}
