<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Modules\Country\Entities\Country;
use Modules\Machine\Entities\Machine;
use Modules\SparePart\Entities\SparePart;

class AddCountryIDToExistingMachinesSpareParts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'machines-spare-parts:country-id';

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
        $egypt = Country::where('title_en', 'Egypt')->first();
        $machines = Machine::all();
        $spare_parts = SparePart::all();

        foreach ($machines as $machines) {
            $machines->country_id = $egypt->id;
            $machines->save();
        }

        foreach ($spare_parts as $spare_part) {
            $spare_part->country_id = $egypt->id;
            $spare_part->save();
        }
    }
}
