<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Admin::class)->create([
            'name' => 'admin',
            'email' => 'mm@mm.es',
            'password' => bcrypt('111111'),
        ]);
    }
}
