<?php

namespace App\Models;

use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;
// use Dyrynda\Database\Support\NullableFields;
use Dyrynda\Database\Support\NullableFields;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ne_hispatientemail extends Model implements Auditable
{
    use HasFactory;
    use NullableFields;
    // use Auditable;
    // use NullableFields;
    use \OwenIt\Auditing\Auditable;

    protected $table="ne_hispatientemails";
        protected $fillable = [
        'id',
        'CODE',
        'U_NAME',
        'email_type',
        'email',
        'email_notes'
        ];
        protected $nullable=[
            'email_notes'
        ];
}
