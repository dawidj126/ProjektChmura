<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            ['title' => 'O nas',               'slug' => 'o-nas'],
            ['title' => 'Jak to działa',        'slug' => 'jak-to-dziala'],
            ['title' => 'Kontakt',              'slug' => 'kontakt'],
            ['title' => 'FAQ',                  'slug' => 'faq'],
            ['title' => 'Regulamin',            'slug' => 'regulamin'],
            ['title' => 'Polityka prywatności', 'slug' => 'polityka-prywatnosci'],
        ];

        foreach ($pages as $page) {
            Page::firstOrCreate(
                ['slug' => $page['slug']],
                array_merge($page, [
                    'content' => '<p>Treść strony zostanie uzupełniona przez administratora.</p>',
                    'status'  => 'published',
                ])
            );
        }
    }
}
