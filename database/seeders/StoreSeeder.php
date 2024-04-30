<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Store;
use App\Models\StoreRate;
use App\Models\AccountBalance;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $stores = ['fthlaa' , 'balma' , 'revo' , 'slamoky' , 'lob'];

        foreach($stores as $store){

            $store = Store::create([
                'name'=>$store,
                'email'=>$store.'@gmail.com',
                'user_name'=>$store.'11',
                'password'=>bcrypt('salimsalim'),
                'phone'=>01222334345,
                'governorate_id'=>1,
                'city_id'=>1,
                'street'=>'abou hoomos',
                'status'=>'pending',
            ]);
            // create account balance
            AccountBalance::create([
                'store_id' => $store->id,
                'value'=>4000,
                'status'=>'enable',
            ]);

            // make Rate
            $users = User::all();
            foreach($users as $user){
                StoreRate::create([
                    'user_id'=>$user->id,
                    'store_id'=>$store->id,
                    'value'=>random_int(1,5),
                ]);
            }


        }
    }
}
