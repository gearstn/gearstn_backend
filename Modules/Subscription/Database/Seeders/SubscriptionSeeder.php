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
            'name' => [
                'en' => 'Distributor Silver',
                'ar' => 'موزع فضى'
             ],
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
            new PlanFeature(['name' => ['en' => 'Competitor Rate with Discounts', 'ar' => 'سعر المنافس مع الخصومات'], 'value' => 27, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Number of Listing', 'ar' => 'عدد القوائم'], 'value' => 1, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Photos Per Listing', 'ar' => 'صور لكل قائمة'], 'value' => 5, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Video Per listing', 'ar' => 'فيديو لكل قائمة'], 'value' => 0, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Dedicated Account Manager', 'ar' => 'مدير حساب مخصص'], 'value' => 0, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Machines to be boosted in the top', 'ar' => 'يتم تعزيز الآلات في الأعلى'], 'value' => 0, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Email Marketing', 'ar' => 'التسويق عبر البريد الإلكتروني'], 'value' => 0, 'sort_order' => 1]),
        ]);

        //Distributor Package Gold Seed
        $plan = app('rinvex.subscriptions.plan')->create([
            'name' => [
                'en' => 'Distributor Gold',
                'ar' => 'موزع ذهبى'
             ],
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
            new PlanFeature(['name' => ['en' => 'Competitor Rate with Discounts', 'ar' => 'سعر المنافس مع الخصومات'], 'value' => 135, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Number of Listing', 'ar' => 'عدد القوائم'], 'value' => 5, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Photos Per Listing', 'ar' => 'صور لكل قائمة'], 'value' => 10, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Video Per listing', 'ar' => 'فيديو لكل قائمة'], 'value' => 1, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Dedicated Account Manager', 'ar' => 'مدير حساب مخصص'], 'value' => 1, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Machines to be boosted in the top', 'ar' => 'يتم تعزيز الآلات في الأعلى'], 'value' => 1, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Email Marketing', 'ar' => 'التسويق عبر البريد الإلكتروني'], 'value' => 1, 'sort_order' => 1]),
        ]);


        //Distributor Package Platinum Seed
        $plan = app('rinvex.subscriptions.plan')->create([
            'name' => [
                'en' => 'Distributor Platinum',
                'ar' => 'موزع بلاتينى'
             ],
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
            new PlanFeature(['name' => ['en' => 'Competitor Rate with Discounts', 'ar' => 'سعر المنافس مع الخصومات'], 'value' => 'Not Available', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Number of Listing', 'ar' => 'عدد القوائم'], 'value' => 100, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Photos Per Listing', 'ar' => 'صور لكل قائمة'], 'value' => 50, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Video Per listing', 'ar' => 'فيديو لكل قائمة'], 'value' => 3, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Dedicated Account Manager', 'ar' => 'مدير حساب مخصص'], 'value' => 1, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Machines to be boosted in the top', 'ar' => 'يتم تعزيز الآلات في الأعلى'], 'value' => 3, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Email Marketing', 'ar' => 'التسويق عبر البريد الإلكتروني'], 'value' => 1, 'sort_order' => 1]),
        ]);

    }
}
