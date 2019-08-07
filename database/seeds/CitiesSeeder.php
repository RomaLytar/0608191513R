<?php

use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = ['Харьков', 'Киев', 'Луганск', 'Львов', 'Одесса', 'Днепропетровск'];
        foreach ($cities as $city){
            $city = [
            'title' => $city
            ];
            \App\Models\Cities::create($city);
        }
    }
}
