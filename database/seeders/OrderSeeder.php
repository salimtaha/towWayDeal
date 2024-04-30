<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order_status = ['completed' , 'paid' , 'pending'];
        $order_details_qy = [2,4,3];

        foreach($order_status as $status){

            $order = Order::create([
               'user_id'=>random_int(1,2),
               'status'=>$status,
               'governorate_id'=>random_int(1,5),
               'city_id'=>random_int(1,5),
               'address'=>'الحي السكني',
               'name'=>'سالم',
               'phone'=>'01224445454',
               'email'=>'salim@gmail.com',
               'total_price'=>100,
               'shipping_price'=>20,
               'payment_method'=>'فودافون كاش',
            ]);
            foreach($order_details_qy as $qy){
                OrderDetail::create([
                    'order_id'=>$order->id,
                    'product_id'=>random_int(1,5),
                    'product_name'=>'عسل',
                    'product_price'=>50,
                    'product_quantity'=>100,
                    'expire_date'=>date('Y-m-d'),

                ]);
            }


        }
    }
}
