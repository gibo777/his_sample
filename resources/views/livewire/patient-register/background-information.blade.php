
    
    <div class="bi-container px-3 py-2">
        <h5>Dependents Contact Information</h5>
        <div class="row bi-row border-radius-25 p-2 shadow-sm">
            <div class="col" id="backgroundDiv">
                <div class="row w-100">
                    <div class="col loading-div-bg" wire:loading>
                        <span style="font-size:1.5rem;">Loading...</span>
                        <br/>
                        <div class="spinner-border text-primary" style="width: 4rem; height: 4rem;" role="status">
                            <span class="visually-hidden"></span>
                        </div>
                    </div>
                </div>
            
                <div wire:loading.remove >
                @if (count($bgInfos)!=0)
                @php $i =0 @endphp
                    @foreach ($bgInfos as $bgInfo)
                    <div class="backgroundGroup">
                    <div class="row">
                        <div class="col text-center">
                            <input type="checkbox" name="U_BG_EMERGENCY" id="U_BG_EMERGENCY-0" class="d-inline" value="1">&nbsp;
                            <label for="U_BG_EMERGENCY" > Set as <span class="text-danger">Emergency</span> Contact</label>
                        </div>
                        <div class="col"hidden>
                            <input type="text" name="id_patient" id="bg-info-id-{{$i}}" value="{{$bgInfo->id}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="bi-col-1">
                            <label for="" class="d-block">Last Name <span class="text-danger">*</span></label>
                            <input type="text" name="U_BG_LASTNAME" id="U_BG_LASTNAME-{{$i}}" class="border-radius-25" value="{{$bgInfo->U_BG_LASTNAME?$bgInfo->U_BG_LASTNAME:''}}">
                        </div>
                        <div class="bi-col-1">
                            <label for="" class="d-block">First Name <span class="text-danger">*</span></label>
                            <input type="text" name="U_BG_FIRSTNAME" id="U_BG_FIRSTNAME-{{$i}}" class="border-radius-25"value="{{$bgInfo->U_BG_FIRSTNAME?$bgInfo->U_BG_FIRSTNAME:''}}">
                        </div>
                        <div class="bi-col-1">
                            <label for="" class="d-block">Middle Name <span class="text-danger">*</span></label>
                            <input type="text" name="U_BG_MIDDLENAME" id="U_BG_MIDDLENAME-{{$i}}" class="border-radius-25"value="{{$bgInfo->U_BG_MIDDLENAME?$bgInfo->U_BG_MIDDLENAME:''}}">
                        </div>
                        <div class="bi-col-2">
                            <label for="" class="d-block">Ext.</label>
                            <input type="text" name="U_BG_EXTNAME" id="U_BG_EXTNAME-{{$i}}" class="border-radius-25" value="{{$bgInfo->U_BG_EXTNAME?$bgInfo->U_BG_EXTNAME:''}}">
                        </div>
                        <div class="bi-col-1">
                            <label for="" class="d-block">Relationship <span class="text-danger">*</span></label>
                            <select name="U_BG_RELATIONSHIP" id="U_BG_RELATIONSHIP-{{$i}}" class="border-radius-25" >
                                <option value="{{$bgInfo->U_BG_RELATIONSHIP?$bgInfo->U_BG_RELATIONSHIP:''}}">{{$bgInfo->U_BG_RELATIONSHIP?$bgInfo->U_BG_RELATIONSHIP:'--Select--'}}</option>
                                @foreach ($relationships as $relationship)
                                    <option value="{{$relationship->relationship}}">{{$relationship->relationship}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="bi-col-1">
                            <label for="" class="d-block">Contact No. <span class="text-danger">*</span></label>
                            <input type="text" name="U_BG_CONTACTNO" id="U_BG_CONTACTNO-{{$i}}" class="border-radius-25" value="{{$bgInfo->U_BG_CONTACTNO?$bgInfo->U_BG_CONTACTNO:''}}">
                        </div>
                        <div class="bi-col-1">
                            <label for="" class="d-block">Second Contact No.</label>
                            <input type="text" name="U_BG_CONTACTNO2ND" id="U_BG_CONTACTNO2ND-{{$i}}" class="border-radius-25" value="{{$bgInfo->U_BG_CONTACTNO2ND?$bgInfo->U_BG_CONTACTNO2ND:''}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="bi-col-1">
                            <label for="" class="d-block">Country <span class="text-danger">*</span></label>
                            <select name="U_BG_COUNTRY" id="country-background-reg-{{$i}}" class="country-background-reg- border-radius-25">
                                <option value="{{$bgInfo->U_BG_COUNTRY?$bgInfo->U_BG_COUNTRY:''}}">{{$bgInfo->U_BG_COUNTRY?$bgInfo->U_BG_COUNTRY:''}}</option>
                                @foreach ($countriesBg as $key => $data)
                                    @if ($bgInfo->U_BG_COUNTRY !=$data->country)
                                        <option value="{{ $data->country }}">{{ $data->country }}</option>
                                        @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="bi-col-1">
                            <label for="" class="d-block">Province <span class="text-danger">*</span></label>
                            <select name="U_BG_PROVINCE" id="province-background-reg-{{$i}}" class="border-radius-25">
                                <option value="{{$bgInfo->U_BG_PROVINCE?$bgInfo->U_BG_PROVINCE:''}}">{{$bgInfo->U_BG_PROVINCE?$bgInfo->U_BG_PROVINCE:''}}</option>
                            </select>
                        </div>
                        <div class="bi-col-1">
                            <label for="" class="d-block">Municipality <span class="text-danger">*</span></label>
                            <select name="U_BG_CITY" id="city-background-reg-{{$i}}" class="border-radius-25">
                                <option value="{{$bgInfo->U_BG_CITY?$bgInfo->U_BG_CITY:''}}">{{$bgInfo->U_BG_CITY?$bgInfo->U_BG_CITY:''}}</option>
                            </select>
                        </div>
                        <div class="bi-col-1">
                            <label for="" class="d-block">Barangay <span class="text-danger">*</span></label>
                            <select name="U_BG_BRGY" id="brgy-background-reg-{{$i}}" class="border-radius-25">
                                <option value="{{$bgInfo->U_BG_BRGY?$bgInfo->U_BG_BRGY:''}}">{{$bgInfo->U_BG_BRGY?$bgInfo->U_BG_BRGY:''}}</option>
                            </select>
                        </div>
                        <div class="bi-col-3">
                            <label for="" class="d-block">House No. & Street <span class="text-danger">*</span></label>
                            <input type="text" name="U_BG_STREET" id="U_BG_STREET-{{$i}}" class="border-radius-25"  value="{{$bgInfo->U_BG_STREET?$bgInfo->U_BG_STREET:''}}">
                        </div>
                        <div class="bi-col-1">
                            <label for="" class="d-block">Zip Code <span class="text-danger">*</span></label>
                            <input type="text" name="U_BG_ZIP" id="zip-background-reg-{{$i}}" class="border-radius-25"  value="{{$bgInfo->U_BG_ZIP?$bgInfo->U_BG_ZIP:''}}" readonly>
                        </div>
                    </div>
                </div>
                @php
                    $i++
                @endphp
                @endforeach
                @else
                    <div class="backgroundGroup">
                    <div class="row">
                        <div class="col text-center">
                            <input type="checkbox" name="U_BG_EMERGENCY" id="U_BG_EMERGENCY-0" class="d-inline" value="1">&nbsp;
                            <label for="U_BG_EMERGENCY" > Set as <span class="text-danger">Emergency</span> Contact</label>
                        </div>
                        <div class="col"hidden>
                            <input type="text" name="id_patient" id="bg-info-id-0">
                        </div>
                    </div>
                    <div class="row">
                        <div class="bi-col-1">
                            <label for="" class="d-block">Last Name <span class="text-danger">*</span></label>
                            <input type="text" name="U_BG_LASTNAME" id="U_BG_LASTNAME-0" class="border-radius-25" value="">
                        </div>
                        <div class="bi-col-1">
                            <label for="" class="d-block">First Name <span class="text-danger">*</span></label>
                            <input type="text" name="U_BG_FIRSTNAME" id="U_BG_FIRSTNAME-0" class="border-radius-25">
                        </div>
                        <div class="bi-col-1">
                            <label for="" class="d-block">Middle Name <span class="text-danger">*</span></label>
                            <input type="text" name="U_BG_MIDDLENAME" id="U_BG_MIDDLENAME-0" class="border-radius-25">
                        </div>
                        <div class="bi-col-2">
                            <label for="" class="d-block">Ext.</label>
                            <input type="text" name="U_BG_EXTNAME" id="U_BG_EXTNAME-0" class="border-radius-25">
                        </div>
                        <div class="bi-col-1">
                            <label for="" class="d-block">Relationship <span class="text-danger">*</span></label>
                            <select name="U_BG_RELATIONSHIP" id="U_BG_RELATIONSHIP-0" class="border-radius-25" >
                                <option value="">--Select--</option>
                                @foreach ($relationships as $relationship)
                                    <option value="{{$relationship->relationship}}">{{$relationship->relationship}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="bi-col-1">
                            <label for="" class="d-block">Contact No. <span class="text-danger">*</span></label>
                            <input type="text" name="U_BG_CONTACTNO" id="U_BG_CONTACTNO-0" class="border-radius-25">
                        </div>
                        <div class="bi-col-1">
                            <label for="" class="d-block">Second Contact No.</label>
                            <input type="text" name="U_BG_CONTACTNO2ND" id="U_BG_CONTACTNO2ND-0" class="border-radius-25">
                        </div>
                    </div>
                    <div class="row">
                        <div class="bi-col-1">
                            <label for="" class="d-block">Country <span class="text-danger">*</span></label>
                            <select name="U_BG_COUNTRY" id="country-background-reg-0" class="country-background-reg- border-radius-25">
                                <option value=""></option>
                                @foreach ($countriesBg as $key => $data)
                                    <option value="{{ $data->country }}">{{ $data->country }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="bi-col-1">
                            <label for="" class="d-block">Province <span class="text-danger">*</span></label>
                            <select name="U_BG_PROVINCE" id="province-background-reg-0" class="border-radius-25">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="bi-col-1">
                            <label for="" class="d-block">Municipality <span class="text-danger">*</span></label>
                            <select name="U_BG_CITY" id="city-background-reg-0" class="border-radius-25">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="bi-col-1">
                            <label for="" class="d-block">Barangay <span class="text-danger">*</span></label>
                            <select name="U_BG_BRGY" id="brgy-background-reg-0" class="border-radius-25">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="bi-col-3">
                            <label for="" class="d-block">House No. & Street <span class="text-danger">*</span></label>
                            <input type="text" name="U_BG_STREET" id="U_BG_STREET-0" class="border-radius-25">
                        </div>
                        <div class="bi-col-1">
                            <label for="" class="d-block">Zip Code <span class="text-danger">*</span></label>
                            <input type="text" name="U_BG_ZIP" id="zip-background-reg-0" class="border-radius-25" readonly>
                        </div>
                    </div>
                </div>
                @endif
                </div>
                

                <div class="add-bg-group">
                </div>
                
            </div>
        </div>
        <div class="row add-more-btn text-center">
            <div class="col align-self-center">
                <button type="button" class="btn addMoreBackgroundInfo shadow-sm" disabled id="addMoreBackgroundInfo">Add More +</button>
            </div>
        </div>
        <div class="row pt-2 ">
            <div class="col text-end">
                <a role="button" id="addpatient-bg-info"class="btn btn-primary border-radius-25 ">Save</a>
            </div>
        </div>
    </div>