<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class InterestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $dt = Carbon::now();
        for($i = 10; $i <= 20; $i++){
            DB::table('interests')->insert([

                'user_id' => 1,
                'idea_id' => $i,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        for($i = 2; $i <= 8; $i++){
            
            for($x = 1; $x <= 6; $x++){
            DB::table('interests')->insert([
                'user_id' => $i,
                'idea_id' => $x + $i,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                ]);
            }

            DB::table('interests')->insert([
                'user_id' => $i,
                'idea_id' => 30,
                'created_at' => $dt->subWeek(),
                'updated_at' => Carbon::now(),
                ]);
        }

        for($i = 3; $i <= 8; $i++){
            
            for($x = 1; $x <= 6; $x++){
            DB::table('interests')->insert([
                'user_id' => $i,
                'idea_id' => $x + $i,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                ]);
            }

            DB::table('interests')->insert([
                'user_id' => $i,
                'idea_id' => 30,
                'created_at' => $dt->subWeek(),
                'updated_at' => Carbon::now(),
                ]);
        }

        DB::table('interests')->insert([
            'user_id' => 3,
            'idea_id' => 30,
            'created_at' => $dt->subWeek(),
            'updated_at' => Carbon::now(),
            ]);
        
    }
}
