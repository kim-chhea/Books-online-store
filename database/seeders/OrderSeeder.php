<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $orders = [
            [
                "user_id" => 1,
                "status" => "pending",
                "total" => 12
            ],
            [
                "user_id" => 2,
                "status" => "completed",
                "total" => 25
            ],
            [
                "user_id" => 3,
                "status" => "pending",
                "total" => 30
            ],
            [
                "user_id" => 4,
                "status" => "cancelled",
                "total" => 18
            ],
            [
                "user_id" => 5,
                "status" => "processing",
                "total" => 22
            ],
            [
                "user_id" => 5,
                "status" => "pending",
                "total" => 10
            ],
            [
                "user_id" => 4,
                "status" => "completed",
                "total" => 50
            ],
            [
                "user_id" => 2,
                "status" => "completed",
                "total" => 40
            ],
            [
                "user_id" => 2,
                "status" => "processing",
                "total" => 28
            ],
            [
                "user_id" => 1,
                "status" => "cancelled",
                "total" => 15
            ]
        ];
        foreach ($orders as $order)
        {
            Order::create($order);
        }
    }
}
