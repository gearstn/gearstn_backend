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
            'description' => ['en' => 'Silver', 'ar' => 'فضى'],
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
            new PlanFeature(['name' => ['en' => 'Min Cost', 'ar' => 'اقل تكلفة'], 'value' => 25, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Max Cost', 'ar' => 'اعلى تكلغة'], 'value' => 20, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Number of Listing', 'ar' => 'عدد القوائم'], 'value' => 1, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Photos Per Listing', 'ar' => 'صور لكل قائمة'], 'value' => 6, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Video Per listing', 'ar' => 'فيديو لكل قائمة'], 'value' => 'false', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Listing in Arabic and English', 'ar' => 'الإدراج باللغتين العربية والإنجليزية'], 'value' => 'true', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'User Dashboard', 'ar' => 'لوحة تحكم المستخدم'], 'value' => 'true', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Live Chat', 'ar' => 'دردشة مباشرة'], 'value' => 'true', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Bulk Import', 'ar' => 'استيراد بالجملة'], 'value' => 'false', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Dedicated Account Manager', 'ar' => 'مدير حساب مخصص'], 'value' => '1 Hour Per Month', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Upgrade feature listing', 'ar' => 'ترقية قائمة الميزات'], 'value' => 'false', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Having discount on opening branded page', 'ar' => 'الحصول على خصم على فتح الصفحة ذات العلامات التجارية'], 'value' => 'false', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Subscription for branded page', 'ar' => 'الاشتراك في الصفحة ذات العلامات التجارية'], 'value' => 'false', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Machines to be boosted in the top', 'ar' => 'يتم تعزيز الآلات في الأعلى'], 'value' => 0, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Email Marketing', 'ar' => 'التسويق عبر البريد الإلكتروني'], 'value' => 'false', 'sort_order' => 1]),
        ]);

        //Distributor Package Gold Seed
        $plan = app('rinvex.subscriptions.plan')->create([
            'name' => [
                'en' => 'Distributor Gold',
                'ar' => 'موزع ذهبى'
             ],
             'description' => ['en' => 'Gold', 'ar' => 'ذهبى'],
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
            new PlanFeature(['name' => ['en' => 'Min Cost', 'ar' => 'اقل تكلفة'], 'value' => 130, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Max Cost', 'ar' => 'اعلى تكلغة'], 'value' => 110, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Number of Listing', 'ar' => 'عدد القوائم'], 'value' => 5, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Photos Per Listing', 'ar' => 'صور لكل قائمة'], 'value' => 11, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Video Per listing', 'ar' => 'فيديو لكل قائمة'], 'value' => 1, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Listing in Arabic and English', 'ar' => 'الإدراج باللغتين العربية والإنجليزية'], 'value' => 'true', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'User Dashboard', 'ar' => 'لوحة تحكم المستخدم'], 'value' => 'true', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Live Chat', 'ar' => 'دردشة مباشرة'], 'value' => 'true', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Bulk Import', 'ar' => 'استيراد بالجملة'], 'value' => 'false', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Dedicated Account Manager', 'ar' => 'مدير حساب مخصص'], 'value' => 'true', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Upgrade feature listing', 'ar' => 'ترقية قائمة الميزات'], 'value' => 'true', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Having discount on opening branded page', 'ar' => 'الحصول على خصم على فتح الصفحة ذات العلامات التجارية'], 'value' => '10%', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Subscription for branded page', 'ar' => 'الاشتراك في الصفحة ذات العلامات التجارية'], 'value' => 'true', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Machines to be boosted in the top', 'ar' => 'يتم تعزيز الآلات في الأعلى'], 'value' => 1, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Email Marketing', 'ar' => 'التسويق عبر البريد الإلكتروني'], 'value' => 'true', 'sort_order' => 1]),
        ]);


        //Distributor Package Platinum Seed
        $plan = app('rinvex.subscriptions.plan')->create([
            'name' => [
                'en' => 'Distributor Platinum',
                'ar' => 'موزع بلاتينى'
             ],
             'description' => ['en' => 'Platinum', 'ar' => 'بلاتينى'],
            'price' => 0.00,
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
            new PlanFeature(['name' => ['en' => 'Min Cost', 'ar' => 'اقل تكلفة'], 'value' => 'Please Contact Us', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Max Cost', 'ar' => 'اعلى تكلغة'], 'value' => 'Please Contact Us', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Number of Listing', 'ar' => 'عدد القوائم'], 'value' => 'More than 10', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Photos Per Listing', 'ar' => 'صور لكل قائمة'], 'value' => 50, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Video Per listing', 'ar' => 'فيديو لكل قائمة'], 'value' => 3, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Listing in Arabic and English', 'ar' => 'الإدراج باللغتين العربية والإنجليزية'], 'value' => 'true', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'User Dashboard', 'ar' => 'لوحة تحكم المستخدم'], 'value' => 'true', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Live Chat', 'ar' => 'دردشة مباشرة'], 'value' => 'true', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Bulk Import', 'ar' => 'استيراد بالجملة'], 'value' => 'true', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Dedicated Account Manager', 'ar' => 'مدير حساب مخصص'], 'value' => 'true', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Upgrade feature listing', 'ar' => 'ترقية قائمة الميزات'], 'value' => 'true', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Having discount on opening branded page', 'ar' => 'الحصول على خصم على فتح الصفحة ذات العلامات التجارية'], 'value' => '20%', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Subscription for branded page', 'ar' => 'الاشتراك في الصفحة ذات العلامات التجارية'], 'value' => 'true', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Machines to be boosted in the top', 'ar' => 'يتم تعزيز الآلات في الأعلى'], 'value' => 3, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Email Marketing', 'ar' => 'التسويق عبر البريد الإلكتروني'], 'value' => 'true', 'sort_order' => 1]),
        ]);


        //6 Months

         //Distributor Package Silver Seed
         $plan = app('rinvex.subscriptions.plan')->create([
            'name' => [
                'en' => 'Distributor Silver',
                'ar' => 'موزع فضى'
             ],
            'description' => ['en' => 'Silver', 'ar' => 'فضى'],
            'price' => 80.00,
            'signup_fee' => 0.00,
            'invoice_period' => 6,
            'invoice_interval' => 'month',
            'trial_period' => 0,
            'trial_interval' => 'day',
            'sort_order' => 1,
            'currency' => 'USD',
        ]);

        // Create multiple plan features at once
        $plan->features()->saveMany([
            new PlanFeature(['name' => ['en' => 'Min Cost', 'ar' => 'اقل تكلفة'], 'value' => 80, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Max Cost', 'ar' => 'اعلى تكلغة'], 'value' => 100, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Number of Listing', 'ar' => 'عدد القوائم'], 'value' => 1, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Photos Per Listing', 'ar' => 'صور لكل قائمة'], 'value' => 6, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Video Per listing', 'ar' => 'فيديو لكل قائمة'], 'value' => 'false', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Listing in Arabic and English', 'ar' => 'الإدراج باللغتين العربية والإنجليزية'], 'value' => 'true', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'User Dashboard', 'ar' => 'لوحة تحكم المستخدم'], 'value' => 'true', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Live Chat', 'ar' => 'دردشة مباشرة'], 'value' => 'true', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Bulk Import', 'ar' => 'استيراد بالجملة'], 'value' => 'false', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Dedicated Account Manager', 'ar' => 'مدير حساب مخصص'], 'value' => '1 Hour Per Month', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Upgrade feature listing', 'ar' => 'ترقية قائمة الميزات'], 'value' => 'false', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Having discount on opening branded page', 'ar' => 'الحصول على خصم على فتح الصفحة ذات العلامات التجارية'], 'value' => 'false', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Subscription for branded page', 'ar' => 'الاشتراك في الصفحة ذات العلامات التجارية'], 'value' => 'false', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Machines to be boosted in the top', 'ar' => 'يتم تعزيز الآلات في الأعلى'], 'value' => 0, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Email Marketing', 'ar' => 'التسويق عبر البريد الإلكتروني'], 'value' => 'false', 'sort_order' => 1]),
        ]);

        //Distributor Package Gold Seed
        $plan = app('rinvex.subscriptions.plan')->create([
            'name' => [
                'en' => 'Distributor Gold',
                'ar' => 'موزع ذهبى'
             ],
             'description' => ['en' => 'Gold', 'ar' => 'ذهبى'],
             'price' => 500.00,
            'signup_fee' => 0.00,
            'invoice_period' => 6,
            'invoice_interval' => 'month',
            'trial_period' => 0,
            'trial_interval' => 'day',
            'sort_order' => 1,
            'currency' => 'USD',
        ]);
        
        // Create multiple plan features at once
        $plan->features()->saveMany([
            new PlanFeature(['name' => ['en' => 'Min Cost', 'ar' => 'اقل تكلفة'], 'value' => 500, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Max Cost', 'ar' => 'اعلى تكلغة'], 'value' => 560, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Number of Listing', 'ar' => 'عدد القوائم'], 'value' => 5, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Photos Per Listing', 'ar' => 'صور لكل قائمة'], 'value' => 11, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Video Per listing', 'ar' => 'فيديو لكل قائمة'], 'value' => 1, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Listing in Arabic and English', 'ar' => 'الإدراج باللغتين العربية والإنجليزية'], 'value' => 'true', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'User Dashboard', 'ar' => 'لوحة تحكم المستخدم'], 'value' => 'true', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Live Chat', 'ar' => 'دردشة مباشرة'], 'value' => 'true', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Bulk Import', 'ar' => 'استيراد بالجملة'], 'value' => 'false', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Dedicated Account Manager', 'ar' => 'مدير حساب مخصص'], 'value' => 'true', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Upgrade feature listing', 'ar' => 'ترقية قائمة الميزات'], 'value' => 'true', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Having discount on opening branded page', 'ar' => 'الحصول على خصم على فتح الصفحة ذات العلامات التجارية'], 'value' => '10%', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Subscription for branded page', 'ar' => 'الاشتراك في الصفحة ذات العلامات التجارية'], 'value' => 'true', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Machines to be boosted in the top', 'ar' => 'يتم تعزيز الآلات في الأعلى'], 'value' => 1, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Email Marketing', 'ar' => 'التسويق عبر البريد الإلكتروني'], 'value' => 'true', 'sort_order' => 1]),
        ]);


        //Distributor Package Platinum Seed
        $plan = app('rinvex.subscriptions.plan')->create([
            'name' => [
                'en' => 'Distributor Platinum',
                'ar' => 'موزع بلاتينى'
             ],
             'description' => ['en' => 'Platinum', 'ar' => 'بلاتينى'],
            'price' => 0.00,
            'signup_fee' => 0.00,
            'invoice_period' => 6,
            'invoice_interval' => 'month',
            'trial_period' => 0,
            'trial_interval' => 'day',
            'sort_order' => 1,
            'currency' => 'USD',
        ]);
        
        // Create multiple plan features at once
        $plan->features()->saveMany([
            new PlanFeature(['name' => ['en' => 'Min Cost', 'ar' => 'اقل تكلفة'], 'value' => 'Please Contact Us', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Max Cost', 'ar' => 'اعلى تكلغة'], 'value' => 'Please Contact Us', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Number of Listing', 'ar' => 'عدد القوائم'], 'value' => 'More than 10', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Photos Per Listing', 'ar' => 'صور لكل قائمة'], 'value' => 50, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Video Per listing', 'ar' => 'فيديو لكل قائمة'], 'value' => 3, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Listing in Arabic and English', 'ar' => 'الإدراج باللغتين العربية والإنجليزية'], 'value' => 'true', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'User Dashboard', 'ar' => 'لوحة تحكم المستخدم'], 'value' => 'true', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Live Chat', 'ar' => 'دردشة مباشرة'], 'value' => 'true', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Bulk Import', 'ar' => 'استيراد بالجملة'], 'value' => 'true', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Dedicated Account Manager', 'ar' => 'مدير حساب مخصص'], 'value' => 'true', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Upgrade feature listing', 'ar' => 'ترقية قائمة الميزات'], 'value' => 'true', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Having discount on opening branded page', 'ar' => 'الحصول على خصم على فتح الصفحة ذات العلامات التجارية'], 'value' => '20%', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Subscription for branded page', 'ar' => 'الاشتراك في الصفحة ذات العلامات التجارية'], 'value' => 'true', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Machines to be boosted in the top', 'ar' => 'يتم تعزيز الآلات في الأعلى'], 'value' => 3, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Email Marketing', 'ar' => 'التسويق عبر البريد الإلكتروني'], 'value' => 'true', 'sort_order' => 1]),
        ]);


        // 1 Years
         //Distributor Package Silver Seed
         $plan = app('rinvex.subscriptions.plan')->create([
            'name' => [
                'en' => 'Distributor Silver',
                'ar' => 'موزع فضى'
             ],
            'description' => ['en' => 'Silver', 'ar' => 'فضى'],
            'price' => 150.00,
            'signup_fee' => 0.00,
            'invoice_period' => 12,
            'invoice_interval' => 'month',
            'trial_period' => 0,
            'trial_interval' => 'day',
            'sort_order' => 1,
            'currency' => 'USD',
        ]);

        // Create multiple plan features at once
        $plan->features()->saveMany([
            new PlanFeature(['name' => ['en' => 'Min Cost', 'ar' => 'اقل تكلفة'], 'value' => 80, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Max Cost', 'ar' => 'اعلى تكلغة'], 'value' => 100, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Number of Listing', 'ar' => 'عدد القوائم'], 'value' => 1, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Photos Per Listing', 'ar' => 'صور لكل قائمة'], 'value' => 6, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Video Per listing', 'ar' => 'فيديو لكل قائمة'], 'value' => 'false', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Listing in Arabic and English', 'ar' => 'الإدراج باللغتين العربية والإنجليزية'], 'value' => 'true', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'User Dashboard', 'ar' => 'لوحة تحكم المستخدم'], 'value' => 'true', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Live Chat', 'ar' => 'دردشة مباشرة'], 'value' => 'true', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Bulk Import', 'ar' => 'استيراد بالجملة'], 'value' => 'false', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Dedicated Account Manager', 'ar' => 'مدير حساب مخصص'], 'value' => '1 Hour Per Month', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Upgrade feature listing', 'ar' => 'ترقية قائمة الميزات'], 'value' => 'false', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Having discount on opening branded page', 'ar' => 'الحصول على خصم على فتح الصفحة ذات العلامات التجارية'], 'value' => 'false', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Subscription for branded page', 'ar' => 'الاشتراك في الصفحة ذات العلامات التجارية'], 'value' => 'false', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Machines to be boosted in the top', 'ar' => 'يتم تعزيز الآلات في الأعلى'], 'value' => 0, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Email Marketing', 'ar' => 'التسويق عبر البريد الإلكتروني'], 'value' => 'false', 'sort_order' => 1]),
        ]);

        //Distributor Package Gold Seed
        $plan = app('rinvex.subscriptions.plan')->create([
            'name' => [
                'en' => 'Distributor Gold',
                'ar' => 'موزع ذهبى'
             ],
             'description' => ['en' => 'Gold', 'ar' => 'ذهبى'],
             'price' => 900.00,
            'signup_fee' => 0.00,
            'invoice_period' => 12,
            'invoice_interval' => 'month',
            'trial_period' => 0,
            'trial_interval' => 'day',
            'sort_order' => 1,
            'currency' => 'USD',
        ]);
        
        // Create multiple plan features at once
        $plan->features()->saveMany([
            new PlanFeature(['name' => ['en' => 'Min Cost', 'ar' => 'اقل تكلفة'], 'value' => 500, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Max Cost', 'ar' => 'اعلى تكلغة'], 'value' => 560, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Number of Listing', 'ar' => 'عدد القوائم'], 'value' => 5, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Photos Per Listing', 'ar' => 'صور لكل قائمة'], 'value' => 11, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Video Per listing', 'ar' => 'فيديو لكل قائمة'], 'value' => 1, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Listing in Arabic and English', 'ar' => 'الإدراج باللغتين العربية والإنجليزية'], 'value' => 'true', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'User Dashboard', 'ar' => 'لوحة تحكم المستخدم'], 'value' => 'true', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Live Chat', 'ar' => 'دردشة مباشرة'], 'value' => 'true', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Bulk Import', 'ar' => 'استيراد بالجملة'], 'value' => 'false', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Dedicated Account Manager', 'ar' => 'مدير حساب مخصص'], 'value' => 'true', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Upgrade feature listing', 'ar' => 'ترقية قائمة الميزات'], 'value' => 'true', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Having discount on opening branded page', 'ar' => 'الحصول على خصم على فتح الصفحة ذات العلامات التجارية'], 'value' => '10%', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Subscription for branded page', 'ar' => 'الاشتراك في الصفحة ذات العلامات التجارية'], 'value' => 'true', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Machines to be boosted in the top', 'ar' => 'يتم تعزيز الآلات في الأعلى'], 'value' => 1, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Email Marketing', 'ar' => 'التسويق عبر البريد الإلكتروني'], 'value' => 'true', 'sort_order' => 1]),
        ]);


        //Distributor Package Platinum Seed
        $plan = app('rinvex.subscriptions.plan')->create([
            'name' => [
                'en' => 'Distributor Platinum',
                'ar' => 'موزع بلاتينى'
             ],
             'description' => ['en' => 'Platinum', 'ar' => 'بلاتينى'],
            'price' => 0.00,
            'signup_fee' => 0.00,
            'invoice_period' => 12,
            'invoice_interval' => 'month',
            'trial_period' => 0,
            'trial_interval' => 'day',
            'sort_order' => 1,
            'currency' => 'USD',
        ]);
        
        // Create multiple plan features at once
        $plan->features()->saveMany([
            new PlanFeature(['name' => ['en' => 'Min Cost', 'ar' => 'اقل تكلفة'], 'value' => 'Please Contact Us', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Max Cost', 'ar' => 'اعلى تكلغة'], 'value' => 'Please Contact Us', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Number of Listing', 'ar' => 'عدد القوائم'], 'value' => 'More than 10', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Photos Per Listing', 'ar' => 'صور لكل قائمة'], 'value' => 50, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Video Per listing', 'ar' => 'فيديو لكل قائمة'], 'value' => 3, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Listing in Arabic and English', 'ar' => 'الإدراج باللغتين العربية والإنجليزية'], 'value' => 'true', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'User Dashboard', 'ar' => 'لوحة تحكم المستخدم'], 'value' => 'true', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Live Chat', 'ar' => 'دردشة مباشرة'], 'value' => 'true', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Bulk Import', 'ar' => 'استيراد بالجملة'], 'value' => 'true', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Dedicated Account Manager', 'ar' => 'مدير حساب مخصص'], 'value' => 'true', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Upgrade feature listing', 'ar' => 'ترقية قائمة الميزات'], 'value' => 'true', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Having discount on opening branded page', 'ar' => 'الحصول على خصم على فتح الصفحة ذات العلامات التجارية'], 'value' => '20%', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Subscription for branded page', 'ar' => 'الاشتراك في الصفحة ذات العلامات التجارية'], 'value' => 'true', 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Machines to be boosted in the top', 'ar' => 'يتم تعزيز الآلات في الأعلى'], 'value' => 3, 'sort_order' => 1]),
            new PlanFeature(['name' => ['en' => 'Email Marketing', 'ar' => 'التسويق عبر البريد الإلكتروني'], 'value' => 'true', 'sort_order' => 1]),
        ]);
    }
}
