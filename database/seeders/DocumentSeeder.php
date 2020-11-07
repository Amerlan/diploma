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
        $document->document_name = 'Продление РК 1';
        $document->document_type = 'Тип 1';
        $document->stageCount = 1;
        $document->save();


        $document = new Documents();
        $document->document_name = 'Обходной лист';
        $document->document_type = 'Тип 2';
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
