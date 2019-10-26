<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
//        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();


        $role = Role::create(['name' => 'super-admin'])
            ->givePermissionTo(['create-user', 'delete-user']);

        $role = Role::create(['name' => 'doctor'])
            ->givePermissionTo(['add-appointment']);

        $role = Role::create(['name' => 'patient'])
            ->givePermissionTo(['create-reservation']);

        $admin=User::where('name','Admin')->get()->first();
        $admin->assignRole('super-admin');
        $doc=User::where('name','Doctor')->get()->first();
        $doc->assignRole('doctor');
        $patient=User::where('name','Patient')->get()->first();
        $patient->assignRole('patient');
    }
}
