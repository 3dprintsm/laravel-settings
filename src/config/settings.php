<?php

return [
    //settings route
    'route' => 'settings',

    'middleware' => ['web', 'auth'],

    // hidden records not editable from interface when set to false
    'show_hidden_records' => false,

    //javascript format
    'date_format' => 'mm/dd/yyyy',
    // number of digits after the decimal point
    'number_step' => 0.001,

    // upload path for settings of type file
    'upload_path' => 'uploads/settings',

    // valid mime types for settings of type file
    'mimes' => 'jpg,jpeg,png,txt,csv,pdf',
];