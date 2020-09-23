<?php

use Illuminate\Database\Seeder;
use App\Payment;

class PaymentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function data()
    {
        $array = array(
            'Banco Venezuela',
            'Banco Banesco',
            'Bitcoin',
            'DashCoin',
            'Petro',
            'Ethereum'
        );

        return $array;
    }

    public function run()
    {
        $payments = self::data();
        
        foreach ($payments as $value) 
        {
            Payment::create([
                'name' => $value
            ]);
        }
    }
}
