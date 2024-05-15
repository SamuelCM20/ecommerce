<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{

  public function run()
  {
    $permissionsAdmin = [
      'users.index',
      'users.create',
      'users.store',
      'users.edit',
      'users.update',
      'users.destroy',
      'products.index',
      'products.show',
      'products.store',
      'products.update',
      'products.destroy',
      'categories.index',
      'categories.get-all',
      'categories.create',
      'categories.store',
      'categories.edit',
      'categories.update',
      'categories.destroy',
    ];
    Role::create(['name' => 'user']);
    $admin = Role::create(['name' => 'admin']);

    foreach ($permissionsAdmin as $permission) {
      $permission = Permission::create(['name' => $permission]);
      $admin->givePermissionTo($permission);
    }
  }
}
