<?php

namespace SMATAR\Settings\App;

class SettingsHelper
{
    /**
     * SettingsHelper constructor.
     */
    function __construct()
    {
    }

    public function get($key = '')
    {
        if (strpos($key, '*')) {
            $key = str_replace('*', '%', $key);
            $settings = Setting::where('code', 'like', $key);

            $result = [];

            foreach ($settings->get() as $item) {
                $result[$item->code] = $item->value;
            }

            return $result;
        }

        $setting = Setting::whereCode($key);

        $setting = $setting->first();

        if ($setting) {
            return $setting->value;
        } else {
            return '';
        }
    }
}