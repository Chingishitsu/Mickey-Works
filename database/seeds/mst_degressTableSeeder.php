<?php

use Illuminate\Database\Seeder;

class mst_degressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
          'name' => '小学',
          'rank' => '1',
        ];
        DB::table('mst_degrees')->insert($param);

        $param = [
          'name' => '中学',
          'rank' => '2',
        ];
        DB::table('mst_degrees')->insert($param);

        $param = [
          'name' => '高校',
          'rank' => '3',
        ];
        DB::table('mst_degrees')->insert($param);

        $param = [
          'name' => '専門学校',
          'rank' => '4',
        ];
        DB::table('mst_degrees')->insert($param);

        $param = [
          'name' => '大学',
          'rank' => '5',
        ];
        DB::table('mst_degrees')->insert($param);

        $param = [
          'name' => '修士',
          'rank' => '6',
        ];
        DB::table('mst_degrees')->insert($param);

        $param = [
          'name' => '博士',
          'rank' => '7',
        ];
        DB::table('mst_degrees')->insert($param);
    }
}
