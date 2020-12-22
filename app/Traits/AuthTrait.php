<?php
namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait AuthTrait {

    /**
     * @throws \Exception
     */
    public function userAuthCheck()
    {
        if (!Auth::user()) {
            throw new \Exception('You should be logged in to use this repository');
        }
    }
}
