<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::factory()->count(5)->create();
        $permissions=Permission::all();
        $roles=Role::all()->pluck('id');
        
        foreach ($permissions as $permission) {
            $permission->role()->attach($roles[rand(0,$roles->count()-1)]);
        }
    }
}
