<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Dyrynda\Database\Support\NullableFields;

class ne_hispatientshmoinfos extends Model implements Auditable
{
    use HasFactory;
    use NullableFields;
    use \OwenIt\Auditing\Auditable;

    protected $table = "ne_hispatientshmoinfos";
    protected $fillable = [
        'CODE',
        'U_HMO_HEALTHCAREPROVIDER',
        'U_HMO_ACCOUNTNUMBER',
        'U_HMO_CLIENTTYPE',
        'U_HMO_MEMBERTYPE',
        'U_HMO_LASTNAME',
        'U_HMO_FIRSTNAME',
        'U_HMO_MIDDLENAME',
        'U_HMO_EXTNAME',
        'U_HMO_BIRTHDATE',
        'created_at',
        'updated_at'
    ];

    protected $nullable = [
        'U_HMO_SPECIFYOTHERS'
    ];

}

