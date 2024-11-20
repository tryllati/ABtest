<?php

namespace Database\Seeders\ABTests\HeaderLogo;

use App\Enums\ABTestTypeEnum;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateNewABTestHeaderLogoAlignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ab_tests')->insert([
            'name' => 'Header logo alignment',
            'type' => ABTestTypeEnum::TARGETING_RATIO->value,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
