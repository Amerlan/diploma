<?php

namespace Database\Seeders;

use App\Models\Process;
use Illuminate\Database\Seeder;

class ProcessSeeder extends Seeder
{

    public function run()
    {
        $process = new Process();
        $process->document_name = 'Продление РК 1';
        $process->created_by = 5;
        $process->save();

        $process = new Process();
        $process->document_name = 'Обходной лист';
        $process->created_by = 4;
        $process->save();

        # Вернуть когда появятся в Document Seeder
//        $process = new Process();
//        $process->document_name = 'Возврат средств';
//        $process->created_by = 5;
//        $process->save();

        $process = new Process();
        $process->document_name = 'Обходной лист';
        $process->created_by = 2;
        $process->save();
    }
}
