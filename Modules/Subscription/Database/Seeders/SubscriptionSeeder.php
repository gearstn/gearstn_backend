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


        //Plan for one machine
        $plan = app('rinvex.subscriptions.plan')->create([
            'name' => [
                'en' => 'Listing Machine',
                'ar' => 'اضافة ماكينة'
            ],
            'description' => ['en' => 'Listing Machine', 'ar' => 'اضافة ماكينة'],
            'price' => 80.00,
            'signup_fee' => 0.00,
            'invoice_period' => 1,
            'invoice_interval' => 'month',
            'trial_period' => 0,
            'trial_interval' => 'day',
            'sort_order' => 1,
            'currency' => 'EGP'
        ]);

        // Create multiple plan features at once
        $plan->features()->saveMany([
            new PlanFeature(['name' => ['en' => 'Min Cost', 'ar' => 'اقل تكلفة'], 'value' => 80, 'sort_order' => 1 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Max Cost', 'ar' => 'اعلى تكلغة'], 'value' => 80, 'sort_order' => 2 , 'resettable_period' => 1 , 'resettable_interval' => 'month'])
        ]);


        //6 Months

         //Distributor Package Silver Seed
         $plan = app('rinvex.subscriptions.plan')->create([
            'name' => [
                'en' => 'Distributor Silver',
                'ar' => 'موزع فضى'
             ],
            'description' => ['en' => 'Silver', 'ar' => 'فضى'],
            'price' => 3000.00,
            'signup_fee' => 0.00,
            'invoice_period' => 6,
            'invoice_interval' => 'month',
            'trial_period' => 0,
            'trial_interval' => 'day',
            'sort_order' => 1,
            'currency' => 'EGP'
        ]);

        // Create multiple plan features at once
        $plan->features()->saveMany([
            new PlanFeature(['name' => ['en' => 'Min Cost', 'ar' => 'اقل تكلفة'], 'value' => 3000, 'sort_order' => 1 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Max Cost', 'ar' => 'اعلى تكلغة'], 'value' => 5000, 'sort_order' => 2 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Number of Listing', 'ar' => 'عدد القوائم'], 'value' => 10, 'sort_order' => 3 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Photos Per Listing', 'ar' => 'صور لكل قائمة'], 'value' => 5, 'sort_order' => 4 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Total Photos', 'ar' => 'مجموع الصور'], 'value' => 50, 'sort_order' => 4 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Video Per listing', 'ar' => 'فيديو لكل قائمة'], 'value' => 'false', 'sort_order' => 5 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Total Videos', 'ar' => 'مجموع مقاطع الفيديو'], 'value' => 'false', 'sort_order' => 5 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Listing in Arabic and English', 'ar' => 'الإدراج باللغتين العربية والإنجليزية'], 'value' => 'true', 'sort_order' => 6 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'User Dashboard', 'ar' => 'لوحة تحكم المستخدم'], 'value' => 'true', 'sort_order' => 7 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Live Chat', 'ar' => 'دردشة مباشرة'], 'value' => 'true', 'sort_order' => 8 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Bulk Import', 'ar' => 'استيراد بالجملة'], 'value' => 'false', 'sort_order' => 9 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Dedicated Account Manager', 'ar' => 'مدير حساب مخصص'], 'value' => 'false', 'sort_order' => 10 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Upgrade feature listing', 'ar' => 'ترقية قائمة الميزات'], 'value' => 'false', 'sort_order' => 11 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Having discount on opening branded page', 'ar' => 'الحصول على خصم على فتح الصفحة ذات العلامات التجارية'], 'value' => 'false', 'sort_order' => 12 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Subscription for branded page', 'ar' => 'الاشتراك في الصفحة ذات العلامات التجارية'], 'value' => 'false', 'sort_order' => 13 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Machines to be boosted in the top', 'ar' => 'يتم تعزيز الآلات في الأعلى'], 'value' => 0, 'sort_order' => 14 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Email Marketing', 'ar' => 'التسويق عبر البريد الإلكتروني'], 'value' => 'false', 'sort_order' => 15 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
        ]);

        //Distributor Package Gold Seed
        $plan = app('rinvex.subscriptions.plan')->create([
            'name' => [
                'en' => 'Distributor Gold',
                'ar' => 'موزع ذهبى'
             ],
             'description' => ['en' => 'Gold', 'ar' => 'ذهبى'],
             'price' => 8000.00,
            'signup_fee' => 0.00,
            'invoice_period' => 6,
            'invoice_interval' => 'month',
            'trial_period' => 0,
            'trial_interval' => 'day',
            'sort_order' => 1,
            'currency' => 'EGP',
        ]);

        // Create multiple plan features at once
        $plan->features()->saveMany([
            new PlanFeature(['name' => ['en' => 'Min Cost', 'ar' => 'اقل تكلفة'], 'value' => 8000, 'sort_order' => 1 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Max Cost', 'ar' => 'اعلى تكلغة'], 'value' => 10000, 'sort_order' => 2 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Number of Listing', 'ar' => 'عدد القوائم'], 'value' => 25, 'sort_order' => 3 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Photos Per Listing', 'ar' => 'صور لكل قائمة'], 'value' => 10, 'sort_order' => 4 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Total Photos', 'ar' => 'مجموع الصور'], 'value' => 250, 'sort_order' => 4 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Video Per listing', 'ar' => 'فيديو لكل قائمة'], 'value' => 1, 'sort_order' => 5 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Total Videos', 'ar' => 'مجموع مقاطع الفيديو'], 'value' => 25, 'sort_order' => 5 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Listing in Arabic and English', 'ar' => 'الإدراج باللغتين العربية والإنجليزية'], 'value' => 'true', 'sort_order' => 6 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'User Dashboard', 'ar' => 'لوحة تحكم المستخدم'], 'value' => 'true', 'sort_order' => 7 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Live Chat', 'ar' => 'دردشة مباشرة'], 'value' => 'true', 'sort_order' => 8 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Bulk Import', 'ar' => 'استيراد بالجملة'], 'value' => 'false', 'sort_order' => 9 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Dedicated Account Manager', 'ar' => 'مدير حساب مخصص'], 'value' => 'true', 'sort_order' => 10 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Upgrade feature listing', 'ar' => 'ترقية قائمة الميزات'], 'value' => 'true', 'sort_order' => 11 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Having discount on opening branded page', 'ar' => 'الحصول على خصم على فتح الصفحة ذات العلامات التجارية'], 'value' => '10%', 'sort_order' => 12 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Subscription for branded page', 'ar' => 'الاشتراك في الصفحة ذات العلامات التجارية'], 'value' => 'true', 'sort_order' => 13 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Machines to be boosted in the top', 'ar' => 'يتم تعزيز الآلات في الأعلى'], 'value' => 1, 'sort_order' => 14 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Email Marketing', 'ar' => 'التسويق عبر البريد الإلكتروني'], 'value' => 'true', 'sort_order' => 15 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
        ]);


        //Distributor Package Platinum Seed
        $plan = app('rinvex.subscriptions.plan')->create([
            'name' => [
                'en' => 'Distributor Platinum',
                'ar' => 'موزع بلاتينى'
             ],
             'description' => ['en' => 'Platinum', 'ar' => 'بلاتينى'],
            'price' => 13000.00,
            'signup_fee' => 0.00,
            'invoice_period' => 6,
            'invoice_interval' => 'month',
            'trial_period' => 0,
            'trial_interval' => 'day',
            'sort_order' => 1,
            'currency' => 'EGP',
        ]);

        // Create multiple plan features at once
        $plan->features()->saveMany([
            new PlanFeature(['name' => ['en' => 'Min Cost', 'ar' => 'اقل تكلفة'], 'value' => 13000, 'sort_order' => 1 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Max Cost', 'ar' => 'اعلى تكلغة'], 'value' => 15000, 'sort_order' => 2 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Number of Listing', 'ar' => 'عدد القوائم'], 'value' => 50, 'sort_order' => 3 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Photos Per Listing', 'ar' => 'صور لكل قائمة'], 'value' => 15, 'sort_order' => 4 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Total Photos', 'ar' => 'مجموع الصور'], 'value' => 550, 'sort_order' => 4 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Video Per listing', 'ar' => 'فيديو لكل قائمة'], 'value' => 2, 'sort_order' => 5 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Total Videos', 'ar' => 'مجموع مقاطع الفيديو'], 'value' => 100, 'sort_order' => 5 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Listing in Arabic and English', 'ar' => 'الإدراج باللغتين العربية والإنجليزية'], 'value' => 'true', 'sort_order' => 6 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'User Dashboard', 'ar' => 'لوحة تحكم المستخدم'], 'value' => 'true', 'sort_order' => 7 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Live Chat', 'ar' => 'دردشة مباشرة'], 'value' => 'true', 'sort_order' => 8 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Bulk Import', 'ar' => 'استيراد بالجملة'], 'value' => 'true', 'sort_order' => 9 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Dedicated Account Manager', 'ar' => 'مدير حساب مخصص'], 'value' => 'true', 'sort_order' => 10 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Upgrade feature listing', 'ar' => 'ترقية قائمة الميزات'], 'value' => 'true', 'sort_order' => 11 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Having discount on opening branded page', 'ar' => 'الحصول على خصم على فتح الصفحة ذات العلامات التجارية'], 'value' => '20%', 'sort_order' => 12 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Subscription for branded page', 'ar' => 'الاشتراك في الصفحة ذات العلامات التجارية'], 'value' => 'true', 'sort_order' => 13 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Machines to be boosted in the top', 'ar' => 'يتم تعزيز الآلات في الأعلى'], 'value' => 3, 'sort_order' => 14 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Email Marketing', 'ar' => 'التسويق عبر البريد الإلكتروني'], 'value' => 'true', 'sort_order' => 15 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
        ]);


        // 1 Years
         //Distributor Package Silver Seed
         $plan = app('rinvex.subscriptions.plan')->create([
            'name' => [
                'en' => 'Distributor Silver',
                'ar' => 'موزع فضى'
             ],
            'description' => ['en' => 'Silver', 'ar' => 'فضى'],
            'price' => 5000.00,
            'signup_fee' => 0.00,
            'invoice_period' => 12,
            'invoice_interval' => 'month',
            'trial_period' => 0,
            'trial_interval' => 'day',
            'sort_order' => 1,
            'currency' => 'EGP',
        ]);

        // Create multiple plan features at once
        $plan->features()->saveMany([
            new PlanFeature(['name' => ['en' => 'Min Cost', 'ar' => 'اقل تكلفة'], 'value' => 5000, 'sort_order' => 1 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Max Cost', 'ar' => 'اعلى تكلغة'], 'value' => 7000, 'sort_order' => 2 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Number of Listing', 'ar' => 'عدد القوائم'], 'value' => 10, 'sort_order' => 3 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Photos Per Listing', 'ar' => 'صور لكل قائمة'], 'value' => 5, 'sort_order' => 4 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Total Photos', 'ar' => 'مجموع الصور'], 'value' => 50, 'sort_order' => 4 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Video Per listing', 'ar' => 'فيديو لكل قائمة'], 'value' => 'false', 'sort_order' => 5 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Total Videos', 'ar' => 'مجموع مقاطع الفيديو'], 'value' => 'false', 'sort_order' => 5 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Listing in Arabic and English', 'ar' => 'الإدراج باللغتين العربية والإنجليزية'], 'value' => 'true', 'sort_order' => 6 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'User Dashboard', 'ar' => 'لوحة تحكم المستخدم'], 'value' => 'true', 'sort_order' => 7 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Live Chat', 'ar' => 'دردشة مباشرة'], 'value' => 'true', 'sort_order' => 8 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Bulk Import', 'ar' => 'استيراد بالجملة'], 'value' => 'false', 'sort_order' => 9 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Dedicated Account Manager', 'ar' => 'مدير حساب مخصص'], 'value' => '1 Hour Per Month', 'sort_order' => 10 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Upgrade feature listing', 'ar' => 'ترقية قائمة الميزات'], 'value' => 'false', 'sort_order' => 11 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Having discount on opening branded page', 'ar' => 'الحصول على خصم على فتح الصفحة ذات العلامات التجارية'], 'value' => 'false', 'sort_order' => 12 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Subscription for branded page', 'ar' => 'الاشتراك في الصفحة ذات العلامات التجارية'], 'value' => 'false', 'sort_order' => 13 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Machines to be boosted in the top', 'ar' => 'يتم تعزيز الآلات في الأعلى'], 'value' => 0, 'sort_order' => 14 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Email Marketing', 'ar' => 'التسويق عبر البريد الإلكتروني'], 'value' => 'false', 'sort_order' => 15 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
        ]);

        //Distributor Package Gold Seed
        $plan = app('rinvex.subscriptions.plan')->create([
            'name' => [
                'en' => 'Distributor Gold',
                'ar' => 'موزع ذهبى'
             ],
             'description' => ['en' => 'Gold', 'ar' => 'ذهبى'],
             'price' => 11000.00,
            'signup_fee' => 0.00,
            'invoice_period' => 12,
            'invoice_interval' => 'month',
            'trial_period' => 0,
            'trial_interval' => 'day',
            'sort_order' => 1,
            'currency' => 'EGP',
        ]);

        // Create multiple plan features at once
        $plan->features()->saveMany([
            new PlanFeature(['name' => ['en' => 'Min Cost', 'ar' => 'اقل تكلفة'], 'value' => 11000, 'sort_order' => 1 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Max Cost', 'ar' => 'اعلى تكلغة'], 'value' => 13000, 'sort_order' => 2 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Number of Listing', 'ar' => 'عدد القوائم'], 'value' => 25, 'sort_order' => 3 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Photos Per Listing', 'ar' => 'صور لكل قائمة'], 'value' => 10, 'sort_order' => 4 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Total Photos', 'ar' => 'مجموع الصور'], 'value' => 250, 'sort_order' => 4 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Video Per listing', 'ar' => 'فيديو لكل قائمة'], 'value' => 1, 'sort_order' => 5 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Total Videos', 'ar' => 'مجموع مقاطع الفيديو'], 'value' => 5, 'sort_order' => 5 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Listing in Arabic and English', 'ar' => 'الإدراج باللغتين العربية والإنجليزية'], 'value' => 'true', 'sort_order' => 6 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'User Dashboard', 'ar' => 'لوحة تحكم المستخدم'], 'value' => 'true', 'sort_order' => 7 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Live Chat', 'ar' => 'دردشة مباشرة'], 'value' => 'true', 'sort_order' => 8 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Bulk Import', 'ar' => 'استيراد بالجملة'], 'value' => 'false', 'sort_order' => 9 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Dedicated Account Manager', 'ar' => 'مدير حساب مخصص'], 'value' => 'true', 'sort_order' => 10 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Upgrade feature listing', 'ar' => 'ترقية قائمة الميزات'], 'value' => 'true', 'sort_order' => 11 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Having discount on opening branded page', 'ar' => 'الحصول على خصم على فتح الصفحة ذات العلامات التجارية'], 'value' => '10%', 'sort_order' => 12 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Subscription for branded page', 'ar' => 'الاشتراك في الصفحة ذات العلامات التجارية'], 'value' => 'true', 'sort_order' => 13 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Machines to be boosted in the top', 'ar' => 'يتم تعزيز الآلات في الأعلى'], 'value' => 1, 'sort_order' => 14 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Email Marketing', 'ar' => 'التسويق عبر البريد الإلكتروني'], 'value' => 'true', 'sort_order' => 15 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
        ]);


        //Distributor Package Platinum Seed
        $plan = app('rinvex.subscriptions.plan')->create([
            'name' => [
                'en' => 'Distributor Platinum',
                'ar' => 'موزع بلاتينى'
             ],
             'description' => ['en' => 'Platinum', 'ar' => 'بلاتينى'],
            'price' => 20000.00,
            'signup_fee' => 0.00,
            'invoice_period' => 12,
            'invoice_interval' => 'month',
            'trial_period' => 0,
            'trial_interval' => 'day',
            'sort_order' => 1,
            'currency' => 'EGP',
        ]);

        // Create multiple plan features at once
        $plan->features()->saveMany([
            new PlanFeature(['name' => ['en' => 'Min Cost', 'ar' => 'اقل تكلفة'], 'value' => 20000, 'sort_order' => 1 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Max Cost', 'ar' => 'اعلى تكلغة'], 'value' => 25000, 'sort_order' => 2 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Number of Listing', 'ar' => 'عدد القوائم'], 'value' => 50, 'sort_order' => 3 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Photos Per Listing', 'ar' => 'صور لكل قائمة'], 'value' => 15, 'sort_order' => 4 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Total Photos', 'ar' => 'مجموع الصور'], 'value' => 550, 'sort_order' => 4 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Video Per listing', 'ar' => 'فيديو لكل قائمة'], 'value' => 2, 'sort_order' => 5 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Total Videos', 'ar' => 'مجموع مقاطع الفيديو'], 'value' => 100, 'sort_order' => 5 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Listing in Arabic and English', 'ar' => 'الإدراج باللغتين العربية والإنجليزية'], 'value' => 'true', 'sort_order' => 6 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'User Dashboard', 'ar' => 'لوحة تحكم المستخدم'], 'value' => 'true', 'sort_order' => 7 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Live Chat', 'ar' => 'دردشة مباشرة'], 'value' => 'true', 'sort_order' => 8 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Bulk Import', 'ar' => 'استيراد بالجملة'], 'value' => 'true', 'sort_order' => 9 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Dedicated Account Manager', 'ar' => 'مدير حساب مخصص'], 'value' => 'true', 'sort_order' => 10 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Upgrade feature listing', 'ar' => 'ترقية قائمة الميزات'], 'value' => 'true', 'sort_order' => 11 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Having discount on opening branded page', 'ar' => 'الحصول على خصم على فتح الصفحة ذات العلامات التجارية'], 'value' => '20%', 'sort_order' => 12 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Subscription for branded page', 'ar' => 'الاشتراك في الصفحة ذات العلامات التجارية'], 'value' => 'true', 'sort_order' => 13 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Machines to be boosted in the top', 'ar' => 'يتم تعزيز الآلات في الأعلى'], 'value' => 3, 'sort_order' => 14 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
            new PlanFeature(['name' => ['en' => 'Email Marketing', 'ar' => 'التسويق عبر البريد الإلكتروني'], 'value' => 'true', 'sort_order' => 15 , 'resettable_period' => 1 , 'resettable_interval' => 'month']),
        ]);
    }
}
