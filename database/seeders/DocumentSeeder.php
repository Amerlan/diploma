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
        $document->document_name = 'Заявление на допуск к учебе';
        $document->document_type = 'Заявление';
        $document->stageCount = 1;
        $document->header = 'Декану факультета "${deans.faculty_name}}" ${deans.name}
                                            от студента ${user.course_number} курса специальности "${user.speciality_name}", группы ${user.group} - ${user.name}';
        $document->title = 'Заявление';
        $document->body = 'Прошу Вас дать допуск к учебным занятиям и сдаче академической разницы по специальности ${user.speciality_name} ${user.course_number} курса дневного отделения.';
        $document->save();


        $document = new Documents();
        $document->document_name = 'Заявление на перекурс';
        $document->document_type = '';
        $document->stageCount = 4;
        $document->save();

        # Разкоментить когда в сидах Юзеров появятся Бухгалтерия, Главный Бухглатер, Декан, Учебная часть
//        $document = new Documents();
//        $document->document_name = 'Возврат средств';
//        $document->document_type = 'Тип 3';
//        $document->stageCount = 5;

        $document->save();

    }
}
