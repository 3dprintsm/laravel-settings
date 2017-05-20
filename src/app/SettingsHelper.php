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
            $settings = Setting::where('code', 'like', strtoupper($key));

            $result = [];

            foreach ($settings->get() as $item) {
                $result[$item->key_cd] = $item->value;
            }

            return $result;
        }

        $setting = Setting::whereCode(strtoupper($key));

        $setting = $setting->first();

        if ($setting) {
            return $setting->value;
        } else {
            return '';
        }
    }
}