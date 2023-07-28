<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();
        $statuses = ['Author', 'Editor', 'Subscriber', 'Administrator'];

        foreach ($statuses as $status) {
            DB::table('roles')->insert([
                'name' => $status,
            ]);
        }
    }
}
