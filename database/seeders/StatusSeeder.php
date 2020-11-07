<?php

namespace Database\Seeders;

use App\Models\Statuses;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = new Status();
        $status->status = 'Ожидание';
        $status->save();

        $status = new Status();
        $status->status = 'Подписано';
        $status->save();

        $status = new Status();
        $status->status = 'Отказано';
        $status->save();

        $status = new Status();
        $status->status = 'Возравщено на доработку';
        $status->save();
    }
}
