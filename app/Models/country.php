<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Dyrynda\Database\Support\NullableFields;

class country extends Model
{
    use HasFactory;
    use NullableFields;
    // use Auditable;
    // use NullableFields;
    use \OwenIt\Auditing\Auditable;

    protected $table="countries";
    protected $fillable = [
        'id',
        'country',
        'country_code',
        'used',
    ];
    protected $nullable = [
        'id',
        'country',
        'country_code',
        'used',
    ];


}
