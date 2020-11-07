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
        $status = new Statuses();
        $status->status = 'Ожидание';
        $status->save();

        $status = new Statuses();
        $status->status = 'Подписано';
        $status->save();

        $status = new Statuses();
        $status->status = 'Отказано';
        $status->save();

        $status = new Statuses();
        $status->status = 'Возравщено на доработку';
        $status->save();
    }
}
