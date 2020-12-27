<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Document_details;

class DocumentDetailsSeeder extends Seeder
{
     // Я УБРАЛ phone number как дефолт ТРУ, надо где он нужен вручную вставить
    // (Касается Амиржана и Амерлана, Мадияр норм сразу сделал)
    // $document_details->phone_number = True;
    public function run()
    {
        $document_details = new Document_details();
        $document_details->document_name = 'Заявление на допуск к учебе';
        $document_details->save();


        $document_details = new Document_details();
        $document_details->document_name = 'Заявление на перекурс';
        $document_details->reason = True;
        $document_details->academic_year = True;
        $document_details->save();


        $document_details = new Document_details();
        $document_details->document_name = 'Заявление на пересдачу';
        $document_details->reason = True;
        $document_details->subject = True;
        $document_details->midterm_grade = True;
        $document_details->endterm_grade = True;
        $document_details->exam_grade = True;
        $document_details->teacher = True;
        $document_details->save();


        $document_details = new Document_details();
        $document_details->document_name = 'Объяснительная';
        $document_details->reason = True;
        $document_details->save();

        //справка - приложение 4
        $document_details = new Document_details();
        $document_details->document_name = 'Справка - Приложение 4';
        $document_details->phone_number = True;
        $document_details->save();

        //справка - приложение 2
        $document_details = new Document_details();
        $document_details->document_name = 'Справка - Приложение 2';
        $document_details->phone_number = True;
        $document_details->save();

        //справка - приложение 2-1
        $document_details = new Document_details();
        $document_details->document_name = 'Справка - Приложение 2-1';
        $document_details->phone_number = True;
        $document_details->save();

        //справка - приложение 6
        $document_details = new Document_details();
        $document_details->document_name = 'Справка - Приложение 6';
        $document_details->phone_number = True;
        $document_details->save();

        //справка - приложение 8
        $document_details = new Document_details();
        $document_details->document_name = 'Справка - Приложение 8';
        $document_details->phone_number = True;
        $document_details->save();

        //справка - приложение 9
        $document_details = new Document_details();
        $document_details->document_name = 'Справка - Приложение 9';
        $document_details->phone_number = True;
        $document_details->save();

        //справка по месту требования
        $document_details = new Document_details();
        $document_details->document_name = 'Справка по месту требования';
        $document_details->save();

    }
}
