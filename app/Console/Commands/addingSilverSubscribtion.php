<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class addingSilverSubscribtion extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'silver:subscription';

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
        $subscription = app('rinvex.subscriptions.plan')->find(1);
        $users = User::whereHas(
            'roles', function($q){
                $q->where('name', 'distributor');
            }
        )->get();

        $users = $users->where('id' ,'!=', 27);
        $users = $users->where('id' ,'!=', 103);

        foreach ($users as $user) {
            $user->newSubscription($subscription->slug.'-'.$user->id,$subscription);
        }
    }
}
