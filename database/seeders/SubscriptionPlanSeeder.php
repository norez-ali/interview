<?php

namespace Database\Seeders;

use App\Models\SubscriptionPlan;
use Illuminate\Database\Seeder;

class SubscriptionPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubscriptionPlan::create([
            'name' => 'Basic',
            'monthly_price' => 999.00,
        ]);

        SubscriptionPlan::create([
            'name' => 'Standard',
            'monthly_price' => 1999.00,
        ]);

        SubscriptionPlan::create([
            'name' => 'Premium',
            'monthly_price' => 2999.00,
        ]);

        SubscriptionPlan::create([
            'name' => 'Business',
            'monthly_price' => 4999.00,
        ]);

        SubscriptionPlan::create([
            'name' => 'Enterprise',
            'monthly_price' => 9999.00,
        ]);
    }
}
