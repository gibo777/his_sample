<div>
    @include('modal/patient-register/verifyPatientExist')
    @include('modal/utilities/createNewVisitDecide')
    <div class="add-patient mb-3 border-radius-25">
        <div class="row patient-row ">
            <div class="img-div">
                <img id="img" src="{{ URL::asset('img/profiles/profile-2.jpg') }}" alt=""
                    class="rounded border border-success " height="150" width="150" capture>
                {{-- <button class="img-camera" type="submit" id=""><i class="fa-solid fa-camera"></i></button> --}}
            </div>
            <div class="patient-info pt-3">
                <span>MRN : </span>
                {{-- <h3 name="fullName" id="fullName"></h3> --}}
                {{-- <div type="" class="d-block" name="fullName" id="fullName">

                <h2 class="m-0">
                    <input type="text" name="fullName" class="patient-name-position user-select-none" id="fullName"
                        placeholder="Patient Name" disabled="disabled">
                </h2>
                <span id="reg-patient-type">Patient Type:</span><span>{{ __("  $patientType") }}</span>
                </div> --}}
                {{-- <textarea type="text" name="fullName" id="fullName"></textarea> --}}
                    <b class="d-block fs-3"><input type="text" name="fullName" class="patient-name-position user-select-none w-100" 
                        placeholder="Patient Name" id="fullName" disabled="disabled" />
                    </b>
                    <span id="userRights" rights = {{$authPage}} hidden></span> 
                <span id="reg-patient-type">Patient Type:</span><span>{{__("  $patientType")}}</span>
            </div>
            <div class="col text-end ">
                <b class="text-danger" id="btnBack"><i class="fa-solid fa-circle-xmark"></i></i></i></b>
            </div>
        </div>
        <div class="row patient-row ">
            <div class="patient-col col">
                <ul class="nav nav-tabs justify-content-end" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="nav-patient-info-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-patient-info" type="button" role="tab"
                            aria-controls="nav-patient-info" aria-selected="true">
                            <b>Patient Information</b>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link nav-background-info-tab-bg" disabled>
                            <b>Background Information</b>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" disabled>
                            <b>HMO Information</b>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" disabled>
                            <b>Medical Information</b>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" disabled>
                            <b>Case Information</b>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link new-case" disabled>
                            <b>New Case</b>
                        </button>
                    </li>
                </ul>
                <div class="tab-content border-radius-25" id="nav-tabContent">

                    {{-- For patient information --}}
                    <div class="tab-pane fade show active" id="nav-patient-info" role="tabpanel"
                        aria-labelledby="nav-patient-info-tab" tabindex="0">
                        <div id="patient-info-register-patient">

                            <div class="pi-container ">
                                <div class="row pt-2">
                                    <div class="col-6 d-inline-block">
                                        <label for="" class="">Medical Record Number</label>
                                        <input type="text" class="border-radius-25 mx-3 input-custom-1"
                                            id="CODE" name="CODE" value="" readonly>
                                    </div>
                                    <div class="col-6 text-end d-inline-block">
                                        <input type="checkbox" name="indigenous" id="indigenous" class="">
                                        <label for="indigenous">&nbsp; Indigenous &nbsp;</label>
                                        <input type="checkbox" name="pwd" id="pwd" class="">
                                        <label for="pwd">&nbsp; PWD &nbsp;</label>
                                        <input type="checkbox" name="senior" id="senior" class="">
                                        <label for="senior">&nbsp; Senior Citizen &nbsp;</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-size-1">
                                        <label for="">Last Name <span class="text-danger">*</span></label>
                                        <input type="text" id="lastName" name="U_LASTNAME"
                                            class="border-radius-25 patient-form-field d-block" value=""
                                            placeholder="">
                                    </div>
                                    <div class="col-size-1">
                                        <label for="">First Name <span class="text-danger">*</span></label>
                                        <input type="text" id="firstName" name="U_FIRSTNAME"
                                            class="border-radius-25 patient-form-field d-block" value=""
                                            placeholder="">
                                    </div>
                                    <div class="col-size-1">
                                        <label for="">Middle Name <span class="text-danger">*</span></label>
                                        <input type="text" id="middleName" name="U_MIDDLENAME"
                                            class="border-radius-25 patient-form-field d-block" value=""
                                            placeholder="">
                                    </div>
                                    <div class="col-size-2">
                                        <label for="">Ext </label>
                                        <input type="text" id="" name="U_EXTNAME"
                                            class="border-radius-25 d-block" value="" placeholder="">
                                    </div>
                                    <div class="col-size-3">
                                        <label for="">Sex <span class="text-danger">*</span></label>
                                        <select name="U_GENDER" id="" class="border-radius-25 d-block">
                                            <option value="">-Gender-</option>
                                            @foreach ($u_hisgenders as $key => $data)
                                                <option value="{{ $data->CODE }}">{{ $data->NAME }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-size-1">
                                        <label for="">Birthdate <span class="text-danger">*</span></label>
                                        <input type="date" class="border-radius-25 d-block" name="U_BIRTHDATE"
                                            id="bday" placeholder="mm-dd-yyyy" autocomplete="off">
                                    </div>

                                    <div class="col-size-1">
                                        <label for="">Age <span class="text-danger">*</span></label>
                                        <input type="text" id="age" name="U_AGE"
                                            class="border-radius-25 d-block" value="{{ $age }}"
                                            placeholder="" readonly>
                                    </div>
                                    <div class="col-size-1">
                                        <label for="">Civil Status <span class="text-danger">*</span></label>
                                        <select name="U_CIVILSTATUS" class="border-radius-25 d-block">

                                            @foreach ($u_hiscivilstatus as $key => $data)
                                                <option value="{{ $data->NAME }}">{{ $data->NAME }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-size-1">
                                        <label for="">Occupation </label>
                                        <input type="text" id="" name="U_OCCUPATION"
                                            class="border-radius-25 d-block" value="" placeholder="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-size-1">
                                        <label for="">Nationality <span class="text-danger">*</span></label>
                                        <select id="" class="border-radius-25 d-block" name="U_NATIONALITY">

                                            <option value=""></option>
                                            <optgroup label="Top 3 Nationality">

                                                @foreach ($top3Nationalities as $nationality)
                                                    <option value="{{ $nationality->u_nationality }}">
                                                        {{ $nationality->u_nationality }}
                                                    </option>
                                                @endforeach
                                              
                                                {{-- <option
                                                    style="line-height: 1px !important;height:1px  !important; min-height:1px  !important; max-height:1px  !important; padding:0  !important; font-size: 1pt  !important; background-color: #818181;"
                                                    disabled>&nbsp;</option> --}}
                                                
                                            </optgroup>

                                            <optgroup  label="List of Nationality">

                                                @foreach ($nationalities as $key => $data)
                                                    <option value="{{ $data->NAME }}">{{ $data->NAME }}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="col-size-1">
                                        <label for="">Religion <span class="text-danger">*</span></label>
                                        <select id="" class="border-radius-25 d-block" name="U_RELIGION">
                                            <option value=""></option>
                                            @foreach ($u_hisreligions as $key => $data)
                                                <option value="{{ $data->NAME }}">{{ $data->NAME }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-size-1">
                                        <label for="">ID Type</label>
                                        <select id="" class="border-radius-25 d-block" name="idtype">
                                            <option value=""></option>
                                            <option value="07301994">.................................</option>
                                        </select>
                                    </div>
                                    <div class="col-size-1">
                                        <label for="">ID Number </label>
                                        <input type="number" id="" class="border-radius-25 d-block"
                                            value="" placeholder="" name="idnumber">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-size-1 ">
                                        <label for="">Country <span class="text-danger">*</span></label>
                                        <select id="country-patient-reg" class="border-radius-25 d-block"
                                            name="U_COUNTRY">
                                            <option value=""></option>
                                            @foreach ($countries as $key => $data)
                                                <option value="{{ $data->country }}">{{ $data->country }}</option>
                                            @endforeach
                                        </select>
                                        <p hidden>Selected City ID: {{ $city_id }}</p>
                                    </div>
                                    <div class="col-size-1 ">
                                        <label for="">Province <span class="text-danger">*</span></label>
                                        <select id="province-patient-reg" class="border-radius-25 d-block"
                                            name="U_PROVINCE">
                                            <option value=""></option>
                                            <!-- @foreach ($u_provinces as $key => $data)
<option value="">{{ $data->province }}</option>
@endforeach -->
                                        </select>
                                    </div>
                                    <div class="col-size-1 ">
                                        <label for="">Municipality <span class="text-danger">*</span></label>
                                        <select id="city-patient-reg" class="border-radius-25 d-block"
                                            name="U_CITY">
                                            <option value=""></option>
                                            <!-- @foreach ($municipalities as $key => $data)
<option value="">{{ $data->municipality }}</option>
@endforeach -->
                                        </select>
                                    </div>
                                    <div class="col-size-1 ">
                                        <label for="">Barangay <span class="text-danger">*</span></label>
                                        <select id="brgy-patient-reg" class="border-radius-25 d-block"
                                            name="U_BARANGAY">
                                            <option value=""></option>
                                            <!-- @foreach ($barangay as $key => $data)
<option value="">{{ $data->barangay }}</option>
@endforeach -->
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-size-4">
                                        <label for="">House Number and Street <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="street-patient-reg"
                                            class="border-radius-25 d-block" value="" placeholder=""
                                            name="U_STREET">
                                    </div>
                                    <div class="col-size-1">
                                        <label for="">Zip Code <span class="text-danger">*</span></label>
                                        <input type="text" id="zip-patient-reg" name="U_ZIP"
                                            class="border-radius-25 p-input-size-1 d-block" value=""
                                            placeholder="auto" readonly>
                                    </div>
                                </div>
                                <div id="contactDiv">
                                    <div class="contactList">
                                        <div class="row" id="contactRow">
                                            <div class="col-size-1 ">
                                                <label for="">Contact Type <span
                                                        class="text-danger">*</span></label>
                                                <select name="contact_type" id="contactType0"
                                                    class="border-radius-25 p-input-size-1 d-block contactType">
                                                    <option value="">--Select Type--</option>
                                                    @foreach ($contactTypes as $contactType)
                                                        <option value="{{ $contactType->contacttype }}">
                                                            {{ $contactType->contacttype }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-size-1 ">
                                                <label for="">Contact Number <span
                                                        class="text-danger">*</span> </label>
                                                <input type="text" id="contactNumber" name="contact_no"
                                                    class="border-radius-25 p-input-size-1 d-block" value=""
                                                    placeholder="">
                                            </div>
                                            <div class="col-size-1 ">
                                                <label for="">Note </label>
                                                <input type="text" id="contactNote" name="contact_notes"
                                                    class="border-radius-25 p-input-size-1 d-block" value=""
                                                    placeholder="">
                                            </div>
                                            <div class="col-size-1" hidden>
                                                <input type="text" name="contact_id"
                                                    class="border-radius-25 p-input-size-1 d-block" value=""
                                                    placeholder="">
                                            </div>
                                            <div class="col align-self-end ">
                                                <a type="button" class="addContact" id=""><i
                                                        class="fa-regular fa-square-plus fs-3"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pb-2" id="emailDiv">
                                    <div class="emailList">
                                        <div class="row" id="emailRow">
                                            <div class="col-size-1">
                                                <label for="emailType_1">Email Type <span
                                                        class="text-danger">*</span></label>
                                                <select id="emailType" name="email-type"
                                                    class="border-radius-25 p-input-size-1 d-block">
                                                    <option value="">--Select Type--</option>
                                                    @foreach ($emailTypes as $emailType)
                                                        <option value="{{$emailType->emailtype}}">{{$emailType->emailtype}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-size-1 ">
                                                <label for="">Email Address <span
                                                        class="text-danger">*</span></label>
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
                                                <a type="button" class="addEmail" id=""><i
                                                        class="fa-regular fa-square-plus fs-3"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="add-patient-save-button text-end">
                                    <a role="button" id="addpatient-register"
                                        class="btn btn-primary border-radius-25" user="{{Auth::user()->role_name}}">Save</a>
                                </div>
                            </div>

                        </div>
                    </div>

                    {{-- For background information --}}
                    {{-- <div class="tab-pane fade" id="nav-background-info" role="tabpanel"
                        aria-labelledby="nav-background-info-tab" tabindex="0">
                        @livewire('patient-register.add-patient.background-information')
                    </div> --}}


                    {{-- For medical information --}}
                    {{-- <div class="tab-pane fade" id="nav-medical-info" role="tabpanel"
                        aria-labelledby="nav-medical-info-tab" tabindex="0">
                        @livewire('patient-register.add-patient.medical-information')
                    </div> --}}

                    {{-- For case information --}}
                    {{-- <div class="tab-pane fade" id="nav-case-info" role="tabpanel"
                        aria-labelledby="nav-case-info-tab" tabindex="0">
                        @livewire('patient-register.add-patient.case-information')
                    </div> --}}

                    {{-- <div class="tab-pane fade" id="nav-add-new-case" role="tabpanel"
                        aria-labelledby="nav-add-new-case-tab" tabindex="0">
                        @livewire('patient-register.add-patient.new-case')
                    </div> --}}
                </div>
            </div>
        </div>
        <link rel="stylesheet" href="{{ asset('css/patient-registration/patient-registration.css') }}">
    </div>



</div>
