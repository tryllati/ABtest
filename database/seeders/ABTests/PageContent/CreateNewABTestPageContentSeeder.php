<?php

namespace Database\Seeders\ABTests\PageContent;

use App\Enums\ABTestTypeEnum;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateNewABTestPageContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ab_tests')->insert([
            'name' => 'Page content',
            'type' => ABTestTypeEnum::TARGETING_RATIO->value,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
