<?php

namespace Modules\BrandedPage\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\BrandedPage\Entities\BrandedPage;

class BrandedPageDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = [
            [
                'slug' => 'test',
                'about_en' => 'test',
                'about_ar' => 'test',
                'address' => 'test',
                'facebook_link' => 'test',
                'twitter_link' => 'test',
                'website_link' => 'test',
                'user_id' => 1,
                'image_id' => 1,
            ],
       ];

       foreach ($pages as $page) {
           BrandedPage::create($page);
       }
    }
}
