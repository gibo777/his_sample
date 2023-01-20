<?php

namespace App\Models;

use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;
// use Dyrynda\Database\Support\NullableFields;
use Dyrynda\Database\Support\NullableFields;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ne_hispatientcontact extends Model implements Auditable
{
    use HasFactory;
    use NullableFields;
    // use Auditable;
    // use NullableFields;
    use \OwenIt\Auditing\Auditable;

    protected $table="ne_hispatientcontacts";
        protected $fillable = [
        'id',
        'CODE',
        'U_NAME',
        'contact_type',
        'contact_no',
        'contact_notes'
        ];
        protected $nullable=[
            'contact_notes'
        ];
}
