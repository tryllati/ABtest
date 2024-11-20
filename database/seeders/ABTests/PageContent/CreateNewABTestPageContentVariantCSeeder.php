<?php

namespace Database\Seeders\ABTests\PageContent;

use App\Models\ABTest;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateNewABTestPageContentVariantCSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $abTest = ABTest::where('name', 'Page content')->first();

        DB::table('ab_tests_variants')->insert([
            'ab_test_id' => $abTest->id,
            'name' => 'content C',
            'ratio_number' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
