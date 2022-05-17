<?php

namespace Modules\Country\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CountryDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Model::unguard();

        // $this->call("OthersTableSeeder");


        $countries = [
            array('title_ar' => 'الإمارات العربية المتحدة', 'title_en' => 'United Arab Emirates','code' => 'ae')  /*  'id' => '2', */,
            array('title_ar' => 'البحرين','title_en' => 'Bahrain','code' => 'bh')  /*  'id' => '21', */,
            array('title_ar' => 'جيبوتي','title_en' => 'Djibouti','code' => 'dj')  /*  'id' => '52', */,
            array('title_ar' => 'الجزائر','title_en' => 'Algeria','code' => 'dz')  /*  'id' => '56', */,
            array('title_ar' => 'مصر','title_en' => 'Egypt','code' => 'eg')  /*  'id' => '59', */,
            array('title_ar' => 'العراق','title_en' => 'Iraq','code' => 'iq')  /*  'id' => '97', */,
            array('title_ar' => 'الأردن','title_en' => 'Jordan','code' => 'jo')  /*  'id' => '102', */,
            array('title_ar' => 'الكويت','title_en' => 'Kuwait','code' => 'kw')  /*  'id' => '112', */,
            array('title_ar' => 'لبنان','title_en' => 'Lebanon','code' => 'lb')  /*  'id' => '116', */,
            array('title_ar' => 'ليبيا','title_en' => 'Libya','code' => 'ly')  /*  'id' => '125', */,
            array('title_ar' => 'المغرب','title_en' => 'Morocco','code' => 'ma')  /*  'id' => '126', */,
            array('title_ar' => 'سلطنة عمان','title_en' => 'Oman','code' => 'om')  /*  'id' => '159', */,
            array('title_ar' => 'فلسطين','title_en' => 'Palestinian Territory','code' => 'ps')  /*  'id' => '169', */,
            array('title_ar' => 'دولة قطر','title_en' => 'Qatar','code' => 'qa')  /*  'id' => '173', */,
            array('title_ar' => 'المملكة العربية السعودية','title_en' => 'Saudi Arabia','code' => 'sa')  /*  'id' => '178', */,
            array('title_ar' => 'سودان','title_en' => 'Sudan','code' => 'sd')  /*  'id' => '181', */,
            array('title_ar' => 'تونس','title_en' => 'Tunisia','code' => 'tn')  /*  'id' => '205', */,
            array('title_ar' => 'اليمن','title_en' => 'Yemen','code' => 'ye')  /*  'id' => '224', */,
            ];

        DB::table('countries')->insert($countries);
    }
}
