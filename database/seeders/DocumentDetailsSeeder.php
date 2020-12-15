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

        //справка - приложение 4
        $document_details = new Document_details();
        $document_details->id = 5;
        $document_details->phone_number = True;
        $document_details->save();

        //справка - приложение 2
        $document_details = new Document_details();
        $document_details->id = 6;
        $document_details->phone_number = True;
        $document_details->save();

        //справка - приложение 2-1
        $document_details = new Document_details();
        $document_details->id = 7;
        $document_details->phone_number = True;
        $document_details->save();

        //справка - приложение 6
        $document_details = new Document_details();
        $document_details->id = 8;
        $document_details->phone_number = True;
        $document_details->save();

        //справка - приложение 8
        $document_details = new Document_details();
        $document_details->id = 9;
        $document_details->phone_number = True;
        $document_details->save();

        //справка - приложение 9
        $document_details = new Document_details();
        $document_details->id = 10;
        $document_details->phone_number = True;
        $document_details->save();

        //справка по месту требования
        $document_details = new Document_details();
        $document_details->id = 11;
        $document_details->phone_number = True;
        $document_details->save();

    }
}
