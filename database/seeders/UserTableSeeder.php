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
        $role_techer_zamena = Role::where('role_name', 'teacher_zamena')->first();
        $role_dean = Role::where('role_name', 'dean')->first();
        $role_dav = Role::where('role_name', 'dav')->first();

        $admin = new User();
        $admin->name = 'Админ Админов';
        $admin->email = 'admin@example.com';
        $admin->password = bcrypt('secret');
        $admin->secret_password = bcrypt('secret');
        $admin->dl_id = 23001;
        $admin->dl_mail = '23001@iitu.kz';
        $admin->url = 'https://vignette.wikia.nocookie.net/skillnaruto/images/3/36/Naruto_Uzumaki.png/revision/latest/scale-to-width-down/340?cb=20140504001218&path-prefix=ru';
        //$admin->department = 1;
        $admin->save();
        $admin->roles()->attach($role_admin);

        $dean = new User();
        $dean->name = 'Деканов Декан Деканович';
        $dean->email = 'dean@example.com';
        $dean->password = bcrypt('secret');
        $dean->secret_password = bcrypt('secret');
        $dean->dl_id = 777;
        $dean->dl_mail = '777@iitu.kz';
        $dean->url = 'https://tmssl.akamaized.net/images/portrait/originals/168337-1471947753.jpg';
        $dean->faculty_name = 'ДИТ';
        $dean->save();
        $dean->roles()->attach($role_dean);
//        $dean->roles()->attach($role_admin);

        $zafKafedroi = new User();
        $zafKafedroi->name = 'Заведующий Кафедрой';
        $zafKafedroi->email = 'zafKafedroi@example.com';
        $zafKafedroi->password = bcrypt('secret');
        $zafKafedroi->secret_password = bcrypt('secret');
        $zafKafedroi->dl_id = 23002;
        $zafKafedroi->dl_mail = '23002@iitu.kz';
        $zafKafedroi->url = 'https://www.meme-arsenal.com/memes/72b8c58dbdd57f999edb73bc6d9085d0.jpg';
        //$zafKafedroi->department = 2;
        $zafKafedroi->save();
        $zafKafedroi->roles()->attach($role_zafKafedroi);

        $adminKafedri = new User();
        $adminKafedri->name = 'Администратор Кафедры';
        $adminKafedri->email = 'adminKafedri@example.com';
        $adminKafedri->password = bcrypt('secret');
        $adminKafedri->secret_password = bcrypt('secret');
        $adminKafedri->dl_id = 23003;
        $adminKafedri->dl_mail = '23003@iitu.kz';
        $adminKafedri->url = 'https://www.meme-arsenal.com/memes/72b8c58dbdd57f999edb73bc6d9085d0.jpg';
        //$adminKafedri->department = 3;
        $adminKafedri->save();
        $adminKafedri->roles()->attach($role_adminKafedri);

        $teacher = new User();
        $teacher->name = 'Жуанышев Ильяс';
        $teacher->email = 'teacher@example.com';
        $teacher->password = bcrypt('secret');
        $teacher->secret_password = bcrypt('secret');
        $teacher->dl_id = 23004;
        $teacher->dl_mail = '23004@iitu.kz';
        $teacher->url = 'https://static.wikia.nocookie.net/disneythehunchbackofnotredame/images/1/19/Naruto_Shippuuden_176-341.jpg/revision/latest/scale-to-width-down/340?cb=20140614002251';
        //$teacher->department = 4;
        $teacher->save();
        $teacher->roles()->attach($role_teacher);
        $teacher->roles()->attach($role_techer_zamena);

        $student = new User();
        $student->name = 'Тохтаров Амерлан Аркатович';
        $student->email = 'student@example.com';
        $student->password = bcrypt('secret');
        $student->secret_password = bcrypt('secret');
        $student->dl_id = 23005;
        $student->dl_mail = '23005@iitu.kz';
        $student->url = 'https://vgtimes.ru/uploads/posts/2014-05/1401275138_konohamaru.jpg';
        //$student->department = 5;
        $student->dateOfBirth = '2000-04-10';
        $student->course_number=4;
        $student->group = 'CSSE-1706 DA';
        $student->speciality_name = 'CSSE';
        $student->speciality_code = '5В070400';
        $student->faculty_name = 'Information technologies';
        $student->enrollment_date = '2017-09-01';
        $student->graduation_date = '2021-06-30';
        $student->save();
        $student->roles()->attach($role_student);

        $teacher = new User();
        $teacher->name = 'Рахимжанова Назгуль Кадыровна';
        $teacher->email = 'teachertest@example.com';
        $teacher->password = bcrypt('secret');
        $teacher->secret_password = bcrypt('secret');
        $teacher->dl_id = 23006;
        $teacher->dl_mail = '23006@iitu.kz';
        $teacher->url = 'https://static.wikia.nocookie.net/naruto/images/2/27/Kakashi_Hatake.png/revision/latest?cb=20170507214017&path-prefix=ru';
        //$teacher->department = 4;
        $teacher->save();
        $teacher->roles()->attach($role_teacher);


        $dav = new User();
        $dav->name = 'Директор_ДАВ_ФИО';
        $dav->email = 'dav@example.com';
        $dav->password = bcrypt('secret');
        $dav->secret_password = bcrypt('secret');
        $dav->dl_id = 24000;
        $dav->dl_mail = '24000@iitu.kz';
        $dav->url = 'https://static.wikia.nocookie.net/disneythehunchbackofnotredame/images/1/19/Naruto_Shippuuden_176-341.jpg/revision/latest/scale-to-width-down/340?cb=20140614002251';
        //$dav->department = 4;
        $dav->save();
        $dav->roles()->attach($role_dav);
    }
}
