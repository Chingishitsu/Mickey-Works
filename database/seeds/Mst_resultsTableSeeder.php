<?php

use Illuminate\Database\Seeder;

class Mst_resultsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
          'name' => '未読',
          'rank' => '1',
        ];
        DB::table('mst_results')->insert($param);

        $param = [
          'name' => '合格',
          'rank' => '2',
        ];
        DB::table('mst_results')->insert($param);

        $param = [
          'name' => '未定',
          'rank' => '3',
        ];
        DB::table('mst_results')->insert($param);

        $param = [
          'name' => '不合格',
          'rank' => '4',
        ];
        DB::table('mst_results')->insert($param);
    }
}
