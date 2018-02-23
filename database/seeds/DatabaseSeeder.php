<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // $this->call('mst_csubsTableSeeder');
      // $this->call('mst_degressTableSeeder');
      // $this->call('Mst_resultsTableSeeder');
      // $this->call('mst_csubsTableSeeder');
         $this->call(mst_csubsTableSeeder::class);
         $this->call(mst_degressTableSeeder::class);
         $this->call(Mst_resultsTableSeeder::class);
         $this->call(Mst_ssubsTableSeeder::class);
    }
}
