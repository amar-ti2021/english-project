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


        // Seeds for store 
        \App\Models\Country::factory()->create([
            "country" => "USA"
        ]);
        \App\Models\State::factory()->create();
        for ($i = 1; $i <= 5; $i++) {

            \App\Models\Region::factory()->create([
                'state_id' => 1,
                'region' => fake()->city()
            ]);
            \App\Models\City::factory()->create([
                'region_id' => $i,
                'city' => fake()->city()
            ]);
            \App\Models\Store::factory()->create([
                'city_id' => $i,
                'store_address' => fake()->streetAddress()
            ]);
        }


        // Seeds for time 
        $weekdays = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        foreach ($weekdays as $weekday) {
            \App\Models\Weekday::factory()->create([
                'action_weekday' => $weekday
            ]);
        }

        $year = 2021;
        $time_id = 1;
        \App\Models\Year::factory()->create([
            'action_year' => $year
        ]);
        for ($month = 1; $month <= 12; $month++) {
            $number_of_days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
            for ($day = 1; $day <= $number_of_days; $day++) {
                $date = new DateTime("$year-$month-$day");
                \App\Models\Time::factory()->create([
                    'action_date' => $date->format("Y-m-d"),
                    'action_week' => $date->format("W"),
                    'action_month' => $month,
                    'year_id' => 1,
                    'weekday_id' => ($date->format("w") + 1)
                ]);
                \App\Models\Sale::factory(10)->create([
                    "time_id" => $time_id,
                ]);
                $time_id++;
            }
        }

        \App\Models\SalesType::factory()->create([
            'type_name' => 'cash',
        ]);
        \App\Models\SalesType::factory()->create([
            'type_name' => 'installment',
        ]);

        \App\Models\Employee::factory(20)->create();
        \App\Models\Product::factory(20)->create();

        \App\Models\ProductType::factory()->create([
            'product_type_name' => 'novel',
        ]);
        \App\Models\ProductType::factory()->create([
            'product_type_name' => 'comic',
        ]);
        \App\Models\ProductType::factory()->create([
            'product_type_name' => 'textbook',
        ]);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
