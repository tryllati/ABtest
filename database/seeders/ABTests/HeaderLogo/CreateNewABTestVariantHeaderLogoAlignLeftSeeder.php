<?php

namespace Database\Seeders\ABTests\HeaderLogo;

use App\Models\ABTest;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateNewABTestVariantHeaderLogoAlignLeftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $abTest = ABTest::where('name', 'Header logo alignment')->first();

        DB::table('ab_tests_variants')->insert([
            'ab_test_id' => $abTest->id,
            'name' => 'align left',
            'ratio_number' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
