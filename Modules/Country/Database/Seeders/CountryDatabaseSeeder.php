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
            array('id' => '2','name_ar' => 'الإمارات العربية المتحدة','name_fr' => 'Emirats Arabes Unis','name_en' => 'United Arab Emirates','code' => 'ae'),
            array('id' => '3','name_ar' => 'أفغانستان','name_fr' => 'L\'Afghanistan','name_en' => 'Afghanistan','code' => 'af'),
            array('id' => '7','name_ar' => 'أرمينيا','name_fr' => 'Arménie','name_en' => 'Armenia','code' => 'am'),
            array('id' => '14','name_ar' => 'أذربيجان','name_fr' => 'Azerbaïdjan','name_en' => 'Azerbaijan','code' => 'az'),
            array('id' => '21','name_ar' => 'البحرين','name_fr' => 'Bahreïn','name_en' => 'Bahrain','code' => 'bh'),
            array('id' => '49','name_ar' => 'قبرص','name_fr' => 'Chypre','name_en' => 'Cyprus','code' => 'cy'),
            array('id' => '52','name_ar' => 'جيبوتي','name_fr' => 'Djibouti','name_en' => 'Djibouti','code' => 'dj'),
            array('id' => '56','name_ar' => 'الجزائر','name_fr' => 'Algérie','name_en' => 'Algeria','code' => 'dz'),
            array('id' => '59','name_ar' => 'مصر','name_fr' => 'Egypte','name_en' => 'Egypt','code' => 'eg'),
            array('id' => '60','name_ar' => 'الصحراء الغربية','name_fr' => 'Sahara occidental','name_en' => 'Western Sahara','code' => 'eh'),
            array('id' => '73','name_ar' => 'جورجيا','name_fr' => 'Géorgie','name_en' => 'Georgia','code' => 'ge'),
            array('id' => '97','name_ar' => 'العراق','name_fr' => 'Irak','name_en' => 'Iraq','code' => 'iq'),
            array('id' => '98','name_ar' => 'إيران','name_fr' => 'Iran','name_en' => 'Iran','code' => 'ir'),
            array('id' => '102','name_ar' => 'الأردن','name_fr' => 'Jordan','name_en' => 'Jordan','code' => 'jo'),
            array('id' => '112','name_ar' => 'الكويت','name_fr' => 'Koweit','name_en' => 'Kuwait','code' => 'kw'),
            array('id' => '116','name_ar' => 'لبنان','name_fr' => 'Liban','name_en' => 'Lebanon','code' => 'lb'),
            array('id' => '125','name_ar' => 'ليبيا','name_fr' => 'Libye','name_en' => 'Libya','code' => 'ly'),
            array('id' => '126','name_ar' => 'المغرب','name_fr' => 'Maroc','name_en' => 'Morocco','code' => 'ma'),
            array('id' => '138','name_ar' => 'موريتانيا','name_fr' => 'Mauritanie','name_en' => 'Mauritania','code' => 'mr'),
            array('id' => '140','name_ar' => 'مالطا','name_fr' => 'Malte','name_en' => 'Malta','code' => 'mt'),
            array('id' => '159','name_ar' => 'سلطنة عمان','name_fr' => 'Oman','name_en' => 'Oman','code' => 'om'),
            array('id' => '165','name_ar' => 'باكستان','name_fr' => 'Pakistan','name_en' => 'Pakistan','code' => 'pk'),
            array('id' => '169','name_ar' => 'الأراضي الفلسطينية','name_fr' => 'Territoire Palestinien','name_en' => 'Palestinian Territory','code' => 'ps'),
            array('id' => '173','name_ar' => 'دولة قطر','name_fr' => 'Qatar','name_en' => 'Qatar','code' => 'qa'),
            array('id' => '178','name_ar' => 'المملكة العربية السعودية','name_fr' => 'Arabie Saoudite','name_en' => 'Saudi Arabia','code' => 'sa'),
            array('id' => '181','name_ar' => 'سودان','name_fr' => 'Soudan','name_en' => 'Sudan','code' => 'sd'),
            array('id' => '191','name_ar' => 'الصومال','name_fr' => 'Somalie','name_en' => 'Somalia','code' => 'so'),
            array('id' => '205','name_ar' => 'تونس','name_fr' => 'Tunisie','name_en' => 'Tunisia','code' => 'tn'),
            array('id' => '207','name_ar' => 'ديك رومي','name_fr' => 'dinde','name_en' => 'Turkey','code' => 'tr'),
            array('id' => '224','name_ar' => 'اليمن','name_fr' => 'Yémen','name_en' => 'Yemen','code' => 'ye'),
            ];



        DB::table('countries')->insert($countries);
    }
}
