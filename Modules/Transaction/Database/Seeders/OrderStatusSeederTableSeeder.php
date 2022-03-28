<?php

namespace Modules\Transaction\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Transaction\Entities\OrderStatus;

class OrderStatusSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status1 = ['name'=>'PAID'];
        $status2 = ['name'=>'UNPAID'];
        $status3 = ['name'=>'REFUNDED'];
        $status4 = ['name'=>'SUCCESS'];
        $status5 = ['name'=>'FAILD'];
        $status6 = ['name'=>'TIMEOUT'];
        $status7 = ['name'=>'CANCELED'];
        $status8 = ['name'=>'EXPIRED'];
        OrderStatus::create($status1);
        OrderStatus::create($status2);
        OrderStatus::create($status3);
        OrderStatus::create($status4);
        OrderStatus::create($status5);
        OrderStatus::create($status6);
        OrderStatus::create($status7);
        OrderStatus::create($status8);
    }
}
