<?php

namespace Database\Seeders;

use Database\Seeders\ABTests\HeaderLogo\CreateNewABTestHeaderLogoAlignmentSeeder;
use Database\Seeders\ABTests\HeaderLogo\CreateNewABTestVariantHeaderLogoAlignCenterSeeder;
use Database\Seeders\ABTests\HeaderLogo\CreateNewABTestVariantHeaderLogoAlignLeftSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ABTestHeaderLogoAlignmentSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        $this->call([
            CreateNewABTestHeaderLogoAlignmentSeeder::class,
            CreateNewABTestVariantHeaderLogoAlignLeftSeeder::class,
            CreateNewABTestVariantHeaderLogoAlignCenterSeeder::class,
        ]);
    }
}
