<?php
namespace App\Repository;

use App\Models\Setting;
use App\Models\Task;
use App\Traits\AuthTrait;
use Hamcrest\Core\Set;
use Illuminate\Support\Facades\Auth;

class SettingRepository {
    use AuthTrait;

    public function __construct()
    {
    }

    public function getAll()
    {
        return Setting::all();
    }

    public function existsByKey($key)
    {
        $setting = Setting::where('key', $key)->first();
        return $setting ? true : false;
    }

    public function saveSetting($setting)
    {
        return Setting::firstOrCreate($setting);
    }
}
