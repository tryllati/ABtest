<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int $ab_test_id  //Foreign key for ab_test
 * @property string $name
 * @property int $ratio_number
 * @property int $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class ABTestVariant extends Model
{
    use HasFactory;

    protected $table = 'ab_tests_variants';

    protected function casts(): array
    {
        return [
            'id'           => 'integer',
            'ab_test_id '  => 'integer',
            'name'         => 'string',
            'ratio_number' => 'integer',
            'status'       => 'int',
        ];
    }
}
