<?php

namespace Database\Seeders;

use App\Models\Mediator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MediatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $meditors = ['ali' , 'hassan' , 'ahmed'];
        foreach($meditors as $meditor){
            Mediator::create([
                'name'=>$meditor,
                'email'=>$meditor.'@gmail.com',
                'user_name'=>$meditor.'user name',
                'password'=>bcrypt('salimsalim'),
                'image'=>'default.jpg',
            ]);

        }
    }
}
