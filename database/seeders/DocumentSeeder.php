<?php

namespace Database\Seeders;

use App\Models\Documents;
use Illuminate\Database\Seeder;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Student created doc. Zav kafedroi must sign
        $document = new Documents();
        $document->document_type = 'Тип 1';
        $document->executor_role_id = 4;
        $document->created_by = 5;
        $document->save();

        // Student created doc. Teacher must sign
        $document = new Documents();
        $document->document_type = 'Тип 2';
        $document->executor_role_id = 2;
        $document->created_by = 5;
        $document->save();

        // Teacher created doc. Admin Kafedry must sign
        $document = new Documents();
        $document->document_type = 'Тип 3';
        $document->executor_role_id = 3;
        $document->created_by = 4;
        $document->save();

        // Teacher created doc. Zav Kafedry must sign
        $document = new Documents();
        $document->document_type = 'Тип 2';
        $document->executor_role_id = 2;
        $document->created_by = 4;
        $document->save();


        // FOR REJECT AND CLOSE blades
        $document = new Documents();
        $document->document_type = 'Тип 2';
        $document->executor_role_id = 2;
        $document->created_by = 5;
        $document->current_stage = -1;
        $document->is_rejected = True;
        $document->save();


        $document = new Documents();
        $document->document_type = 'Тип 3';
        $document->executor_role_id = 3;
        $document->created_by = 5;
        $document->current_stage = -1;
        $document->is_rejected = True;
        $document->save();


        $document = new Documents();
        $document->document_type = 'Тип 2';
        $document->executor_role_id = 2;
        $document->created_by = 5;
        $document->current_stage = 4;
        $document->is_closed = True;
        $document->save();

        $document = new Documents();
        $document->document_type = 'Тип 1';
        $document->executor_role_id = 4;
        $document->created_by = 5;
        $document->current_stage = 2;
        $document->is_closed = True;
        $document->save();
    }
}
