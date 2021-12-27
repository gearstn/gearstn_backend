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
            new PlanFeature(['name' => ['en' => 'Competitor Rate with Discounts Silver', 'ar' => 'سعر المنافس مع الخصومات فضى'], 'value' => 27, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Number of Listing Silver', 'ar' => 'عدد القوائم فضى'], 'value' => 1, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Photos Per Listing Silver', 'ar' => 'صور لكل قائمة فضى'], 'value' => 5, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Video Per listing Silver', 'ar' => 'فيديو لكل قائمة فضى'], 'value' => 0, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Dedicated Account Manager Silver', 'ar' => 'مدير حساب مخصص فضى'], 'value' => 0, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Machines to be boosted in the top Silver', 'ar' => 'يتم تعزيز الآلات في الأعلى فضى'], 'value' => 0, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Email Marketing Silver', 'ar' => 'التسويق عبر البريد الإلكتروني فضى'], 'value' => 0, 'sort_order' => 1]),
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
            new PlanFeature(['name' => ['en' => 'Competitor Rate with Discounts Gold', 'ar' => 'سعر المنافس مع الخصومات ذهبى'], 'value' => 135, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Number of Listing Gold', 'ar' => 'عدد القوائم ذهبى'], 'value' => 5, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Photos Per Listing Gold', 'ar' => 'صور لكل قائمة ذهبى'], 'value' => 10, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Video Per listing Gold', 'ar' => 'فيديو لكل قائمة ذهبى'], 'value' => 1, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Dedicated Account Manager Gold', 'ar' => 'مدير حساب مخصص ذهبى'], 'value' => 1, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Machines to be boosted in the top Gold', 'ar' => 'يتم تعزيز الآلات في الأعلى ذهبى'], 'value' => 1, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Email Marketing Gold', 'ar' => 'التسويق عبر البريد الإلكتروني ذهبى'], 'value' => 1, 'sort_order' => 1]),
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
            new PlanFeature(['name' => ['en' => 'Competitor Rate with Discounts Platinum', 'ar' => 'سعر المنافس مع الخصومات بلاتينى'], 'value' => 'Not Available', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Number of Listing Platinum', 'ar' => 'عدد القوائم بلاتينى'], 'value' => 100, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Photos Per Listing Platinum', 'ar' => 'صور لكل قائمة بلاتينى'], 'value' => 50, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Video Per listing Platinum', 'ar' => 'فيديو لكل قائمة بلاتينى'], 'value' => 3, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Dedicated Account Manager Platinum', 'ar' => 'مدير حساب مخصص بلاتينى'], 'value' => 1, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Machines to be boosted in the top Platinum', 'ar' => 'يتم تعزيز الآلات في الأعلى بلاتينى'], 'value' => 3, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Email Marketing Platinum', 'ar' => 'التسويق عبر البريد الإلكتروني بلاتينى'], 'value' => 1, 'sort_order' => 1]),
        ]);

    }
}
