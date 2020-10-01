<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name'  => 'full control',
            'guard_name' => 'web',
        ]);

        Permission::create([
            'name'  => 'read only',
            'guard_name' => 'web',
        ]);
    }
}
