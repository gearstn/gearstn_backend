<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ModifyPlansSlug extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'plan:modify-slug';

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
        $subscriptions = app('rinvex.subscriptions.plan')->where('slug', 'LIKE', '%'.'distributor'.'%')->get();
        foreach ($subscriptions as $subscription) {
            $old_slug = $subscription->slug;
            $new_slug = str_replace('distributor', 'machine-distributor', $old_slug);
            $subscription->slug = $new_slug;
            $subscription->save();
        }
    }
}
