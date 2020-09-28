<?php
namespace Database\Seeders;
use App\Models\Role;
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
        $role_admin = new Role();
        $role_admin->role_name = 'admin';
        $role_admin->save();

        $role_student = new Role();
        $role_student->role_name = 'student';
        $role_student->save();

        $role_teacher = new Role();
        $role_teacher->role_name = 'teacher';
        $role_teacher->save();

        $role_zafKafedroi = new Role();
        $role_zafKafedroi->role_name = 'zafKafedroi';
        $role_zafKafedroi->save();

        $role_adminKafedri = new Role();
        $role_adminKafedri->role_name = 'adminKafedri';
        $role_adminKafedri->save();
    }
}
