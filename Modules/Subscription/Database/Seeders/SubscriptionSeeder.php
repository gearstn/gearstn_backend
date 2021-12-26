<?php

namespace Modules\Subscription\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Subscription\Entities\Subscription;
use Rinvex\Subscriptions\Models\PlanFeature;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Distributor Package Silver Seed
        $plan = app('rinvex.subscriptions.plan')->create([
            'name' => 'Distributor_Silver',
            'description' => 'Distributor Silver Package',
            'price' => 20.00,
            'signup_fee' => 0.00,
            'invoice_period' => 1,
            'invoice_interval' => 'month',
            'trial_period' => 0,
            'trial_interval' => 'day',
            'sort_order' => 1,
            'currency' => 'USD',
        ]);

        // Create multiple plan features at once
        $plan->features()->saveMany([
            new PlanFeature(['name' => 'Competitor Rate with Discounts', 'value' => 27, 'sort_order' => 1]),
            new PlanFeature(['name' => 'Number of Listing', 'value' => 1, 'sort_order' => 1]),
            new PlanFeature(['name' => 'Photos Per Listing', 'value' => 5, 'sort_order' => 1]),
            new PlanFeature(['name' => 'Video Per listing', 'value' => 0, 'sort_order' => 1]),
            new PlanFeature(['name' => 'Dedicated Account Manager', 'value' => 0, 'sort_order' => 1]),
            new PlanFeature(['name' => 'Machines to be boosted in the top', 'value' => 0, 'sort_order' => 1]),
            new PlanFeature(['name' => 'Email Marketing', 'value' => 0, 'sort_order' => 1]),
        ]);

        //Distributor Package Gold Seed
        $plan = app('rinvex.subscriptions.plan')->create([
            'name' => 'Distributor Gold',
            'description' => 'Distributor Gold Package',
            'price' => 110.00,
            'signup_fee' => 0.00,
            'invoice_period' => 1,
            'invoice_interval' => 'month',
            'trial_period' => 0,
            'trial_interval' => 'day',
            'sort_order' => 1,
            'currency' => 'USD',
        ]);
        
        // Create multiple plan features at once
        $plan->features()->saveMany([
            new PlanFeature(['name' => 'Competitor Rate with Discounts', 'value' => 135, 'sort_order' => 1]),
            new PlanFeature(['name' => 'Number of Listing', 'value' => 5, 'sort_order' => 1]),
            new PlanFeature(['name' => 'Photos Per Listing', 'value' => 10, 'sort_order' => 1]),
            new PlanFeature(['name' => 'Video Per listing', 'value' => 1, 'sort_order' => 1]),
            new PlanFeature(['name' => 'Dedicated Account Manager', 'value' => 1, 'sort_order' => 1]),
            new PlanFeature(['name' => 'Machines to be boosted in the top', 'value' => 1, 'sort_order' => 1]),
            new PlanFeature(['name' => 'Email Marketing', 'value' => 1, 'sort_order' => 1]),
        ]);

        //Distributor Package Platinum Seed
        $plan = app('rinvex.subscriptions.plan')->create([
            'name' => 'Distributor Platinum',
            'description' => 'Distributor Platinum Package',
            'price' => 900.00,
            'signup_fee' => 0.00,
            'invoice_period' => 1,
            'invoice_interval' => 'month',
            'trial_period' => 0,
            'trial_interval' => 'day',
            'sort_order' => 1,
            'currency' => 'USD',
        ]);
        
        // Create multiple plan features at once
        $plan->features()->saveMany([
            new PlanFeature(['name' => 'Competitor Rate with Discounts', 'value' => 'Not Available', 'sort_order' => 1]),
            new PlanFeature(['name' => 'Number of Listing', 'value' => 100, 'sort_order' => 1]),
            new PlanFeature(['name' => 'Photos Per Listing', 'value' => 50, 'sort_order' => 1]),
            new PlanFeature(['name' => 'Video Per listing', 'value' => 3, 'sort_order' => 1]),
            new PlanFeature(['name' => 'Dedicated Account Manager', 'value' => 1, 'sort_order' => 1]),
            new PlanFeature(['name' => 'Machines to be boosted in the top', 'value' => 3, 'sort_order' => 1]),
            new PlanFeature(['name' => 'Email Marketing', 'value' => 1, 'sort_order' => 1]),
        ]);

    }
}
