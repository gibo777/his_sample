<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Dyrynda\Database\Support\NullableFields;

class u_hisrequests extends Model
{
    use HasFactory;
    use NullableFields;
    use \OwenIt\Auditing\Auditable;
    protected $table="u_hisrequests";

    protected $fillable = [
        'COMPANY',
        'BRANCH',
        'DOCID',
        'DOCNO',
        'DOCSERIES',
        'DOCSTATUS',
        'DATECREATED',
        'CREATEDBY',
        'LASTUPDATED',
        'LASTUPDATEDBY',
        'RCDVERSION',
        'U_PAYMENTTERM',
        'U_TRXTYPE',
        'U_REFTYPE',
        'U_GENDER',
        'U_AGE',
        'U_BILLCHARGEBY',
        'U_BILLCHARGENO',
        'U_BILLCHARGEREMARKS',
        'U_REFNO',
        'U_PATIENTID',
        'U_PRICELIST',
        'U_PATIENTNAME',
        'U_BIRTHDATE',
        'U_DISCONBILL',
        'U_TYPE',
        'U_AMOUNTBEFDISC',
        'U_VATAMOUNT',
        'U_DEPARTMENT',
        'U_DOCTORID',
        'U_REMARKS',
        'U_REQUESTBY',
        'U_REQUESTDEPARTMENT',
        'U_DISCCODE',
        'U_DUEDATE',
        'U_REQUESTDATE',
        'U_DUETIME',
        'U_REQUESTTIME',
        'U_REQDATE',
        'U_DISCAMOUNT',
        'U_PREDISCAMOUNT',
        'U_SCDISC',
        'U_AMOUNT',
        'U_ISSTAT',
        'U_RENDERED',
        'U_REQTIME',
        'U_PAYREFNO',
        'U_PREPAID',
        'U_SHOWALLITEMS',
        'U_ALLOWINTSECREQ',
        'APPROVALSTATUS',
        'APPROVALREMARKS',
        'APPROVALDATA',
        'U_CANCELLEDREMARKS',
        'U_CANCELLEDBY',
        'U_EDITBY',
        'U_ISHB',
        'U_ISPF',
        'U_ISPM',
        'U_ALLOWINTSECPOS',
        'U_CANCELLEDREASON',
        'U_PACKAGENO',
        'U_PAYREFTYPE',
        'U_STOCKLINK',
        'U_OTHERAMOUNT',
        'U_PACKAGEDPRICE',

    ];

    protected $nullable = [
        'U_GENDER',
        'U_BILLCHARGEREMARKS',
        'U_BIRTHDATE',
        'U_TYPE',
        'U_DEPARTMENT',
        'U_DOCTORID',
        'U_REMARKS',
        'U_REQUESTBY',
        'U_REQUESTDEPARTMENT',
        'U_DUEDATE',
        'U_REQUESTDATE',
        'U_DUETIME',
        'U_REQUESTTIME',
        'U_REQDATE',
        'U_REQTIME',
        'APPROVALDATA',
    ];
}
