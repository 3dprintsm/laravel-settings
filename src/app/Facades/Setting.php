<?php

namespace brandnewteam\Settings\App\Facades;

use Illuminate\Support\Facades\Facade;
use brandnewteam\Settings\App\SettingsHelper;

class Setting extends Facade
{
    /**
     * @return mixed
     */
    protected static function getFacadeAccessor()
    {
        return SettingsHelper::class;
    }
}