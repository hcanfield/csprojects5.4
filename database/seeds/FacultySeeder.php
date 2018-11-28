<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('roleType', 'sponsor')->first();

        $user = User::create([
            'username'=>'sdeloach',
            'roleID'=>$role->id,
            'email'=>'sdeloach@ksu.edu'
        ]);
        $user = User::create([
            'username'=>'amariucai',
            'roleID'=>$role->id,
            'email'=>'amariucai@ksu.edu'
        ]);
        $user = User::create([
            'username'=>'tamtoft',
            'roleID'=>$role->id,
            'email'=>'tamtoft@ksu.edu'
        ]);
        $user = User::create([
            'username'=>'dan',
            'roleID'=>$role->id,
            'email'=>'dan@ksu.edu'
        ]);
        $user = User::create([
            'username'=>'nhbean',
            'roleID'=>$role->id,
            'email'=>'nhbean@ksu.edu'
        ]);
        $user = User::create([
            'username'=>'ccaragea',
            'roleID'=>$role->id,
            'email'=>'ccaragea@ksu.edu'
        ]);
        $user = User::create([
            'username'=>'dcaragea',
            'roleID'=>$role->id,
            'email'=>'dcaragea@ksu.edu'
        ]);
        $user = User::create([
            'username'=>'russfeld',
            'roleID'=>$role->id,
            'email'=>'russfeld@ksu.edu'
        ]);
        $user = User::create([
            'username'=>'hatcliff',
            'roleID'=>$role->id,
            'email'=>'hatcliff@ksu.edu'
        ]);
        $user = User::create([
            'username'=>'bhsu',
            'roleID'=>$role->id,
            'email'=>'bhsu@ksu.edu'
        ]);
        $user = User::create([
            'username'=>'dlang1',
            'roleID'=>$role->id,
            'email'=>'dlang1@ksu.edu'
        ]);
        $user = User::create([
            'username'=>'masaaki',
            'roleID'=>$role->id,
            'email'=>'masaaki@ksu.edu'
        ]);
        $user = User::create([
            'username'=>'amunir',
            'roleID'=>$role->id,
            'email'=>'amunir@ksu.edu'
        ]);
        $user = User::create([
            'username'=>'neilsen',
            'roleID'=>$role->id,
            'email'=>'neilsen@ksu.edu'
        ]);
        $user = User::create([
            'username'=>'pprabhakar',
            'roleID'=>$role->id,
            'email'=>'pprabhakar@ksu.edu'
        ]);
        $user = User::create([
            'username'=>'rvprasad',
            'roleID'=>$role->id,
            'email'=>'rvprasad@ksu.edu'
        ]);
        $user = User::create([
            'username'=>'robby',
            'roleID'=>$role->id,
            'email'=>'robby@ksu.edu'
        ]);
        $user = User::create([
            'username'=>'juliet',
            'roleID'=>$role->id,
            'email'=>'juliet@ksu.edu'
        ]);
        $user = User::create([
            'username'=>'jvalenzu',
            'roleID'=>$role->id,
            'email'=>'jvalenzu@ksu.edu'
        ]);
        $user = User::create([
            'username'=>'eyv',
            'roleID'=>$role->id,
            'email'=>'eyv@ksu.edu'
        ]);
        $user = User::create([
            'username'=>'weeser',
            'roleID'=>$role->id,
            'email'=>'weeser@ksu.edu'
        ]);
    }
}
