<?php

namespace App\Models;

use App\Enums\ABTestTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $name
 * @property ABTestTypeEnum $enum
 * @property int $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class ABTest extends Model
{
    use HasFactory;

    protected $table = 'ab_tests';

    protected function casts(): array
    {
        return [
            'id'     => 'integer',
            'name'   => 'string',
            'type'   => ABTestTypeEnum::class,
            'status' => 'int',
        ];
    }
}
