<?php

namespace Database\Seeders\ABTests\PageContent;

use App\Models\Test;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateNewABTestPageContentVariantASeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $test = Test::withoutGlobalScopes()->where('name', 'Page content')->first();

        DB::table('test_variants')->insert([
            'test_id'      => $test->id,
            'name'         => 'content A',
            'ratio_number' => 2,
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ]);
    }
}
