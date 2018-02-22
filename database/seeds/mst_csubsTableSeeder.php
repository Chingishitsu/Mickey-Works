<?php

use Illuminate\Database\Seeder;

class mst_csubsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $param = [
        'name' => 'IT',
        'rank' => '1',
      ];
      DB::table('mst_csubs')->insert($param);

      $param = [
        'name' => '経済',
        'rank' => '2',
      ];
      DB::table('mst_csubs')->insert($param);

      $param = [
        'name' => '販売',
        'rank' => '3',
      ];
      DB::table('mst_csubs')->insert($param);

      $param = [
        'name' => '飲食',
        'rank' => '4',
      ];
      DB::table('mst_csubs')->insert($param);

      $param = [
        'name' => '看護',
        'rank' => '5',
      ];
      DB::table('mst_csubs')->insert($param);

      $param = [
        'name' => '運送',
        'rank' => '6',
      ];
      DB::table('mst_csubs')->insert($param);
    }
}
