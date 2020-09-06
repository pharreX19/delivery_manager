<?php

use App\Customer;
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
        $this->call(StatusSeeder::class);
        $this->call(AddressSeeder::class);
        $this->call(StoreSeeder::class);
        $this->call(ItemSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(StaffSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(UserSeeder::class);

        // $this->call(AddressCustomerSeeder::class);

    }
}
