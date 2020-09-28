<?php
namespace Database\Seeders;
use App\Models\Roles;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = new Roles();
        $role_admin->role_id = 1;
        $role_admin->role_name = 'admin';
        $role_admin->save();

        $role_student = new Roles();
        $role_student->role_id = 2;
        $role_student->role_name = 'student';
        $role_student->save();

        $role_teacher = new Roles();
        $role_teacher->role_id = 3;
        $role_teacher->role_name = 'teacher';
        $role_teacher->save();
    }
}
