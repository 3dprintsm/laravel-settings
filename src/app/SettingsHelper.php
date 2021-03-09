<?php

namespace brandnewteam\Settings\App;

class SettingsHelper
{
    function __construct()
    {

    }

    public function get($key = '', $default = '')
    {
        if (strpos($key, '*')) {
            $key = str_replace('*', '%', $key);
            $settings = Setting::where('code', 'like', $key);

            $result = [];

            foreach ($settings->get() as $item) {
                $result[$item->code] = $item->value;
            }

            if (empty($result) && !is_null($default)) {
                return $default;
            }

            return $result;
        }

        $setting = Setting::whereCode($key)->first();

        if ($setting) {
            return $setting->value;
        } elseif (!is_null($default)) {
            return $default;
        } else {
            return '';
        }
    }

    public function has($key)
    {
        if (strpos($key, '*')) {
            $key = str_replace('*', '%', $key);
            return (Setting::where('code', 'like', $key)->count() > 0);
        }

        return (Setting::whereCode($key)->count() > 0);
    }

    public function set($key, $value)
    {
        $setting = Setting::where('code', $key)->first();
        if ($setting) {
            $setting->value = $value;
            $setting->save();
            return true;
        }

        return false;
    }
}
