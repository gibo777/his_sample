<div class="reg-profile mb-5">
    <div class="row patient-row ">
        <div class="img-div">
            <img id="img" src="{{ URL::asset('img/profiles/profile-2.jpg') }}" alt=""
                class="rounded border border-success " height="150" width="150" capture>
            {{-- <button class="img-camera" type="submit" id=""><i class="fa-solid fa-camera"></i></button> --}}
        </div>
        <div class="patient-info pt-3">
            <span>MRN : {{ $patients->CODE }}</span>
            <h1>{{ $patients->U_LASTNAME }}, {{ $patients->U_FIRSTNAME }} {{ $patients->U_MIDDLENAME }}</h1>
            <span>{{ $patientType }}</span><br />
            <span>Service Type</span>
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
                    <button class="nav-link" id="nav-background-info-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-background-info" type="button" role="tab"
                        aria-controls="nav-background-info" aria-selected="false">
                        <b>Background Information</b>
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
            </ul>
            <div class="tab-content" id="nav-tabContent">

                {{-- For patient information --}}
                <div class="tab-pane fade show active" id="nav-patient-info" role="tabpanel"
                    aria-labelledby="nav-patient-info-tab" tabindex="0">
                    <form action="" method="">
                        <div class="pi-container ">
                            <div class="row">
                                <div class="col-6 d-inline-block">
                                    <label for="" class="">Medical Record Number</label>
                                    <input type="text" class="mx-3 input-custom-1" id="" name=""
                                        value="{{ $patients->CODE }}" readonly>
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
                                    <input type="text" id="" name="" class="d-block"
                                        value="{{ $patients->U_LASTNAME }}" placeholder="">
                                </div>
                                <div class="col-size-1">
                                    <label for="">First Name <span class="text-danger">*</span></label>
                                    <input type="text" id="" name="" class="d-block"
                                        value="{{ $patients->U_FIRSTNAME }}" placeholder="">
                                </div>
                                <div class="col-size-1">
                                    <label for="">Middle Name <span class="text-danger">*</span></label>
                                    <input type="text" id="" name="" class="d-block"
                                        value="{{ $patients->U_MIDDLENAME }}" placeholder="">
                                </div>
                                <div class="col-size-2">
                                    <label for="">Ext </label>
                                    <input type="text" id="" name="" class="d-block"
                                        value="{{ $patients->U_EXTNAME }}" placeholder="">
                                </div>
                                <div class="col-size-3">
                                    <label for="">Gender <span class="text-danger">*</span></label>
                                    <select name="" id="" class="d-block">
                                        @if(($patients->U_GENDER) == ($genders[0]))
                                        <option value="{{ $genders[0]->GENDERCODE }}" selected>{{ $genders[0]->NAME }}</option>
                                        @else
                                        <option value="{{ $genders[1]->GENDERCODE }}" selected>{{ $genders[1]->NAME }}</option>
                                        @endif
                                        @if(($patients->U_GENDER) != ($genders[0]))
                                        <option value="{{ $genders[0]->GENDERCODE }}">{{ $genders[0]->NAME }}</option>
                                        @else
                                        <option value="{{ $genders[1]->GENDERCODE }}">{{ $genders[1]->NAME }}</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-size-1">
                                    <label for="">Birthdate <span class="text-danger">*</span></label>
                                    <input type="text" id="" name=""
                                        class="datetimepicker d-block" placeholder="mm-dd-yyyy"
                                        value="{{ date('m/d/Y', strtotime($patients->U_BIRTHDATE)) }}"
                                        placeholder="">
                                </div>
                                <div class="col-size-1">
                                    <label for="">Age <span class="text-danger">*</span></label>
                                    <input type="text" id="" name="" class="d-block"
                                        value="{{ Carbon\Carbon::parse($patients->U_BIRTHDATE)->age }}"
                                        placeholder="" readonly>
                                </div>
                                <div class="col-size-1">
                                    <label for="">Civil Status <span class="text-danger">*</span></label>
                                    <select name="" id="" class=" d-block">
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
                                    <input type="text" id="" name="" class="d-block"
                                        value="{{ $patients->U_OCCUPATION }}" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-size-1">
                                    <label for="">Nationality <span class="text-danger">*</span></label>
                                    <select name="" id="" class="d-block">
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
                                    <select name="" id="" class="d-block">
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
                                    <select name="" id="" class="d-block">
                                        <option value=""></option>
                                        <option value="">.................................</option>
                                    </select>
                                </div>
                                <div class="col-size-1">
                                    <label for="">ID Number </label>
                                    <input type="number" id="" name="" class="d-block"
                                        value="" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-size-1 ">
                                    <label for="">Country <span class="text-danger">*</span></label>
                                    <select name="" id="" class="d-block">
                                        <option value=""></option>
                                        <option value="">.................................</option>
                                    </select>
                                </div>
                                <div class="col-size-1 ">
                                    <label for="">Province <span class="text-danger">*</span></label>
                                    <select name="" id="" class="d-block">
                                        <option value=""></option>
                                        <option value="">.................................</option>
                                    </select>
                                </div>
                                <div class="col-size-1 ">
                                    <label for="">Municipality <span class="text-danger">*</span></label>
                                    <select name="" id="" class="d-block">
                                        <option value=""></option>
                                        <option value="">.................................</option>
                                    </select>
                                </div>
                                <div class="col-size-1 ">
                                    <label for="">Barangay <span class="text-danger">*</span></label>
                                    <select name="" id="" class="d-block">
                                        <option value=""></option>
                                        <option value="">.................................</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-size-4">
                                    <label for="">House Number and Street <span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="" name="" class="d-block"
                                        value="" placeholder="">
                                </div>
                                <div class="col-size-1">
                                    <label for="">Zip Code <span class="text-danger">*</span></label>
                                    <input type="text" id="" name=""
                                        class="p-input-size-1 d-block" value="" placeholder="auto" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-size-1 ">
                                    <label for="">Contact Type <span class="text-danger">*</span></label>
                                    <select name="" id="" class="p-input-size-1 d-block">
                                        <option value=""></option>
                                        <option value="">.................................</option>
                                    </select>
                                </div>
                                <div class="col-size-1 ">
                                    <label for="">Contact Number <span class="text-danger">*</span> </label>
                                    <input type="number" id="" name=""
                                        class="p-input-size-1 d-block" value="" placeholder="">
                                </div>
                                <div class="col-size-1 ">
                                    <label for="">Note </label>
                                    <input type="text" id="" name=""
                                        class="p-input-size-1 d-block" value="" placeholder="">
                                </div>
                            </div>
                            <div class="row pb-3">
                                <div class="col-size-1 ">
                                    <label for="">Email Type <span class="text-danger">*</span></label>
                                    <select name="" id="" class="p-input-size-1 d-block">
                                        <option value=""></option>
                                        <option value="">.................................</option>
                                    </select>
                                </div>
                                <div class="col-size-1 ">
                                    <label for="">Email Address <span class="text-danger">*</span></label>
                                    <input type="text" id="" name=""
                                        class="p-input-size-1 d-block" value="" placeholder="">
                                </div>
                                <div class="col-size-1 ">
                                    <label for="">Note </label>
                                    <input type="text" id="" name=""
                                        class="p-input-size-1 d-block" value="" placeholder="">
                                </div>
                                <div class="col text-end">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                {{-- For background information --}}
                <div class="tab-pane fade" id="nav-background-info" role="tabpanel"
                    aria-labelledby="nav-background-info-tab" tabindex="0">
                    <form action="" method="">
                        <div class="bi-container px-4 py-2">
                            <div class="row ml-3 pt-1">
                                <div class="col-sm-3 h6 fw-bold">
                                    <span>Father's Information </span>
                                </div>
                                <div class="col">
                                    <input type="checkbox" id="" name=""
                                        class="checkbox-input d-inline"> &nbsp;
                                    <label for="" class=""> Same as Emergency Contact</label>
                                </div>
                            </div>
                            <div class="row ml-3">
                                <div class="bi-col-2">
                                    <label for="" class="">Father's Full Name</label>
                                    <input type="text" value="{{ $patients->U_FATHERNAME }}" id="" name="" class="d-block">
                                </div>
                                <div class="bi-col-1">
                                    <label for="" class="">Father's Address</label>
                                    <div class="input-group">
                                        <input type="text" value="" name="" id="" placeholder="Address" aria-label="Text input with dropdown button">
                                        
                                        <button class="btn dropdown-toggle border-start" type="button" data-bs-toggle="dropdown" aria-expanded="false">Barangay</button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Action before</a></li>
                                            <li><a class="dropdown-item" href="#">Another action before</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                            <li><a class="dropdown-item" href="#">Separated link</a></li>
                                        </ul>
                                        <button class="btn dropdown-toggle border-start" type="button" data-bs-toggle="dropdown" aria-expanded="false">Town/City</button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Action before</a></li>
                                            <li><a class="dropdown-item" href="#">Another action before</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                            <li><a class="dropdown-item" href="#">Separated link</a></li>
                                        </ul>
                                        <button class="btn dropdown-toggle border-start" type="button" data-bs-toggle="dropdown" aria-expanded="false">State/Province</button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Action before</a></li>
                                            <li><a class="dropdown-item" href="#">Another action before</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                            <li><a class="dropdown-item" href="#">Separated link</a></li>
                                        </ul>
                                    </div>
                                    {{-- <input type="text" id="" name="" class="d-block"> --}}
                                    <span class="f-sm-primary">Same as Patient</span>
                                </div>
                                <div class="bi-col-2">
                                    <label for="" class="">Father's Contact No.</label>
                                    <input type="number" value="{{ $patients->U_FATHERTELNO }}" id="" name="" class="d-block">
                                </div>
                            </div>
                            <div class="row mt-2 ml-3 ">
                                <div class="col-sm-3 h6 fw-bold">
                                    <span>Mother's Information </span>
                                </div>
                                <div class="col">
                                    <input type="checkbox" id="" name=""
                                        class="checkbox-input d-inline">&nbsp;
                                    <label for="" class=""> Same as Emergency Contact</label>
                                </div>
                            </div>
                            <div class="row ml-3">
                                <div class="bi-col-2">
                                    <label for="" class="">Mother's Full Name</label>
                                    <input type="text" value="{{ $patients->U_MOTHERNAME }}" id="" name="" class="d-block">
                                </div>
                                <div class="bi-col-1">
                                    <label for="" class="">Mother's Address</label>
                                    <div class="input-group">
                                        <input type="text" value="" name="" id="" placeholder="Address" aria-label="Text input with dropdown button">
                                        
                                        <button class="btn dropdown-toggle border-start" type="button" data-bs-toggle="dropdown" aria-expanded="false">Barangay</button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Action before</a></li>
                                            <li><a class="dropdown-item" href="#">Another action before</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                            <li><a class="dropdown-item" href="#">Separated link</a></li>
                                        </ul>
                                        <button class="btn dropdown-toggle border-start" type="button" data-bs-toggle="dropdown" aria-expanded="false">Town/City</button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Action before</a></li>
                                            <li><a class="dropdown-item" href="#">Another action before</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                            <li><a class="dropdown-item" href="#">Separated link</a></li>
                                        </ul>
                                        <button class="btn dropdown-toggle border-start" type="button" data-bs-toggle="dropdown" aria-expanded="false">State/Province</button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Action before</a></li>
                                            <li><a class="dropdown-item" href="#">Another action before</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                            <li><a class="dropdown-item" href="#">Separated link</a></li>
                                        </ul>
                                    </div>
                                    <span class="f-sm-primary">Same as Patient</span>
                                </div>
                                <div class="bi-col-2">
                                    <label for="" class="">Mother's Contact No.</label>
                                    <input type="number" value="{{ $patients->U_MOTHERTELNO }}" id="" name="" class="d-block">
                                </div>
                            </div>
                            <div class="row mt-2 ml-3 ">
                                <div class="col-sm-3">
                                    <span class="h6 fw-bold">Spouse Information</span>
                                </div>
                                <div class="col">
                                    <input type="checkbox" id="" name=""
                                        class="checkbox-input d-inline">&nbsp;
                                    <label for="" class=""> Same as Emergency Contact</label>
                                </div>
                            </div>
                            <div class="row ml-3">
                                <div class="bi-col-2">
                                    <label for="" class="">Spouse Full Name</label>
                                    <input type="text" value="{{ $patients->U_SPOUSENAME }}" id="" name="" class="d-block">
                                </div>
                                <div class="bi-col-1">
                                    <label for="" class="">Spouse Address</label>
                                    <div class="input-group">
                                        <input type="text" value="" name="" id="" placeholder="Address" aria-label="Text input with dropdown button">
                                        
                                        <button class="btn dropdown-toggle border-start" type="button" data-bs-toggle="dropdown" aria-expanded="false">Barangay</button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Action before</a></li>
                                            <li><a class="dropdown-item" href="#">Another action before</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                            <li><a class="dropdown-item" href="#">Separated link</a></li>
                                        </ul>
                                        <button class="btn dropdown-toggle border-start" type="button" data-bs-toggle="dropdown" aria-expanded="false">Town/City</button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Action before</a></li>
                                            <li><a class="dropdown-item" href="#">Another action before</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                            <li><a class="dropdown-item" href="#">Separated link</a></li>
                                        </ul>
                                        <button class="btn dropdown-toggle border-start" type="button" data-bs-toggle="dropdown" aria-expanded="false">State/Province</button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Action before</a></li>
                                            <li><a class="dropdown-item" href="#">Another action before</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                            <li><a class="dropdown-item" href="#">Separated link</a></li>
                                        </ul>
                                    </div>
                                    <span class="f-sm-primary">Same as Patient</span>
                                </div>
                                <div class="bi-col-2">
                                    <label for="" class="">Spouse Contact No.</label>
                                    <input type="number" value="{{ $patients->U_SPOUSETELNO }}" id="" name="" class="d-block">
                                </div>
                            </div>
                            <div class="row mt-2 ml-3">
                                <div class="col-sm-3 h6 fw-bold">
                                    <label for=""> Emergency Contact Information</label>
                                </div>
                                <div class="col text-end">
                                    <label for="" class="">Relationship </label>
                                </div>
                                <div class="bi-col-2">
                                    <input type="text" name="" id="" class="d-block">
                                </div>
                            </div>
                            <div class="row ml-3">
                                <div class="bi-col-2">
                                    <label for="" class="">Full Name</label>
                                    <input type="text" value="{{ $patients->U_RESPONSIBLENAME }}" id="" name="" class="d-block">
                                </div>
                                <div class="bi-col-1">
                                    <label for="" class="">Address</label>
                                    <div class="input-group">
                                        <input type="text" value="" name="" id="" placeholder="Address" aria-label="Text input with dropdown button">
                                        
                                        <button class="btn dropdown-toggle border-start" type="button" data-bs-toggle="dropdown" aria-expanded="false">Barangay</button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Action before</a></li>
                                            <li><a class="dropdown-item" href="#">Another action before</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                            <li><a class="dropdown-item" href="#">Separated link</a></li>
                                        </ul>
                                        <button class="btn dropdown-toggle border-start" type="button" data-bs-toggle="dropdown" aria-expanded="false">Town/City</button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Action before</a></li>
                                            <li><a class="dropdown-item" href="#">Another action before</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                            <li><a class="dropdown-item" href="#">Separated link</a></li>
                                        </ul>
                                        <button class="btn dropdown-toggle border-start" type="button" data-bs-toggle="dropdown" aria-expanded="false">State/Province</button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Action before</a></li>
                                            <li><a class="dropdown-item" href="#">Another action before</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                            <li><a class="dropdown-item" href="#">Separated link</a></li>
                                        </ul>
                                    </div>
                                    <span class="f-sm-primary">Same as Patient</span>
                                </div>
                                <div class="bi-col-2">
                                    <label for="" class="">Contact No.</label>
                                    <input type="number" value="{{ $patients->U_RESPONSIBLETELNO }}" id="" name="" class="d-block">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-end">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                {{-- For medical information --}}
                <div class="tab-pane fade" id="nav-medical-info" role="tabpanel"
                    aria-labelledby="nav-medical-info-tab" tabindex="0">
                    <form action="" method="">
                        <div class="mi-container px-3 py-2">
                            <div class="row">
                                <h1>Medical</h1>
                            </div>
                        </div>
                    </form>
                </div>

                {{-- For case information --}}
                <div class="tab-pane fade" id="nav-case-info" role="tabpanel" aria-labelledby="nav-case-info-tab"
                    tabindex="0">
                    <form action="" method="">
                        <div class="ci-container px-3 py-2">
                            <div class="row">
                                <h1>Case</h1>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
