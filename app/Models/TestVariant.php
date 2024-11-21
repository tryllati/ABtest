<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int $test_id
 * @property string $name
 * @property int $ratio_number
 * @property int $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read Test $test
 */
class TestVariant extends Model
{
    protected $table = 'test_variants';

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'id'           => 'integer',
        'test_id '     => 'integer',
        'name'         => 'string',
        'ratio_number' => 'integer',
        'status'       => 'int',
    ];

    /**
     * @return BelongsTo<Test, TestVariant>
     */
    public function test(): BelongsTo
    {
        return $this->belongsTo(Test::class);
    }
}
