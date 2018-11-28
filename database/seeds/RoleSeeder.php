<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create([
            'roleType' => 'Student',
        ]);
        $role = Role::create([
            'roleType' => 'Sponsor',
        ]);
        $role = Role::create([
            'roleType' => 'Adminstrator',
        ]);
    }
}
