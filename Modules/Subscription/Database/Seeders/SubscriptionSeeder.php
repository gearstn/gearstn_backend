<?php

namespace Modules\Subscription\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Subscription\Entities\Subscription;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subscriptions = [
            [
                'title_en' => 'caterpillar',
                'title_ar' => 'كاتربيلر',
            ]
       ];

       foreach ($subscriptions as $subscription) {
           Subscription::create($subscription);
       }
    }
}
