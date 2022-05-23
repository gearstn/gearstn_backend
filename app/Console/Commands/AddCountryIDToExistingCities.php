<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Modules\City\Entities\City;
use Modules\Country\Entities\Country;

class AddCountryIDToExistingCities extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'city:country-id';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $egypt = Country::where('title_en','Egypt')->first();
        $cities = City::all();

        foreach ($cities as $city) {
            $city->country_id = $egypt->id;
            $city->save();
        }
    }
}
