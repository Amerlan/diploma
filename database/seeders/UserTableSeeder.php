<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Roles;
use App\Models\Users;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_student = Roles::where('role_name', 'student')->first();
        $role_teacher  = Roles::where('role_name', 'teacher')->first();
        $role_admin  = Roles::where('role_name', 'admin')->first();

        $student = new Users();
        $student->user_name = 'Student Name';
        $student->email = 'student@example.com';
        $student->password = bcrypt('secret');
        $student->dl_id = 23001;
        $student->dl_mail = '23001@iitu.kz';
        //$student->department = 1;
        //$student->user_role = 2;
        $student->save();
        $student->roles()->attach($role_student);

        $teacher = new Users();
        $teacher->user_name = 'Teacher Name';
        $teacher->email = 'teacher@example.com';
        $teacher->password = bcrypt('secret');
        $teacher->dl_id = 23002;
        $teacher->dl_mail = '23002@iitu.kz';
        //$teacher->department = 2;
        //$teacher->user_role = 3;
        $teacher->save();
        $teacher->roles()->attach($role_teacher);

        $admin = new Users();
        $admin->user_name = 'Admin Name';
        $admin->email = 'admin@example.com';
        $admin->password = bcrypt('secret');
        $admin->dl_id = 23003;
        $admin->dl_mail = '23003@iitu.kz';
        //$admin->department = 3;
        //$admin->user_role = 1;
        $admin->save();
        $admin->roles()->attach($role_admin);
    }
}
