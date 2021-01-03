<?php

namespace Database\Seeders;

use App\Repository\SettingRepository;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    private $settingRepository;
    public function __construct(SettingRepository $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
          'task_order' => 'desc',
          'dashboard_color' => 'white',
          'no_of_tasks' => 3,
        ];

        foreach ($settings as $key => $value) {
            if(!$this->settingRepository->existsByKey($key)) {
                $this->settingRepository->saveSetting([
                    'key' => $key,
                    'default_value' => $value,
                ]);
            }
        }
    }
}
