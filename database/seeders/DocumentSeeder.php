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
        $document = new Documents();
        $document->document_type = 'Тип 1';
        $document->executor_id = 2;
        $document->created_by = 1;
        $document->save();

        $document = new Documents();
        $document->document_type = 'Тип 2';
        $document->executor_id = 5;
        $document->created_by = 2;
        $document->save();

        $document = new Documents();
        $document->document_type = 'Тип 3';
        $document->executor_id = 4;
        $document->created_by = 1;
        $document->save();

        $document = new Documents();
        $document->document_type = 'Тип 2';
        $document->executor_id = 4;
        $document->created_by = 5;
        $document->save();
    }
}
