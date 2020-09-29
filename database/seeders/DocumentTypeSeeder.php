<?php

namespace Database\Seeders;

use App\Models\DocumentTypes;
use Illuminate\Database\Seeder;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doctype = new DocumentTypes();
        $doctype->document_type = 'Тип 1';
        $doctype->stageCount = 2;
        $doctype->document_priority = 1;
        $doctype->save();

        $doctype = new DocumentTypes();
        $doctype->document_type = 'Тип 2';
        $doctype->stageCount = 4;
        $doctype->document_priority = 3;
        $doctype->save();

        $doctype = new DocumentTypes();
        $doctype->document_type = 'Тип 3';
        $doctype->stageCount = 1;
        $doctype->document_priority = 1;
        $doctype->save();
    }
}
