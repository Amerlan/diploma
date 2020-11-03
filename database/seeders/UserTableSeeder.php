<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_student = Role::where('role_name', 'student')->first();
        $role_teacher  = Role::where('role_name', 'teacher')->first();
        $role_admin  = Role::where('role_name', 'admin')->first();
        $role_zafKafedroi = Role::where('role_name', 'zafKafedroi')->first();
        $role_adminKafedri = Role::where('role_name', 'adminKafedri')->first();

        $admin = new User();
        $admin->name = 'Admin Name';
        $admin->email = 'admin@example.com';
        $admin->password = bcrypt('secret');
        $admin->dl_id = 23001;
        $admin->dl_mail = '23001@iitu.kz';
        $admin->user_priority = 1;
        //$admin->department = 1;
        $admin->user_role = 1;
        $admin->save();
        $admin->roles()->attach($role_admin);

        $zafKafedroi = new User();
        $zafKafedroi->name = 'zafKafedroi Name';
        $zafKafedroi->email = 'zafKafedroi@example.com';
        $zafKafedroi->password = bcrypt('secret');
        $zafKafedroi->dl_id = 23002;
        $zafKafedroi->dl_mail = '23002@iitu.kz';
        $zafKafedroi->user_priority = 2;
        //$zafKafedroi->department = 2;
        $zafKafedroi->user_role = 2;
        $zafKafedroi->save();
        $zafKafedroi->roles()->attach($role_zafKafedroi);

        $adminKafedri = new User();
        $adminKafedri->name = 'adminKafedri Name';
        $adminKafedri->email = 'adminKafedri@example.com';
        $adminKafedri->password = bcrypt('secret');
        $adminKafedri->dl_id = 23003;
        $adminKafedri->dl_mail = '23003@iitu.kz';
        $adminKafedri->user_priority = 3;
        //$adminKafedri->department = 3;
        $adminKafedri->user_role = 3;
        $adminKafedri->save();
        $adminKafedri->roles()->attach($role_adminKafedri);

        $teacher = new User();
        $teacher->name = 'Teacher Name';
        $teacher->email = 'teacher@example.com';
        $teacher->password = bcrypt('secret');
        $teacher->dl_id = 23004;
        $teacher->dl_mail = '23004@iitu.kz';
        $teacher->user_priority = 4;
        //$teacher->department = 4;
        $teacher->user_role = 4;
        $teacher->save();
        $teacher->roles()->attach($role_teacher);

        $student = new User();
        $student->name = 'Student Name';
        $student->email = 'student@example.com';
        $student->password = bcrypt('secret');
        $student->dl_id = 23005;
        $student->dl_mail = '23005@iitu.kz';
        $student->user_priority = 5;
        //$student->department = 5;
        $student->user_role = 5;
        $student->save();
        $student->roles()->attach($role_student);

    }
}
