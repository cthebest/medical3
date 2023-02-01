<?php

namespace Database\Seeders;

use App\Models\Roles\Permission;
use App\Models\Roles\Role;
use App\Models\Roles\RoleUser;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class UserDatabaseSeeder extends Seeder
{
    public function run()
    {
        Model::unguard();

        Permission::firstOrCreate(['name' => 'view_users', 'label' => 'Ver usuarios', 'module' => 'Usuarios']);
        Permission::firstOrCreate(['name' => 'view_users_profiles', 'label' => 'View perfil de usuarios', 'module' => 'Usuarios']);
        Permission::firstOrCreate(['name' => 'view_users_activity', 'label' => 'View actividad de usuarios', 'module' => 'Usuarios']);
        Permission::firstOrCreate(['name' => 'add_users', 'label' => 'Añadir usuarios', 'module' => 'Usuarios']);
        Permission::firstOrCreate(['name' => 'edit_users', 'label' => 'Editar Usuarios', 'module' => 'Usuarios']);
        Permission::firstOrCreate(['name' => 'edit_own_account', 'label' => 'Editar cuenta personal', 'module' => 'Usuarios']);
        Permission::firstOrCreate(['name' => 'delete_users', 'label' => 'Eliminar usuarios', 'module' => 'Usuarios']);

        // Articles module.
        Permission::firstOrCreate(['name' => 'view_articles', 'label' => 'Ver artículos', 'module' => 'Artículos']);
        Permission::firstOrCreate(['name' => 'add_articles', 'label' => 'Añadir artículos', 'module' => 'Artículos']);
        Permission::firstOrCreate(['name' => 'edit_articles', 'label' => 'Editar artículos', 'module' => 'Artículos']);
        Permission::firstOrCreate(['name' => 'delete_articles', 'label' => 'Eliminar artículos', 'module' => 'Artículos']);

        // Services module.
        Permission::firstOrCreate(['name' => 'view_services', 'label' => 'Ver servicios', 'module' => 'Servicios']);
        Permission::firstOrCreate(['name' => 'add_services', 'label' => 'Añadir servicios', 'module' => 'Servicios']);
        Permission::firstOrCreate(['name' => 'edit_services', 'label' => 'Editar servicios', 'module' => 'Servicios']);
        Permission::firstOrCreate(['name' => 'delete_services', 'label' => 'Eliminar servicios', 'module' => 'Servicios']);

        // Menu module.
        Permission::firstOrCreate(['name' => 'view_menus', 'label' => 'Ver ítem de menús', 'module' => 'Menús']);
        Permission::firstOrCreate(['name' => 'add_menus', 'label' => 'Añadir ítem de menús', 'module' => 'Menús']);
        Permission::firstOrCreate(['name' => 'edit_menus', 'label' => 'Editar ítem de menús', 'module' => 'Menús']);
        Permission::firstOrCreate(['name' => 'delete_menus', 'label' => 'Eliminar ítem de menús', 'module' => 'Menús']);

        // Agenda module.
        Permission::firstOrCreate(['name' => 'view_calendar', 'label' => 'Ver calendario', 'module' => 'Agenda']);
        Permission::firstOrCreate(['name' => 'view_working_hour', 'label' => 'Ver horario laboral', 'module' => 'Agenda']);
        Permission::firstOrCreate(['name' => 'add_working_hour', 'label' => 'Añadir horario laboral', 'module' => 'Agenda']);
        Permission::firstOrCreate(['name' => 'edit_working_hour', 'label' => 'Editar horario laboral', 'module' => 'Agenda']);
        Permission::firstOrCreate(['name' => 'set_appointment_time', 'label' => 'Configurar duración de la cita', 'module' => 'Agenda']);

        //create developer uncomment to use when seeding

        $user = User::firstOrCreate(['email' => 'user@domain.com'], [
            'name'                 => 'Username',
            'slug'                 => 'username',
            'email'                => 'user@domain.com',
            'password'             => bcrypt('ChangeMe!'),
            'is_active'            => 1,
            'is_office_login_only' => 0
        ]);

        //generate image
        $name      = get_initials($user->name);
        $id        = $user->id . '.png';
        $path      = 'users/';
        $imagePath = create_avatar($name, $id, $path);

        //save image
        $user->image = $imagePath;
        $user->save();

        $role = Role::where('name', 'admin')->first();
        RoleUser::firstOrCreate([
            'role_id' => $role->id,
            'user_id' => $user->id
        ]);

    }
}
