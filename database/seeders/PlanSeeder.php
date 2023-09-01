<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = [
            [
                'name' => 'Business Plan', 
                'slug' => 'business-plan', 
                'stripe_plan' => 'price_1NlesPHTo4SNWVjYVXbV4i09', 
                'price' => 10, 
                'description' => 'Business Plan'
            ],
            [
                'name' => 'Premium', 
                'slug' => 'premium', 
                'stripe_plan' => 'price_1NletDHTo4SNWVjY4lsiBViq', 
                'price' => 20, 
                'description' => 'Premium'
            ]
        ];
   
        foreach ($plans as $plan) {
            Plan::create($plan);
        }
    }
}