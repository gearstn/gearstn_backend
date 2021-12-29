<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Modules\Manufacture\Entities\Manufacture;
use Modules\SubCategory\Entities\SubCategory;

class CreateManufactureSubCategoryRelationCommand extends Command
{
   /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'relation:fix';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Converting Relationship of manufacture and sub_category to many to many relationship';

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
        $manufactures = Manufacture::all();
        $sub_categories = SubCategory::all()->pluck('id')->toArray();
        foreach ($manufactures as  $manufacture) {
            $manufacture->sub_categories()->attach($sub_categories);
        }
    }

}
