<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Config;

class Main
{
    public static function administrate () {
        $allow = false;
        foreach (Config::get('custom.admins') as $admin) {
            if (auth()->user()->email === $admin) {
                $allow = true;
            }
        }
        return $allow;
    }
}
