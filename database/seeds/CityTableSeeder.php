<?php

use Illuminate\Database\Seeder;
use App\City;

class CityTableSeeder extends Seeder
{
    public function data()
    {
        $array = array(
            'Amazonas',
            'Anzoátegui',
            'Apure',
            'Aragua',
            'Barinas',
            'Bolívar',
            'Carabobo',
            'Cojedes',
            'Delta Amacuro',
            'Distrito Capital',
            'Falcón',
            'Guárico',
            'Lara',
            'Mérida',
            'Miranda',
            'Monagas',
            'Nueva Esparta',
            'Portuguesa',
            'Sucre',
            'Táchira',
            'Trujillo',
            'Vargas',
            'Yaracuy',
            'Zulia',
        );

        return $array;
    }

    public function run()
    {
        $cities = self::data();

        foreach ($cities as $value)
        {
            City::create([
                'name' => $value,
                'country_id' => 1
            ]);
        }
    }
}
