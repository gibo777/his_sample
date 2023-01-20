<?php

namespace App\Models;

use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;
// use Dyrynda\Database\Support\NullableFields;
use Dyrynda\Database\Support\NullableFields;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ne_hispatientsbginfo extends Model implements Auditable
{
    use HasFactory;
    use NullableFields;
    // use Auditable;
    // use NullableFields;
    use \OwenIt\Auditing\Auditable;
    protected $table = "ne_hispatientsbginfos";
    protected $fillable = [
        'CODE',
        'U_BG_NAME',
        'U_BG_LASTNAME',
        'U_BG_FIRSTNAME',
        'U_BG_MIDDLENAME',
        'U_BG_EXTNAME',
        'U_BG_RELATIONSHIP',
        'U_BG_CONTACTNO',
        'U_BG_CONTACTNO2ND',
        'U_BG_COUNTRY',
        'U_BG_PROVINCE',
        'U_BG_CITY',
        'U_BG_BRGY',
        'U_BG_ZIP',
        'U_BG_STREET',
        'U_BG_ADDRESS',
        'U_BG_EMERGENCY',
        'created_at',
        'updated_at'
    ];

    protected $nullable = [
        'U_BG_CONTACTNO2ND',
        'U_BG_MIDDLENAME',
        'U_BG_EXTNAME',
    ];
}
