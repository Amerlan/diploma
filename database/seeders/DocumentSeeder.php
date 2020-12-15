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
        $document->stageCount = 2;
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
        $document->header = 'Декану факультета ${deans.faculty_name} ${deans.name}
                             от студента ${user.course_number} курса специальности "${user.speciality_name}", группы ${user.group} - ${user.name}
                             ID студента: ${user.dl_id}';
        $document->title = 'Заявление';
        $document->body = 'Прошу Вас оставить меня на повторный год обучения по специальности ${user.speciality_code} ${user.speciality_name} дневного отделения в ${new Date().getFullYear()} учебном году, в связи с ${doc.reason}';
        $document->reason = ' причина ';
        $document->save();




        // Amerlan's part
        $document = new Documents();
        $document->document_name = 'Заявление на пересдачу';
        $document->document_type = 'Заявление';
        $document->stageCount = 1;
        $document->header = 'Директору ДАВ ${dav.name}
                                            от студента ${user.course_number} курса, дневного отделения специальности ${user.speciality_code} "${user.speciality_name}", группы ${user.group} - ${user.name}
                                            ID студента: ${user.dl_id}
                                            Контактные тел.: 87776665544';
        $document->title = 'Заявление на пересдачу';
        $document->body = 'Прошу Вас разрешить пересдать экзамен на платной основе по дисциплине {subject} в связи с тем, что ${doc.reason}
                            РК-1: ${doc.midterm}
                            РК-2: ${doc.endterm}
                            Экзамен: ${doc.exam}
                            Преподаватель: ${doc.teacher}';
        $document->save();


        $document = new Documents();
        $document->document_name = 'Объяснительная';
        $document->document_type = 'Объяснительная';
        $document->stageCount = 1;
        $document->header = 'Декану факультета \"${deans.faculty_name}\" ${deans.name}
                                            от студента ${user.course_number} курса, дневного отделения специальности ${user.speciality_code} "${user.speciality_name}", группы ${user.group} - ${user.name}
                                            ID студента: ${user.dl_id}
                                            Контактные тел.: 87776665544';
        $document->title = 'Заявление';
        $document->body = '';
        $document->save();

        //справка - приложение 4
        $document = new Documents();
        $document->document_name = 'Справка - Приложение 4';
        $document->document_type = 'Справка';
        $document->header = '                   Приложение 4
                                                к Правилам предоставления государственной
                                                базовой пенсионной выплаты за счет бюджетных средств,
                                                а также назначения и осуществления
                                                пенсионных выплат по возрасту, государственных социальных
                                                пособий по инвалидности, по случаю потери кормильца,
                                                государственных специальных пособий';
        $document->title = 'Справка';
        $document->body = 'Дана  гражданину  ${user.name} ${user.dateOfBirth} в том, что
                                        он(а) действительно является обучающимся «АО Международного университета информационных технологий» по группе образовательных программ ${user.speciality_name}
                                        Госуд.лицензия Серия АБ  № 0064060 от 29.05.2009 год без ограничения срока,
                                        ${user.course_number}, форма обучения-очная.
                                        Справка действительна на ${new Date().getFullYear()} - ${new Date().getFullYear() + 1} учебный год.
                                        Справка выдана для предъявления в отделение
                                        Государственной корпораций
                                        Срок обучения в учебном заведении  4 (четыре) года
                                        Период обучения с ${user.enrollment_date} по ${user.graduation_date}

                                        Примечание: справка действительна 1 год.
                                        В случае отчисления обучающегося из учебного заведения или перевода на заочную форму обучения, руководитель учебного заведения извещает отделение Государственной корпораций  по выплате пенсий по месту жительства получателя пособия.';
        $document->save();

        //справка - приложение 2
        $document = new Documents();
        $document->document_name = 'Справка - Приложение 2';
        $document->document_type = 'Справка';
        $document->header = 'Приложение 2
                             к инструктивному письму №2';
        $document->title = 'Справка';
        $document->body = 'Дана  гражданину  ${user.name} ${user.dateOfBirth} в том, что
                                        он(а) действительно является обучающимся «АО Международного университета информационных технологий» по группе образовательных программ ${user.speciality_name}
                                        Госуд.лицензия Серия АБ  № 0064060 от 29.05.2009 год без ограничения срока,
                                        ${user.course_number}, форма обучения-очная.
                                        Справка действительна на ${new Date().getFullYear()} - ${new Date().getFullYear() + 1} учебный год.
                                        Справка выдана для предъявления в отделение
                                        Государственной корпораций
                                        Срок обучения в учебном заведении  4 (четыре) года
                                        Период обучения с ${user.enrollment_date} по ${user.graduation_date}

                                        Примечание: справка действительна 1 год.
                                        В случае отчисления обучающегося из учебного заведения или перевода на заочную форму обучения, руководитель учебного заведения извещает отделение Государственной корпораций  по выплате пенсий по месту жительства получателя пособия.';
        $document->save();

        //справка - приложение 2-1
        $document = new Documents();
        $document->document_name = 'Справка - Приложение 2-1';
        $document->document_type = 'Справка';
        $document->header = 'Приложение 2-1
                             к стандарту  государственной услуги
                             «Назначение государственных  социальных
                             пособий по инвалидности, по случаю
                             потери кормильца и по возрасту»';
        $document->title = 'Справка';
        $document->body = 'Дана  гражданину  ${user.name} ${user.dateOfBirth} в том, что
                                        он(а) действительно является обучающимся «АО Международного университета информационных технологий» по группе образовательных программ ${user.speciality_name}
                                        Госуд.лицензия Серия АБ  № 0064060 от 29.05.2009 год без ограничения срока,
                                        ${user.course_number}, форма обучения-очная.
                                        Справка действительна на ${new Date().getFullYear()} - ${new Date().getFullYear() + 1} учебный год.
                                        Справка выдана для предъявления в отделение
                                        Государственной корпораций
                                        Срок обучения в учебном заведении  4 (четыре) года
                                        Период обучения с ${user.enrollment_date} по ${user.graduation_date}

                                        Примечание: справка действительна 1 год.
                                        В случае отчисления обучающегося из учебного заведения или перевода на заочную форму обучения, руководитель учебного заведения извещает отделение Государственной корпораций  по выплате пенсий по месту жительства получателя пособия.';
        $document->save();

        //справка - приложение 6
        $document = new Documents();
        $document->document_name = 'Справка - Приложение 6';
        $document->document_type = 'Справка';
        $document->header = 'Приложение 6
                             к Правилам назначения, исчисления
                             (определения), перерасчета
                             размеров социальных выплат из
                             Государственного фонда
                             социального страхования
                             и их осуществления';
        $document->title = 'Справка';
        $document->body = 'Дана  гражданину  ${user.name} ${user.dateOfBirth} в том, что
                                        он(а) действительно является обучающимся «АО Международного университета информационных технологий» по группе образовательных программ ${user.speciality_name}
                                        Госуд.лицензия Серия АБ  № 0064060 от 29.05.2009 год без ограничения срока,
                                        ${user.course_number}, форма обучения-очная.
                                        Справка действительна на ${new Date().getFullYear()} - ${new Date().getFullYear() + 1} учебный год.
                                        Справка выдана для предъявления в отделение
                                        Государственной корпораций
                                        Срок обучения в учебном заведении  4 (четыре) года
                                        Период обучения с ${user.enrollment_date} по ${user.graduation_date}

                                        Примечание: справка действительна 1 год.
                                        В случае отчисления обучающегося из учебного заведения или перевода на заочную форму обучения, руководитель учебного заведения извещает отделение Государственной корпораций  по выплате пенсий по месту жительства получателя пособия.';
        $document->save();

        //справка - приложение 8
        $document = new Documents();
        $document->document_name = 'Справка - Приложение 8';
        $document->document_type = 'Справка';
        $document->header = 'Приложение 8
                             к Правилам назначения и выплаты
                             специального государственного пособия';
        $document->title = 'Справка';
        $document->body = 'Дана  гражданину  ${user.name} ${user.dateOfBirth} в том, что
                                        он(а) действительно является обучающимся «АО Международного университета информационных технологий» по группе образовательных программ ${user.speciality_name}
                                        Госуд.лицензия Серия АБ  № 0064060 от 29.05.2009 год без ограничения срока,
                                        ${user.course_number}, форма обучения-очная.
                                        Справка действительна на ${new Date().getFullYear()} - ${new Date().getFullYear() + 1} учебный год.
                                        Справка выдана для предъявления в отделение
                                        Государственной корпораций
                                        Срок обучения в учебном заведении  4 (четыре) года
                                        Период обучения с ${user.enrollment_date} по ${user.graduation_date}

                                        Примечание: справка действительна 1 год.
                                        В случае отчисления обучающегося из учебного заведения или перевода на заочную форму обучения, руководитель учебного заведения извещает отделение Государственной корпораций  по выплате пенсий по месту жительства получателя пособия.';
        $document->save();

        //справка - приложение 9
        $document = new Documents();
        $document->document_name = 'Справка - Приложение 9';
        $document->document_type = 'Справка';
        $document->header = 'Приложение 9

                             к приказу Министра здравоохранения и
                             социального развития Республики Казахстан,
                             в которые вносят изменения и дополнения

                             Приложение 2-1

                             к стандарту  государственной услуги
                             «Назначение государственных  социальных
                             пособий по инвалидности, по случаю
                             потери кормильца и по возрасту»';
        $document->title = 'Справка';
        $document->body = 'Дана  гражданину  ${user.name} ${user.dateOfBirth} в том, что
                                        он(а) действительно является обучающимся «АО Международного университета информационных технологий» по группе образовательных программ ${user.speciality_name}
                                        Госуд.лицензия Серия АБ  № 0064060 от 29.05.2009 год без ограничения срока,
                                        ${user.course_number}, форма обучения-очная.
                                        Справка действительна на ${new Date().getFullYear()} - ${new Date().getFullYear() + 1} учебный год.
                                        Справка выдана для предъявления в отделение
                                        Государственной корпораций
                                        Срок обучения в учебном заведении  4 (четыре) года
                                        Период обучения с ${user.enrollment_date} по ${user.graduation_date}

                                        Примечание: справка действительна 1 год.
                                        В случае отчисления обучающегося из учебного заведения или перевода на заочную форму обучения, руководитель учебного заведения извещает отделение Государственной корпораций  по выплате пенсий по месту жительства получателя пособия.';
        $document->save();

        //справка по месту требования
        $document = new Documents();
        $document->document_name = 'Справка по месту требования';
        $document->document_type = 'Справка';
        $document->header = ' ';
        $document->title = 'Справка';
        $document->body = 'Дана ${user.name} ${user.dateOfBirth}
                                        В том, что он(а) действительно является студентом ${user.course_number} очного отделения в АО «Международный университет информационных технологий»  по специальности
                                        ${user.speciality_name}
                                        Гос.лицензия Серия АБ  №   0064060 от  29.05.2009 год
                                        без ограничения срока
                                        Справка действительна на ${new Date().getFullYear()} - ${new Date().getFullYear() + 1} учебный год
                                        Справка выдана для предъявления по месту требования
                                        Срок обучения в учебном заведении 4 (четыре) года.
                                        Период обучения с ${user.enrollment_date} по ${user.graduation_date}';
        $document->save();
    }
}
