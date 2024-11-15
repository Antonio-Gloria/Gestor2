<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // roles
        $admin = Role::create(['name' => 'Admin']);
        $colaborador = Role::create(['name' => 'Colaborador']);
        // permisos
        Permission::create(['name' => 'servicios.index'])->syncRoles($admin, $colaborador);
        Permission::create(['name' => 'servicios.show'])->syncRoles($admin, $colaborador);
        Permission::create(['name' => 'servicios.edit'])->syncRoles($admin, $colaborador);
        Permission::create(['name' => 'servicios.update'])->syncRoles($admin);
        Permission::create(['name' => 'servicios.destroy'])->syncRoles($admin);
        Permission::create(['name' => 'tiposervicios.index'])->syncRoles($admin);
        Permission::create(['name' => 'tiposervicios.create'])->syncRoles($admin);
        Permission::create(['name' => 'tiposervicios.edit'])->syncRoles($admin);
        Permission::create(['name' => 'tiposervicios.destroy'])->syncRoles($admin);
        Permission::create(['name' => 'tecnicos.index'])->syncRoles($admin);
        Permission::create(['name' => 'tecnicos.create'])->syncRoles($admin);
        Permission::create(['name' => 'tecnicos.edit'])->syncRoles($admin);
        Permission::create(['name' => 'tecnicos.destroy'])->syncRoles($admin);
        Permission::create(['name' => 'realizado-servicio'])->syncRoles($admin, $colaborador);
        Permission::create(['name' => 'delete-servicio'])->syncRoles($admin);
        Permission::create(['name' => 'info-servicio'])->syncRoles($admin);
        Permission::create(['name' => 'realizar-servicio'])->syncRoles($admin, $colaborador);
        Permission::create(['name' => 'users.dashboard'])->syncRoles($admin);
        Permission::create(['name' => 'users.index'])->syncRoles($admin);
        Permission::create(['name' => 'users.create'])->syncRoles($admin);
        Permission::create(['name' => 'users.edit'])->syncRoles($admin);
        Permission::create(['name' => 'users.delete'])->syncRoles($admin);
        Permission::create(['name' => 'assign.roles'])->syncRoles($admin);
        Permission::create(['name' => 'dashboard.index'])->syncRoles($admin);
        $role = Role::findByName('Admin');

        $user = User::create([
            'name' => 'Daniel Antonio',
            'email' => 'elafrox1991@gmail.com',
            'password' => bcrypt('1234567'),
        ]);

        $user->assignRole($role);
    }
}
