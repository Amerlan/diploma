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
        $doctype->document_type = 'Заявление';
        $doctype->save();

        $doctype = new DocumentTypes();
        $doctype->document_type = 'Справка';
        $doctype->save();

        $doctype = new DocumentTypes();
        $doctype->document_type = 'Объяснительная';
        $doctype->save();
    }
}
