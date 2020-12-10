<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Document_details;

class DocumentDetailsSeeder extends Seeder
{

    public function run()
    {
        $document_details = new Document_details();
        $document_details->id = 1;
        $document_details->save();


        $document_details = new Document_details();
        $document_details->id = 2;
        $document_details->reason = True;
        $document_details->academic_year = True;
        $document_details->save();


        $document_details = new Document_details();
        $document_details->id = 3;
        $document_details->reason = True;
        $document_details->subject = True;
        $document_details->midterm_grade = True;
        $document_details->endterm_grade = True;
        $document_details->exam_grade = True;
        $document_details->teacher = True;
        $document_details->save();


        $document_details = new Document_details();
        $document_details->id = 4;
        $document_details->reason = True;
        $document_details->save();


    }
}
