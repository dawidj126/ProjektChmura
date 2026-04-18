<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['key' => 'site_name',           'value' => 'NajmujMieszkanie',             'group' => 'general'],
            ['key' => 'site_email',          'value' => 'kontakt@najmujmieszkanie.pl',   'group' => 'general'],
            ['key' => 'contact_phone',       'value' => '+48 000 000 000',              'group' => 'general'],
            ['key' => 'contact_address',     'value' => 'ul. Przykładowa 1, 00-001 Warszawa', 'group' => 'general'],
            ['key' => 'properties_per_page', 'value' => '15',                           'group' => 'general'],
            ['key' => 'maintenance_mode',    'value' => '0',                            'group' => 'general'],
            ['key' => 'social_facebook',     'value' => '',                             'group' => 'social'],
            ['key' => 'social_instagram',    'value' => '',                             'group' => 'social'],
        ];

        foreach ($settings as $setting) {
            Setting::firstOrCreate(['key' => $setting['key']], $setting);
        }
    }
}
