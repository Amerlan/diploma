<?php

namespace Database\Seeders;

use App\Models\Document_roles;
use Illuminate\Database\Seeder;

class DocumentRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $docrole = new Document_roles();
        $docrole->document_name = 'Заявление на допуск к учебе';
        $docrole->role_id = 7;
        $docrole->sign_order = 1;
        $docrole->save();

        $docrole = new Document_roles();
        $docrole->document_name = 'Заявление на перекурс';
        $docrole->role_id = 7;
        $docrole->sign_order = 1;
        $docrole->save();

        $docrole = new Document_roles();
        $docrole->document_name = 'Заявление на пересдачу';
        $docrole->role_id = 8;
        $docrole->sign_order = 1;
        $docrole->save();

        $docrole = new Document_roles();
        $docrole->document_name = 'Объяснительная';
        $docrole->role_id = 7;
        $docrole->sign_order = 1;
        $docrole->save();


        $docrole = new Document_roles();
        $docrole->document_name = 'Справка - Приложение 4';
        $docrole->role_id = 7;
        $docrole->sign_order = 1;
        $docrole->save();

        $docrole = new Document_roles();
        $docrole->document_name = 'Справка - Приложение 2';
        $docrole->role_id = 7;
        $docrole->sign_order = 1;
        $docrole->save();

        $docrole = new Document_roles();
        $docrole->document_name = 'Справка - Приложение 2-1';
        $docrole->role_id = 7;
        $docrole->sign_order = 1;
        $docrole->save();

        $docrole = new Document_roles();
        $docrole->document_name = 'Справка - Приложение 6';
        $docrole->role_id = 7;
        $docrole->sign_order = 1;
        $docrole->save();

        $docrole = new Document_roles();
        $docrole->document_name = 'Справка - Приложение 8';
        $docrole->role_id = 7;
        $docrole->sign_order = 1;
        $docrole->save();

        $docrole = new Document_roles();
        $docrole->document_name = 'Справка - Приложение 9';
        $docrole->role_id = 7;
        $docrole->sign_order = 1;
        $docrole->save();

        $docrole = new Document_roles();
        $docrole->document_name = 'Справка по месту требования';
        $docrole->role_id = 7;
        $docrole->sign_order = 1;
        $docrole->save();
    }
}
