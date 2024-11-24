<?php

namespace Database\Seeders\ABTests\PageContent;

use App\Models\Test;
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
        $test = Test::withoutGlobalScopes()->where('name', 'Page content')->first();

        DB::table('test_variants')->insert([
            'test_id'      => $test->id,
            'name'         => 'content C',
            'ratio_number' => 1,
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ]);
    }
}
