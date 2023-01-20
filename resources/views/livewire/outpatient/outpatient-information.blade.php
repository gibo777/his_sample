@php
  $role = Auth::user()->role_name;
@endphp

<div class="outpatient-profile mb-3 border-radius-25">
    <link rel="stylesheet" href="{{ asset('css/patient-registration/patient-registration.css') }}">
    <div class="row patient-row ">
        <div class="img-div">
            <img id="img" src="{{ URL::asset('img/profiles/profile-2.jpg') }}" alt=""
                class="rounded border border-success " height="150" width="150" capture>
            {{-- <button class="img-camera" type="submit"><i class="fa-solid fa-camera"></i></button> --}}
        </div>
        <div class="patient-info pt-3">
            <span  id="patientCode" code="{{$patients->CODE}}">MRN : {{ $patients->CODE }}</span>
            <h2 id="patientFullName">{{ $patients->U_LASTNAME }}, {{ $patients->U_FIRSTNAME }} {{ $patients->U_MIDDLENAME }}</h2>
            <span>{{ $patientType }}</span>
        </div>
        <div class="col text-end ">
            <b class="text-danger" id="btnBack"><i class="fa-solid fa-circle-xmark"></i></i></i></b>
        </div>
    </div>
    <div class="row patient-row ">
        <div class="patient-col col">
            <ul class="nav nav-tabs justify-content-end" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active opPatientInfo" id="nav-patient-info-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-patient-info" type="button" role="tab"
                        aria-controls="nav-patient-info" aria-selected="true">
                        <b>Patient Information</b>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="nav-background-info-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-background-info" type="button" role="tab"
                        aria-controls="nav-background-info" aria-selected="false">
                        <b>Background Information</b>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="nav-hmo-info-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-hmo-info" type="button" role="tab"
                        aria-controls="nav-hmo-info" aria-selected="false">
                        <b>HMO Information</b>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="nav-medical-info-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-medical-info" type="button" role="tab"
                        aria-controls="nav-medical-info" aria-selected="false">
                        <b>Medical Information</b>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="nav-case-info-tab" data-bs-toggle="tab" data-bs-target="#nav-case-info"
                        type="button" role="tab" aria-controls="nav-case-info" aria-selected="false">
                        <b>Case Information</b>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link new-case" id="nav-new-case-tab" data-bs-toggle="tab" data-bs-target="#nav-new-case"
                        type="button" role="tab" aria-controls="nav-new-case" aria-selected="false">
                        <b id="createCase">{{$hasActive ?'Active Case' : 'New Case'}}</b>
                    </button>
                </li>
            </ul>
            <div class="tab-content border-radius-25" id="nav-tabContent">

                {{-- For patient information --}}
                <div class="tab-pane fade show active" id="nav-patient-info" role="tabpanel"
                    aria-labelledby="nav-patient-info-tab" tabindex="0">
                    <form action="" method="" id="patientInformationUpdateForm">
                        <div class="pi-container">
                            <div class="row pt-2">
                                <div class="hidden">
                                    <input type="hidden" id="outpatientViewPInfo" value="{{$authPage}}">
                                </div>
                                <div class="col-6 d-inline-block">
                                    <label for="" class="">Medical Record Number</label>
                                    <input type="text" class="border-radius-25 mx-3 input-custom-1" name="CODE"
                                        value="{{ $patients->CODE }}" readonly>
                                </div>
                                <div class="col-6 text-end d-inline-block">
                                    <input type="checkbox" name="indigenous" id="indigenous" class="">
                                    <label for="indigenous" name="U_INDIGENOUS">&nbsp; Indigenous &nbsp;</label>
                                    <input type="checkbox" name="U_PWD" id="pwd" class="">
                                    <label for="pwd">&nbsp; PWD &nbsp;</label>
                                    <input type="checkbox" name="U_SCDISC" id="senior" class="">
                                    <label for="senior">&nbsp; Senior Citizen &nbsp;</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-size-1">
                                    <label for="">Last Name <span class="text-danger">*</span></label>
                                    <input type="text" id="patientLastName" name="U_LASTNAME" class="border-radius-25 d-block"
                                        value="{{ $patients->U_LASTNAME }}" placeholder="" readonly>
                                </div>
                                <div class="col-size-1">
                                    <label for="">First Name <span class="text-danger">*</span></label>
                                    <input type="text" id="patientFirstName" name="U_FIRSTNAME" class="border-radius-25 d-block"
                                        value="{{ $patients->U_FIRSTNAME }}" placeholder="" readonly>
                                </div>
                                <div class="col-size-1">
                                    <label for="">Middle Name <span class="text-danger">*</span></label>
                                    <input type="text" id="patientMiddleName" name="U_MIDDLENAME" class="border-radius-25 d-block"
                                        value="{{ $patients->U_MIDDLENAME }}" placeholder="">
                                </div>
                                <div class="col-size-2">
                                    <label for="">Ext </label>
                                    <input type="text" id="patientExtName" name="U_EXTNAME" class="border-radius-25 d-block"
                                        value="{{ $patients->U_EXTNAME }}" placeholder="">
                                </div>
                                <div class="col-size-3">
                                    <label for="">Sex <span class="text-danger">*</span></label>
                                    <select name="U_GENDER" id="patientGender" class="border-radius-25 d-block">
                                        @if(($patients->U_GENDER) == ($genders[0]))
                                        <option value="{{ $genders[0]->CODE }}" selected>{{ $genders[0]->NAME }}</option>
                                        @else
                                        <option value="{{ $genders[1]->CODE }}" selected>{{ $genders[1]->NAME }}</option>
                                        @endif
                                        @if(($patients->U_GENDER) != ($genders[0]))
                                        <option value="{{ $genders[0]->CODE }}">{{ $genders[0]->NAME }}</option>
                                        @else
                                        <option value="{{ $genders[1]->CODE }}">{{ $genders[1]->NAME }}</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-size-1">
                                    <label for="">Birthdate <span class="text-danger">*</span></label>
                                    <input type="date" id="patientBirthdate" name="U_BIRTHDATE" class="border-radius-25 datetimepicker d-block" placeholder="mm-dd-yyyy" value="{{$patients->U_BIRTHDATE}}">
                                </div>
                                <div class="col-size-1">
                                    <label for="">Age <span class="text-danger">*</span></label>
                                    <input type="text" id="patientAge" name="U_AGE" class="border-radius-25 d-block"
                                        value="{{ Carbon\Carbon::parse($patients->U_BIRTHDATE)->age }}"
                                        placeholder="" readonly>
                                </div>
                                <div class="col-size-1">
                                    <label for="">Civil Status <span class="text-danger">*</span></label>
                                    <select name="U_CIVILSTATUS" id="patientCivilStatus" class="border-radius-25 d-block">
                                        <option value="{{ $patients->U_CIVILSTATUS }}" selected>
                                            {{ $patients->U_CIVILSTATUS }}
                                        </option>
                                        @foreach ($civilstatus as $status)
                                            @if($status->NAME != $patients->U_CIVILSTATUS)
                                                <option value="{{$status->NAME}}">{{$status->NAME}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-size-1">
                                    <label for="">Occupation </label>
                                    <input type="text" id="patientOccupation" name="U_OCCUPATION" class="border-radius-25 d-block"
                                        value="{{ $patients->U_OCCUPATION }}" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-size-1">
                                    <label for="">Nationality <span class="text-danger">*</span></label>
                                    <select name="U_NATIONALITY" id="patientNationality" class="border-radius-25 .d-block">
                                        <option value="{{$patients->U_NATIONALITY}}">{{$patients->U_NATIONALITY}}</option>
                                        @foreach ($nationalities as $nationality)
                                            @if($nationality->CODE != $patients->U_NATIONALITY)
                                                <option value="{{$nationality->CODE}}">{{$nationality->CODE}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-size-1">
                                    <label for="">Religion <span class="text-danger">*</span></label>
                                    <select name="U_RELIGION" id="patientReligion" class="border-radius-25 d-block">
                                        <option value="{{ $patients->U_RELIGION }}">{{ $patients->U_RELIGION }}
                                        </option>
                                        @foreach ($religions as $religion)
                                            @if($religion->CODE != $patients->U_RELIGION)
                                                <option value="{{ $religion->CODE }}">{{ $religion->CODE }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-size-1">
                                    <label for="">ID Type</label>
                                    <select name="U_IDTYPE" id="patientIdType" class="border-radius-25 d-block">
                                        <option value=""></option>
                                        <option value="">.................................</option>
                                    </select>
                                </div>
                                <div class="col-size-1">
                                    <label for="">ID Number </label>
                                    <input type="number" id="patientIdNumber" name="U_IDNUMBER" class="border-radius-25 d-block"
                                        value="" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-size-1 ">
                                    <label for="">Country <span class="text-danger">*</span></label>
                                    <select name="U_COUNTRY" id="patientCountry" class="border-radius-25 d-block">
                                        <option value="{{$patients->U_COUNTRY ? $patients->U_COUNTRY : ''}}">{{$patients->U_COUNTRY ? $patients->U_COUNTRY : ''}}</option>
                                        @foreach($countries as $country)
                                            @if($patients->U_COUNTRY != $country->country)
                                            <option value={{$country->country}}>{{$country->country}}</option>
                                            @endif
                                        @endforeach
                                        
                                    </select>
                                </div>
                                <div class="col-size-1 ">
                                    <label for="">Province <span class="text-danger">*</span></label>
                                    <select name="U_PROVINCE" id="patientProvince" class="border-radius-25 d-block">
                                        <option value="{{$patients->U_PROVINCE ? $patients->U_PROVINCE : ''}}">{{$patients->U_PROVINCE ? $patients->U_PROVINCE : ''}}</option>
                                    </select>
                                </div>
                                <div class="col-size-1 ">
                                    <label for="">Municipality <span class="text-danger">*</span></label>
                                    <select name="U_CITY" id="patientMunicipality" class="border-radius-25 d-block">
                                        <option value="{{$patients->U_CITY ? $patients->U_CITY : ''}}">{{$patients->U_CITY ? $patients->U_CITY : ''}}</option>
                                    </select>
                                </div>
                                <div class="col-size-1 ">
                                    <label for="">Barangay <span class="text-danger">*</span></label>
                                    <select name="U_BARANGAY" id="patientBarangay" class="border-radius-25 d-block">
                                        <option value="{{$patients->U_BARANGAY ? $patients->U_BARANGAY : ''}}">{{$patients->U_BARANGAY ? $patients->U_BARANGAY : ''}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-size-4">
                                    <label for="">House Number and Street <span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="patientStreet" name="U_STREET" class="border-radius-25 d-block"
                                        value="{{$patients->U_STREET}}" placeholder="">
                                </div>
                                <div class="col-size-1">
                                    <label for="">Zip Code <span class="text-danger">*</span></label>
                                    <input type="text" id="patientZip" name="U_ZIP"
                                        class="border-radius-25 p-input-size-1 d-block" value="{{$patients->U_ZIP}}" placeholder="auto" readonly>
                                </div>
                            </div>
                            <div id="contactDiv">
                                <div class="contactList">
                                    <div class="row" id="contactRow">
                                        @if (count($contacts)==0)
                                            <div class="col-size-1 ">
                                                    <label for="">Contact Type <span class="text-danger">*</span></label>
                                                    <select name="contact_type" id="contactType0" class="border-radius-25 p-input-size-1 d-block contactType">
                                                        <option value="">--Select Type--</option>
                                                        @foreach ($contactTypes as $contactType)
                                                                <option value="{{$contactType->contacttype}}">{{$contactType->contacttype}}</option>
                                                    
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-size-1 ">
                                                    <label for="">Contact Number <span class="text-danger">*</span> </label>
                                                    <input type="text" id="contactNumber" name="contact_no"
                                                        class="border-radius-25 p-input-size-1 d-block" value="" placeholder="">
                                                </div>
                                                <div class="col-size-1 ">
                                                    <label for="">Note </label>
                                                    <input type="text" id="contactNote" name="contact_notes"
                                                        class="border-radius-25 p-input-size-1 d-block" value="" placeholder="">
                                                </div>
                                                <div class="col-size-1" hidden>
                                                        <input type="text" name="contact_id"
                                                            class="border-radius-25 p-input-size-1 d-block" value="" placeholder="">
                                                    </div>
                                                <div class="col align-self-end ">
                                                    <a type="button" class="addContact"><i class="fa-regular fa-square-plus fs-3"></i></a>
                                                </div>
                                        @else
                                            @foreach ($contacts as $contact)
                                                <div class="col-size-1 ">
                                                    <label for="">Contact Type <span class="text-danger">*</span></label>
                                                    <select name="contact_type" id="contactType0" class="border-radius-25 p-input-size-1 d-block contactType">
                                                        <option value="{{$contact->contact_type ? $contact->contact_type : '--Select Type--'}}">{{$contact->contact_type ? $contact->contact_type : '--Select Type--'}}</option>
                                                        @foreach ($contactTypes as $contactType)
                                                            @if ($contact->contact_type !=$contactType->contacttype)
                                                                <option value="{{$contactType->contacttype}}">{{$contactType->contacttype}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-size-1 ">
                                                    <label for="">Contact Number <span class="text-danger">*</span> </label>
                                                    <input type="text" id="contactNumber" name="contact_no"
                                                        class="border-radius-25 p-input-size-1 d-block" value="{{$contact->contact_no ? $contact->contact_no : ''}}" placeholder="">
                                                </div>
                                                <div class="col-size-1 ">
                                                    <label for="">Note </label>
                                                    <input type="text" id="contactNote" name="contact_notes"
                                                        class="border-radius-25 p-input-size-1 d-block" value="{{$contact->contact_notes ? $contact->contact_notes : ''}}" placeholder="">
                                                </div>
                                                <div class="col-size-1" hidden>
                                                        <input type="text" name="contact_id"
                                                            class="border-radius-25 p-input-size-1 d-block" value="{{$contact->id ? $contact->id : ''}}" placeholder="">
                                                    </div>
                                                <div class="col align-self-end ">
                                                    <a type="button" class="addContact"><i class="fa-regular fa-square-plus fs-3"></i></a>
                                                </div>
                                            @endforeach
                                        @endif
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="pb-2" id="emailDiv">
                                <div class="emailList">
                                    <div class="row" id="emailRow">
                                        @if (count($emails)==0)
                                        <div class="col-size-1">
                                            <label for="emailType_1">Email Type <span class="text-danger">*</span></label>
                                            <select id="emailType" name="email-type"
                                                    class="border-radius-25 p-input-size-1 d-block">
                                                    <option value="">--Select Type--</option>
                                                    @foreach ($emailTypes as $emailType)
                                                        
                                                            <option value="{{$emailType->emailtype}}">{{$emailType->emailtype}}</option>
                                                    
                                                        
                                                    @endforeach
                                                </select>
                                        </div>
                                        <div class="col-size-1 ">
                                            <label for="">Email Address <span class="text-danger">*</span></label>
                                            <input type="text" id="emailAddress" name="email"
                                                class="border-radius-25 p-input-size-1 d-block" value=""
                                                placeholder="">
                                        </div>
                                        <div class="col-size-1 ">
                                            <label for="">Note </label>
                                            <input type="text" id="emailNote" name="email-notes"
                                                class="border-radius-25 p-input-size-1 d-block" value=""
                                                placeholder="">
                                        </div>
                                        <div class="col-size-1" hidden>
                                            <input type="text" name="email_id"
                                                class="border-radius-25 p-input-size-1 d-block" value="" placeholder="">
                                        </div>
                                        <div class="col align-self-end">
                                                <a type="button" class="addEmail"><i class="fa-regular fa-square-plus fs-3"></i></a>
                                        </div>
                                            
                                        @else
                                            @foreach ($emails as $email)
                                                <div class="col-size-1">
                                                    <label for="emailType_1">Email Type <span class="text-danger">*</span></label>
                                                    <select id="emailType" name="email-type"
                                                            class="border-radius-25 p-input-size-1 d-block">
                                                            <option value="{{$email->email_type ? $email->email_type : '--Select Type--'}}">{{$email->email_type ? $email->email_type : '--Select Type--'}}</option>
                                                            @foreach ($emailTypes as $emailType)
                                                                @if ($email->email_type!=$emailType->emailtype)
                                                                    <option value="{{$emailType->emailtype}}">{{$emailType->emailtype}}</option>
                                                                @endif
                                                                
                                                            @endforeach
                                                        </select>
                                                </div>
                                                <div class="col-size-1 ">
                                                    <label for="">Email Address <span class="text-danger">*</span></label>
                                                    <input type="text" id="emailAddress" name="email"
                                                        class="border-radius-25 p-input-size-1 d-block" value="{{$email->email}}"
                                                        placeholder="">
                                                </div>
                                                <div class="col-size-1 ">
                                                    <label for="">Note </label>
                                                    <input type="text" id="emailNote" name="email-notes"
                                                        class="border-radius-25 p-input-size-1 d-block" value="{{$email->email_notes}}"
                                                        placeholder="">
                                                </div>
                                                <div class="col-size-1" hidden>
                                                    <input type="text" name="email_id"
                                                        class="border-radius-25 p-input-size-1 d-block" value="{{$email->id}}" placeholder="">
                                                </div>
                                                <div class="col align-self-end">
                                                        <a type="button" class="addEmail"><i class="fa-regular fa-square-plus fs-3"></i></a>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class=" text-end" style="width:100px; float:right; margin-top:-45px; right:45px; position: absolute;">
                                <a role="button" id="patientInformationUpdateButton" class="btn btn-primary border-radius-25 {{$authPage!='R'?'':'disabled'}}">Save</a>
                            </div>
                        </div>
                    </form>
                </div>

                {{-- End of Patient Information --}}

                {{-- For background information --}}
                
                <div class="outpatientBgInfo tab-pane fade" id="nav-background-info" role="tabpanel" aria-labelledby="nav-background-info-tab" tabindex="0">
                    @livewire('outpatient.outpatient-background-information', ['id' => $patients->CODE])
                </div>

                {{-- End of Background Information --}}

                {{-- For HMO information --}}
                
                <div class="tab-pane fade" id="nav-hmo-info" role="tabpanel" aria-labelledby="nav-hmo-info-tab" tabindex="0">
                    @livewire('outpatient.hmo-information', ['id' => $patients->CODE])
                </div>

                {{-- End of HMO Information --}}

                {{-- For medical information --}}

                <div class="tab-pane fade" id="nav-medical-info" role="tabpanel" aria-labelledby="nav-medical-info-tab" tabindex="0">
                    @livewire('outpatient.outpatient-medical-information', ['id' => $patients->CODE])
                </div>

                {{-- End of Medical Information --}}

                {{-- For case information --}}

                <div class="tab-pane fade" id="nav-case-info" role="tabpanel" aria-labelledby="nav-case-info-tab" tabindex="0">
                    @livewire('outpatient.outpatient-case-information', ['id' => $patients->CODE])
                </div>

                {{-- End of Case Information --}}

                {{-- For new case --}}

                <div class="tab-pane fade" id="nav-new-case" role="tabpanel" aria-labelledby="nav-new-case-tab" tabindex="0">
                    @livewire('outpatient.outpatient-new-case', ['id' => $patients->CODE,'hasActive' => $hasActive])
                </div>

                {{-- End of New Case --}}
            </div>
        </div>
    </div>
</div>
