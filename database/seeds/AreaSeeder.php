<?php

use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = ['Харьковская', 'Киевская', 'Луганская', 'Львовская', 'Одесская', 'Днепропетровская'];
        foreach ($areas as $area){
            $area = [
                'title' => $area
            ];
            \App\Models\Areas::create($area);
        }
    }
}
