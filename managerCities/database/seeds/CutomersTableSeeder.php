<?php

use App\Customer;
use Illuminate\Database\Seeder;

class CutomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Customer::class,100)->create();
    }
}
