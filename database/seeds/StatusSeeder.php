<?php

use App\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            ['id' => 1,'status' => 'Pending'], 
            ['id' => 2,'status' => 'Delivered'],
            ['id' => 3,'status' =>'Cancelled'],
        ];

        foreach($statuses as $status){
            Status::create($status);
        }
    }
}
