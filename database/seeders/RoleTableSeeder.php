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

        $role_zafKafedroi = new Role();
        $role_zafKafedroi->role_name = 'zafKafedroi';
        $role_zafKafedroi->save();

        $role_adminKafedri = new Role();
        $role_adminKafedri->role_name = 'adminKafedri';
        $role_adminKafedri->save();

        $role_teacher = new Role();
        $role_teacher->role_name = 'teacher';
        $role_teacher->save();

        $role_student = new Role();
        $role_student->role_name = 'student';
        $role_student->save();

        $role_techer_zamena = new Role();
        $role_techer_zamena->role_name = 'teacher_zamena';
        $role_techer_zamena->save();

        $role_dean = new Role();
        $role_dean->role_name = 'dean';
        $role_dean->save();

        $role_dav = new Role();
        $role_dav->role_name = 'dav';
        $role_dav->save();

    }
}
