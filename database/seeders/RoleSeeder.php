<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Gerente']);
        $role2 = Role::create(['name' => 'EncargadoSucursal']); //ES
        $role3 = Role::create(['name' => 'Maestro']);
        $role4 = Role::create(['name' => 'Cliente']);

        //Gerente da de alta, edita, elimina encargado de sucursal y maestros (empleados)

        $permission = Permission::create(['name' => 'gerente.categories.index'])->assignRole($role1);
        $permission = Permission::create(['name' => 'gerente.categories.createEmpleado'])->assignRole($role1);
        $permission = Permission::create(['name' => 'gerente.categories.editEmpleado'])->assignRole($role1);
        $permission = Permission::create(['name' => 'gerente.categories.seeEmpleado'])->assignRole($role1);
        $permission = Permission::create(['name' => 'gerente.categories.deleteEmpleado'])->assignRole($role1);

        $permission = Permission::create(['name' => 'gerente.membership.index'])->assignRole($role1);
        $permission = Permission::create(['name' => 'gerente.membership.editMembresia'])->assignRole($role1);
        $permission = Permission::create(['name' => 'gerente.membership.deleteMembresia'])->assignRole($role1);
        
        //Permisos del encargado de sucursal
        $permission = Permission::create(['name' => 'gerenteEncargadoS.categories.index'])->syncRoles($role1, $role2);
        $permission = Permission::create(['name' => 'gerenteEncargadoS.categories.createCliente'])->syncRoles($role1, $role2);
        $permission = Permission::create(['name' => 'gerenteEncargadoS.categories.deleteCliente'])->syncRoles($role1, $role2);
        $permission = Permission::create(['name' => 'gerenteEncargadoS.categories.editCliente'])->syncRoles($role1, $role2);
        $permission = Permission::create(['name' => 'gerenteEncargadoS.categories.seeCliente'])->syncRoles($role1, $role2);

        $permission = Permission::create(['name' => 'gerenteEncargadoS.course.index'])->syncRoles($role1, $role2);
        $permission = Permission::create(['name' => 'gerenteEncargadoS.course.createClase'])->syncRoles($role1, $role2);
        $permission = Permission::create(['name' => 'gerenteEncargadoS.course.editClase'])->syncRoles($role1, $role2);

        $permission = Permission::create(['name' => 'EncargadoSucursal.payment.index'])->assignRole($role2);
        $permission = Permission::create(['name' => 'EncargadoSucursal.payment.registerPayment'])->assignRole($role2);

        //Permisos del maestro
        $permission = Permission::create(['name' => 'maestro.personal.index'])->assignRole($role3);
        $permission = Permission::create(['name' => 'maestro.personal.seeInformacionPersonal'])->assignRole($role3);
        $permission = Permission::create(['name' => 'maestro.personal.editInformacionPersonal'])->assignRole($role3);

        $permission = Permission::create(['name' => 'maestro.categories.index'])->assignRole($role3);
        $permission = Permission::create(['name' => 'maestro.categories.seeClases'])->assignRole($role3);
        $permission = Permission::create(['name' => 'maestro.categories.seeClienteRegistradoEnClase'])->assignRole($role3);

        //Permisos del cliente
        $permission = Permission::create(['name' => 'cliente.categories.index'])->assignRole($role4);
        $permission = Permission::create(['name' => 'cliente.categories.registrarseEnUnaClase'])->assignRole($role4);
        $permission = Permission::create(['name' => 'cliente.categories.cancelarAgendaDeUnaClase'])->assignRole($role4);

        $permission = Permission::create(['name' => 'cliente.personal.index'])->assignRole($role4);
        $permission = Permission::create(['name' => 'cliente.personal.seeInformacionPersonal'])->assignRole($role4);
        $permission = Permission::create(['name' => 'cliente.personal.editInformacionPersonal'])->assignRole($role4);
        $permission = Permission::create(['name' => 'cliente.personal.seeClasesRegistradas'])->assignRole($role4);
    }
}
