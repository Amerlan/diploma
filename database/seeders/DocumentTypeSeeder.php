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
        // Test different types of documents
        $doctype = new DocumentTypes();
        $doctype->document_type = 'Тип 1';
        $doctype->save();

        $doctype = new DocumentTypes();
        $doctype->document_type = 'Тип 2';
        $doctype->save();

        $doctype = new DocumentTypes();
        $doctype->document_type = 'Тип 3';
        $doctype->save();
    }
}
