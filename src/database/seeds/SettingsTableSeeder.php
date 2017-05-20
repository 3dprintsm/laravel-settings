<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('settings')->delete();

        \DB::table('settings')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'code' => 'SITE_TITLE',
                    'type' => 'TEXT',
                    'label' => 'Site Title',
                    'value' => 'GreasrApp',
                    'hidden' => 0,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ),
            1 =>
                array(
                    'id' => 2,
                    'code' => 'FOOTER',
                    'type' => 'TEXTAREA',
                    'label' => 'Footer',
                    'value' => '© <a href="#">GreasrApp</a>',
                    'hidden' => 0,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ),
            2 =>
                array(
                    'id' => 4,
                    'code' => 'INFO_EMAIL',
                    'type' => 'TEXT',
                    'label' => 'Info Email',
                    'value' => 'info@greasrapp.com',
                    'hidden' => 0,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ),
            3 =>
                array(
                    'id' => 5,
                    'code' => 'SUPPORT_PHONE',
                    'type' => 'TEXT',
                    'label' => 'Support Phone',
                    'value' => '+90-897-678-44',
                    'hidden' => 0,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ),
            4 =>
                array(
                    'id' => 7,
                    'code' => 'ADMIN_EMAIL',
                    'type' => 'TEXT',
                    'label' => 'Admin Email',
                    'value' => 'admin@greasrapp.com',
                    'hidden' => 0,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ),
        ));
    }
}