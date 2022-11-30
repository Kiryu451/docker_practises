<?php

function get_raw_data(): array {
    $input = file_get_contents('results.json');
    # echo print_r(json_decode($input));
    return json_decode($input);
}

function get_services_count($data): array
{
    $services_count = array();
    foreach ($data as $row) {
        $services = $row->services;
        if (!isset($services_count[$services])) {
            $services_count[$services] = 0;
        }
        $services_count[$services] += 1;
    }
    return $services_count;
}

function get_employees_count($data): array
{
    $employees_count = array();
    foreach ($data as $row) {
        $employeeCount = $row->employeeCount;
        if(!isset($employees_count[$employeeCount])) {
            $employees_count[$employeeCount] = 0;
        }
        $employees_count[$employeeCount] += 1;
    }
    return $employees_count;
}

function get_month_count($data): array
{
    $count = array();
    foreach ($data as $row) {
        $value = $row->month;
        if(!isset($count[$value])) {
            $count[$value] = 0;
        }
        $count[$value] += 1;
    }
    return $count;
}

function get_daily_attendance(): array {
    $data = get_raw_data();
    $clients_array = array();
    $daystart_array = array();
    $daystart = array_column($data, 'daystart');

    array_multisort($daystart, SORT_ASC, $data);
    foreach ($data as $row) {
        $clients_array[] = $row->clientCount;
        $daystart_array[] = $row->daystart;
    }
    return array(
        "clientCount" => $clients_array,
        "daystart" => $daystart_array
    );
}

function get_labels_and_values($func) {
    $raw_data = get_raw_data();
    $day_count = $func($raw_data);
    $labels = array_keys($day_count);
    $values = array_values($day_count);
    return array("labels" => $labels, "values" => $values);
}