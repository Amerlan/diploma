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
        $document->stageCount = 4;
        $document->header = 'Декану факультета ${deans.faculty_name} ${deans.name}
                             от студента ${user.course_number} курса специальности ${user.speciality_name}, группы ${user.group} - ${user.name}
                             ID студента: ${user.dl_id}';
        $document->title = 'Заявление';
        $document->body = 'Прошу Вас дать допуск к учебным занятиям и сдаче академической разницы по специальности ${user.speciality_name} ${user.course_number} курса дневного отделения.';
        $document->save();


        $document = new Documents();
        $document->document_name = 'Заявление на перекурс';
        $document->document_type = 'Заявление';
        $document->stageCount = 4;
        $document->header = 'Декану факультета ${deans.faculty_name}} ${deans.name}
                             от студента ${user.course_number} курса специальности "${user.speciality_name}", группы ${user.group} - ${user.name}
                             ID студента: ${user.dl_id}';
        $document->title = 'Заявление';
        $document->body = 'Прошу Вас оставить меня на повторный год обучения по специальности ${user.speciality_code} ${user.speciality_name} дневного отделения в ${} учебном году, в связи с ${doc.reason}';
        $document->reason = ' причина ';
        $document->save();




        // Amerlan's part
        $document = new Documents();
        $document->document_name = 'Заявление на пересдачу';
        $document->document_type = 'Заявление';
        $document->stageCount = 1;
        $document->header = 'Директору ДАВ ${dav.name}}
                                            от студента ${user.course_number} курса, дневного отделения специальности ${user.speciality_code} "${user.speciality_name}", группы ${user.group} - ${user.name}
                                            ID студента: ${user.dl_id}
                                            Контактные тел.: 87776665544';
        $document->title = 'Заявление на пересдачу';
        $document->body = 'Прошу Вас разрешить пересдать экзамен на платной основе по дисциплине ${subject} в связи с тем, что ${doc.reason}
                            РК-1: ${doc.midterm}
                            РК-2: ${doc.endterm}
                            Экзамен: ${doc.exam}
                            Преподаватель: ${doc.teacher}';
        $document->save();


        $document = new Documents();
        $document->document_name = 'Объяснительная';
        $document->document_type = 'Объяснительная';
        $document->stageCount = 1;
        $document->header = 'Декану факультета "${deans.faculty_name}}" ${deans.name}
                                            от студента ${user.course_number} курса, дневного отделения специальности ${user.speciality_code} "${user.speciality_name}", группы ${user.group} - ${user.name}
                                            ID студента: ${user.dl_id}
                                            Контактные тел.: 87776665544';
        $document->title = 'Заявление';
        $document->body = '';
        $document->save();

    }
}
