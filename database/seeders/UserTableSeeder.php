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

        $student = new User();
        $student->user_name = 'Student Name';
        $student->email = 'student@example.com';
        $student->password = bcrypt('secret');
        $student->dl_id = 23001;
        $student->dl_mail = '23001@iitu.kz';
        //$student->department = 1;
        //$student->user_role = 2;
        $student->save();
        $student->roles()->attach($role_student);

        $teacher = new User();
        $teacher->user_name = 'Teacher Name';
        $teacher->email = 'teacher@example.com';
        $teacher->password = bcrypt('secret');
        $teacher->dl_id = 23002;
        $teacher->dl_mail = '23002@iitu.kz';
        //$teacher->department = 2;
        //$teacher->user_role = 3;
        $teacher->save();
        $teacher->roles()->attach($role_teacher);

        $admin = new User();
        $admin->user_name = 'Admin Name';
        $admin->email = 'admin@example.com';
        $admin->password = bcrypt('secret');
        $admin->dl_id = 23003;
        $admin->dl_mail = '23003@iitu.kz';
        //$admin->department = 3;
        //$admin->user_role = 1;
        $admin->save();
        $admin->roles()->attach($role_admin);

        $zafKafedroi = new User();
        $zafKafedroi->user_name = 'zafKafedroi Name';
        $zafKafedroi->email = 'zafKafedroi@example.com';
        $zafKafedroi->password = bcrypt('secret');
        $zafKafedroi->dl_id = 23004;
        $zafKafedroi->dl_mail = '23004@iitu.kz';
        //$zafKafedroi->department = 5;
        //$zafKafedroi->user_role = 4;
        $zafKafedroi->save();
        $zafKafedroi->roles()->attach($role_zafKafedroi);

        $adminKafedri = new User();
        $adminKafedri->user_name = 'adminKafedri Name';
        $adminKafedri->email = 'adminKafedri@example.com';
        $adminKafedri->password = bcrypt('secret');
        $adminKafedri->dl_id = 23005;
        $adminKafedri->dl_mail = '23005@iitu.kz';
        //$adminKafedri->department = 4;
        //$adminKafedri->user_role = 5;
        $adminKafedri->save();
        $adminKafedri->roles()->attach($role_adminKafedri);
    }
}
