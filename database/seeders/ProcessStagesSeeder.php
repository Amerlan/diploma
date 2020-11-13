<?php

namespace Database\Seeders;

use App\Models\Process_stages;
use Illuminate\Database\Seeder;

class ProcessStagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $processStage = new Process_stages();
        $processStage->process_id = 2;
        $processStage->stage_number = 1;
        $processStage->status = 'Подписано';
        $processStage->done_by = 4;
        $processStage->comment = 'Teacher test comment';
        $processStage->save();

        $processStage = new Process_stages();
        $processStage->process_id = 2;
        $processStage->stage_number = 2;
        $processStage->status = 'Ожидание';
        $processStage->save();

        $processStage = new Process_stages();
        $processStage->process_id = 2;
        $processStage->stage_number = 3;
        $processStage->status = 'Ожидание';
        $processStage->save();

        $processStage = new Process_stages();
        $processStage->process_id = 2;
        $processStage->stage_number = 4;
        $processStage->status = 'Ожидание';
        $processStage->save();
    }
}
