<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\str;

class postsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $arr=[1,2,3];
        for ($i = 1; $i < 5; $i++)
            {
             DB::table("posts")->insert([
                'title'=>'title'.$i,
                'category_id'=>$i,
                'image'=>'image',
                'content'=>'content'
             ]);
            }
    }
}
