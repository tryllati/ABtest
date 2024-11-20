<?php

namespace Database\Seeders;

use Database\Seeders\ABTests\PageContent\CreateNewABTestPageContentSeeder;
use Database\Seeders\ABTests\PageContent\CreateNewABTestPageContentVariantASeeder;
use Database\Seeders\ABTests\PageContent\CreateNewABTestPageContentVariantBSeeder;
use Database\Seeders\ABTests\PageContent\CreateNewABTestPageContentVariantCSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ABTestPageContentSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        $this->call([
            CreateNewABTestPageContentSeeder::class,
            CreateNewABTestPageContentVariantASeeder::class,
            CreateNewABTestPageContentVariantBSeeder::class,
            CreateNewABTestPageContentVariantCSeeder::class,
        ]);
    }
}
