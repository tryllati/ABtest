<?php

namespace Database\Seeders\ABTests\HeaderLogo;

use App\Models\Test;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateNewABTestVariantHeaderLogoAlignCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $test = Test::where('name', 'Header logo alignment')->first();

        DB::table('test_variants')->insert([
            'test_id'      => $test->id,
            'name'         => 'align center',
            'ratio_number' => 3,
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ]);
    }
}
