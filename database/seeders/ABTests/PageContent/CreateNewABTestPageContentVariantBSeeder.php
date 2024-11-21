<?php

namespace Database\Seeders\ABTests\PageContent;

use App\Models\Test;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateNewABTestPageContentVariantBSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $test = Test::where('name', 'Page content')->first();

        DB::table('test_variants')->insert([
            'test_id'      => $test->id,
            'name'         => 'content B',
            'ratio_number' => 3,
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ]);
    }
}
