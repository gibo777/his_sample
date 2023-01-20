<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Dyrynda\Database\Support\NullableFields;

class u_hisrequestitems extends Model
{
    use HasFactory;
    use NullableFields;
    use \OwenIt\Auditing\Auditable;
    protected $table="u_hisrequestitems";

    protected $fillable = [
        'COMPANY',
        'BRANCH',
        'DOCID',
        'LINEID',
        'DATECREATED',
        'CREATEDBY',
        'LASTUPDATED',
        'LASTUPDATEDBY',
        'RCDVERSION',
        'U_ITEMGROUP',
        'U_ITEMCODE',
        'U_ITEMDESC',
        'U_QUANTITY',
        'U_UOM',
        'U_UNITPRICE',
        'U_PRICE',
        'U_VATCODE',
        'U_VATRATE',
        'U_VATAMOUNT',
        'U_LINETOTAL',
        'U_DISCPERC',
        'U_SCDISCAMOUNT',
        'U_DISCAMOUNT',
        'U_ISPACKAGE',
        'U_RTQTY',
        'U_STATPERC',
        'U_STATUNITPRICE',
        'U_SCSTATDISCAMOUNT',
        'U_CHRGQTY',
        'U_ISCASHDISC',
        'U_ISBILLDISC',
        'U_ISAUTODISC',
        'U_PRICING',
        'U_TEMPLATE',
        'U_DOCTORID',
        'U_DOCTORNAME',
        'U_ISFOC',
        'U_REMARKS',
        'U_ISSTAT',
        'U_NONVATCS',
        'U_PACKAGEDPRICE',
    ];

    protected $nullable = [

        'U_VATCODE',
        'U_TEMPLATE',
        'U_REMARKS',
        
    ];
}
