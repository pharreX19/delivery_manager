<?php

use App\AddressCustomer;
use Illuminate\Database\Seeder;

class AddressCustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(AddressCustomer::class, 5)->create();
    }
}
