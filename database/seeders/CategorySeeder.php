<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CategorySeeder extends Seeder
{
    public function run():void
    {
        DB::table('categories')->insert([
            [
                'name'=> 'PHP', 'visible'=> true, 'created_at'=>Carbon::now(),
                'updated_at'=>null
            ],
            [
                'name'=> 'Javascript','visible'=> true, 'created_at'=>Carbon::now(),
                'updated_at'=>null
            ],
            [
                'name'=> 'CSS','visible'=> true, 'created_at'=>Carbon::now(),
                'updated_at'=>null
            ],
        ]);
    }
}
