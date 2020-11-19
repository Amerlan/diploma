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
        $docrole->document_name = 'Продление РК 1';
        $docrole->role_id = 3;
        $docrole->sign_order = 1;
        $docrole->save();

        $docrole = new Document_roles();
        $docrole->document_name = 'Обходной лист';
        $docrole->role_id = 4;
        $docrole->sign_order = 1;
        $docrole->save();

        $docrole = new Document_roles();
        $docrole->document_name = 'Обходной лист';
        $docrole->role_id = 3;
        $docrole->sign_order = 2;
        $docrole->save();

        $docrole = new Document_roles();
        $docrole->document_name = 'Обходной лист';
        $docrole->role_id = 2;
        $docrole->sign_order = 3;
        $docrole->save();


        $docrole = new Document_roles();
        $docrole->document_name = 'Обходной лист';
        $docrole->role_id = 6;
        $docrole->sign_order = 4;
        $docrole->save();
    }
}
