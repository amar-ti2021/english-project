<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use DateTime;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Employee::factory(20)->create();
        \App\Models\Product::factory(20)->create();

        \App\Models\SalesType::factory()->create([
            'type_name' => 'cash',
        ]);
        \App\Models\SalesType::factory()->create([
            'type_name' => 'installment',
        ]);

        \App\Models\Store::factory(5)->create();
        $time_id = 1;
        for ($month = 1; $month <= 12; $month++) {
            $year = 2021;
            $number_of_days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
            for ($day = 1; $day <= $number_of_days; $day++) {
                $date = new DateTime("$year-$month-$day");
                \App\Models\Time::factory()->create([
                    'action_date' => $date->format("Y-m-d"),
                    'action_week' => $date->format("W"),
                    'action_month' => $date->format("m"),
                    'action_year' => $date->format("Y"),
                    'action_weekday' => $date->format("l")
                ]);
                \App\Models\Sale::factory(30)->create([
                    "time_id" => $time_id,
                ]);
                $time_id++;
            }
        }

        // \App\Models\Time::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
