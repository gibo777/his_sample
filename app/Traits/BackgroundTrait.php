<?php
    namespace App\Traits;
    use Illuminate\Support\Facades\DB;
    use App\Models\u_hispatients;

    trait BackgroundTrait{
        public $patientId ='';
        public $patientCode = '';
        public $fatherName = '';
        public $fatherCountry = '';
        public $fatherProvince = '';
        public $fatherMunicipality='';
        public $fatherBarangay = '';
        public $fatherStreet = '';
        public $fatherZipCode = '';
        public $fatherContactNumber = '';

        public $motherName = '';
        public $motherCountry = '';
        public $motherProvince = '';
        public $motherMunicipality='';
        public $motherBarangay = '';
        public $motherStreet = '';
        public $motherZipCode = '';
        public $motherContactNumber = '';

        public $spouseName = '';
        public $spouseCountry = '';
        public $spouseProvince = '';
        public $spouseMunicipality='';
        public $spouseBarangay = '';
        public $spouseStreet = '';
        public $spouseZipCode = '';
        public $spouseContactNumber = '';

        public $contactName = '';
        public $contactCountry = '';
        public $contactProvince = '';
        public $contactMunicipality='';
        public $contactBarangay = '';
        public $contactStreet = '';
        public $contactZipCode = '';
        public $contactContactNumber = '';
        public $contactRelationship = '';

        public $dependent  = '';
        public $scope= '';
        public $country = '';
        public $province ='';
        public $municipality='';
        public $barangay = '';
        public $zipcode = '';

        public $fatherDetails = '';
        public $motherDetails = '';
        public $spouseDetails= '';



        /**
         * Set Country
         *
         * 
         *
         * @param String $country dependent's country input'
         * @param String $dependent dependent type
         *  
         * @return void
         * @author Christopher P. Napoles 12/14/2022
         *
         **/
        public function setCountry($country,$dependent){
            $this->{$dependent.'Country'} = $country;
            $this->{$dependent.'Province'} = '';
            $this->{$dependent.'Municipality'} = '';
            $this->{$dependent.'Barangay'} = '';
        }

        /**
         * Set Province
         *
         * 
         *
         * @param String $province dependent's province input'
         * @param String $dependent dependent' type
         *  
         * @return void
         * @author Christopher P. Napoles 12/14/2022
         *
         **/
        public function setProvince($province,$dependent){
            $this->{$dependent.'Province'} = $province;
            $this->{$dependent.'Municipality'} = '';
            $this->{$dependent.'Barangay'} = '';
        }

        /**
         * Set Municipality
         *
         * 
         *
         * @param String $municipality dependent's municipality input'
         * @param String $dependent dependent' type
         *  
         * @return void
         * @author Christopher P. Napoles 12/14/2022
         *
         **/
        public function setMunicipality($municipality,$dependent){
            $this->{$dependent.'Municipality'} = $municipality;
            $this->{$dependent.'Barangay'} = '';
        }

        /**
         * Set Barangay
         *
         * 
         *
         * @param String $barangay dependent's barangay input'
         * @param String $dependent dependent' type
         *  
         * @return void
         * @author Christopher P. Napoles 12/14/2022
         *
         **/
        public function setBarangay($barangay,$dependent){
            $this->{$dependent.'Barangay'} = $barangay;
        }

        public function autoEmergencyContactInfo($value,$dependent){
           $this->fatherDetails = '';
           $this->motherDetails = '';
           $this->spouseDetails= '';
            if($value){
                $this->contactRelationship = $dependent;
                $this->{$dependent.'Details'} = $value;
                $this->contactName = $this->{$dependent.'Name'};
                $this->contactCountry = $this->{$dependent.'Country'};
                $this->contactProvince = $this->{$dependent.'Province'};
                $this->contactMunicipality = $this->{$dependent.'Municipality'};
                $this->contactBarangay = $this->{$dependent.'Barangay'};
                $this->contactZipCode = $this->{$dependent.'ZipCode'};
                $this->contactStreet = $this->{$dependent.'Street'};
                $this->contactContactNumber = $this->{$dependent.'ContactNumber'};

            }else{
                $this->contactRelationship = '';
                $this->{$dependent.'Details'} = '';
                $this->contactName = '';
                $this->contactCountry = '';
                $this->contactProvince = '';
                $this->contactMunicipality = '';
                $this->contactBarangay = '';
                $this->contactZipCode = '';
                $this->contactStreet = '';
                $this->contactContactNumber = '';
            }
           
        }

        /**
         * Complete Address
         *
         * 
         *
         * @param String $country dependent's country
         * @param String $province dependent's province
         * @param String $municipality dependent's municipality
         * @param String $barangay dependent's barangay
         * @param String $street dependent's street
         *  
         * @return String Concated address
         * @author Christopher P. Napoles 12/14/2022
         *
         **/

        public function completeAddress($country,$province,$municipality,$barangay,$street) {

            return $country.' | '.$province.' | '.$municipality.' | '.$barangay.' | '.$street;
        }

        /**
         * Query for provinces
         *
         * 
         *
         * @param String $country dependent's country
         *  
         * @return stdClass array of provinces
         * @author Christopher P. Napoles 12/14/2022
         *
         **/

        public function provincesQuery($country){
            return DB::table('provinces')
                        ->select('province')
                        ->distinct()
                        ->where('country_name',$country)
                        ->get();
        }

        /**
         * Query for municipalities
         *
         * 
         *
         * @param String $country dependent's country
         * @param String $province dependent's province
         *  
         * @return stdClass array of municipalities
         * @author Christopher P. Napoles 12/14/2022
         *
         **/
        public function municipalitiesQuery($country,$province){
            return DB::table('provinces')
            ->select('municipality')
            ->distinct()
            ->where(['country_name'=>$country,'province'=>$province])
            ->get();
        }

        /**
         * Query for barangays
         *
         * 
         *
         * @param String $country dependent's country
         *  @param String $province dependent's province
         *  @param String $municipality dependent's municipality
         *  
         * @return stdClass array of barangays
         * @author Christopher P. Napoles 12/14/2022
         *
         **/

        public function barangayQuery($country,$province,$municipality){
            return DB::table('provinces')
            ->select('barangay')
            ->distinct()
            ->where(['country_name'=>$country,'province'=>$province,'municipality'=>$municipality])
            ->get();
        }
        

        /**
         * Query for zipcodes
         *
         * 
         *
         * @param String $country dependent's country
         *  @param String $province dependent's province
         *  @param String $municipality dependent's municipality
         *  @param String $barnagay dependent's barangay
         * @return stdClass zip_code
         * @author Christopher P. Napoles 12/14/2022
         *
         **/
        public function zipcodeQuery($country,$province,$municipality,$barangay){
            return DB::table('provinces')
            ->select('zip_code')
            ->distinct()
            ->where(['country_name'=>$country,'province'=>$province,'municipality'=>$municipality,'barangay'=>$barangay])
            ->first();
        }
        public function mount($id){
        $this->patientCode = $id;
        $this->initialize();
        }

        /**
         * Initialize Fields
         *  
         * @return void
         * @author Christopher P. Napoles 12/14/2022
         *
         **/

        public function initialize(){
            $patients = DB::table('u_hispatients')
            ->where('CODE', '=', $this->patientCode)
            ->first();
            $this->patientId = $patients->id;
            $this->fatherName = $patients->U_FATHERNAME;
            $this->motherName = $patients->U_MOTHERNAME;
            $this->spouseName = $patients->U_SPOUSENAME;
            $this->contactName = $patients->U_CONTACTNAME;
            
            $this->fatherCountry=$patients->U_FATHERCOUNTRY;
            $this->motherCountry =$patients->U_MOTHERCOUNTRY;
            $this->spouseCountry = $patients->U_SPOUSECOUNTRY;
            $this->contactCountry = $patients->U_CONTACTCOUNTRY;

            $this->fatherMunicipality = $patients->U_FATHERCITY;
            $this->motherMunicipality = $patients->U_MOTHERCITY;
            $this->spouseMunicipality = $patients->U_SPOUSECITY;
            $this->contactMunicipality = $patients->U_CONTACTCITY;

            $this->fatherProvince = $patients->U_FATHERPROVINCE;
            $this->motherProvince = $patients->U_MOTHERPROVINCE;
            $this->spouseProvince = $patients->U_SPOUSEPROVINCE;
            $this->contactProvince = $patients->U_CONTACTPROVINCE;

            $this->fatherBarangay = $patients->U_FATHERBARANGAY;
            $this->motherBarangay = $patients->U_MOTHERBARANGAY;
            $this->spouseBarangay = $patients->U_SPOUSEBARANGAY;
            $this->contactBarangay = $patients->U_CONTACTBARANGAY;

            $this->fatherZipCode = $patients->U_FATHERZIP;
            $this->motherZipCode = $patients->U_MOTHERZIP;
            $this->spouseZipCode = $patients->U_SPOUSEZIP;
            $this->contactZipCode = $patients->U_CONTACTZIP;

            $this->fatherStreet = $patients->U_FATHERSTREET;
            $this->motherStreet = $patients->U_MOTHERSTREET;
            $this->spouseStreet = $patients->U_SPOUSESTREET;
            $this->contactStreet = $patients->U_CONTACTSTREET;
            
            $this->fatherContactNumber = $patients->U_FATHERTELNO;
            $this->motherContactNumber = $patients->U_MOTHERTELNO;
            $this->spouseContactNumber = $patients->U_SPOUSETELNO;
            $this->contactContactNumber = $patients->U_CONTACTTELNO;

            $this->contactRelationship = $patients->U_CONTACTRELATIONSHIP;
        }

        public function updateBackgroundInformation () {
            
        
        $fatherCompleteAddress = $this->completeAddress($this->fatherCountry,$this->fatherProvince,$this->fatherMunicipality,$this->fatherBarangay,$this->fatherStreet);
        $motherCompleteAddress = $this->completeAddress($this->motherCountry,$this->motherProvince,$this->motherMunicipality,$this->motherBarangay,$this->motherStreet); 
        $spouseCompleteAddress = $this->completeAddress($this->spouseCountry,$this->spouseProvince,$this->spouseMunicipality,$this->spouseBarangay,$this->spouseStreet); 
        $contactCompleteAddress = $this->completeAddress($this->contactCountry,$this->contactProvince,$this->contactMunicipality,$this->contactBarangay,$this->contactStreet); 
        
        //father Information
        $fatherInformation= [
            'U_FATHERCOUNTRY' =>  $this->fatherCountry,
            'U_FATHERNAME' => $this->fatherName,
            'U_FATHERPROVINCE' => $this->fatherProvince,
            'U_FATHERCITY' =>$this->fatherMunicipality,
            'U_FATHERBARANGAY' => $this->fatherBarangay,
            'U_FATHERZIP' => $this->fatherZipCode,
            'U_FATHERSTREET' => $this->fatherStreet,
            'U_FATHERTELNO' => $this->fatherContactNumber,
            'U_FATHERADDRESS' => $fatherCompleteAddress,
        ];

        //moter Information
        $motherInformation = [
                'U_MOTHERCOUNTRY' =>  $this->motherCountry ,
                'U_MOTHERNAME' => $this->motherName ,
                'U_MOTHERPROVINCE' => $this->motherProvince,
                'U_MOTHERCITY' =>$this->motherMunicipality,
                'U_MOTHERBARANGAY' => $this->motherBarangay,
                'U_MOTHERZIP' => $this->motherZipCode,
                'U_MOTHERSTREET' => $this->motherStreet,
                'U_MOTHERTELNO' => $this->motherContactNumber,
                'U_MOTHERADDRESS' => $motherCompleteAddress,
        ];

        //spouse information
        $spouseInformation = [
                'U_SPOUSECOUNTRY' =>  $this->spouseCountry ,
                'U_SPOUSENAME' => $this->spouseName,
                'U_SPOUSEPROVINCE' => $this->spouseProvince,
                'U_SPOUSECITY' => $this->spouseMunicipality,
                'U_SPOUSEBARANGAY' => $this->spouseBarangay,
                'U_SPOUSEZIP' => $this->spouseZipCode,
                'U_SPOUSESTREET' => $this->spouseStreet,
                'U_SPOUSETELNO' => $this->spouseContactNumber,
                'U_SPOUSEADDRESS' => $spouseCompleteAddress,
        ];

        //Emergency Contact
        $contactInformation = [
            'U_CONTACTCOUNTRY' =>  $this->contactCountry ,
            'U_CONTACTNAME' => $this->contactName,
            'U_CONTACTPROVINCE' => $this->contactProvince,
            'U_CONTACTCITY' => $this->contactMunicipality,
            'U_CONTACTBARANGAY' => $this->contactBarangay,
            'U_CONTACTZIP' => $this->contactZipCode,
            'U_CONTACTSTREET' => $this->contactStreet,
            'U_CONTACTTELNO' => $this->contactContactNumber,
            'U_CONTACTADDRESS' => $contactCompleteAddress,
            'U_CONTACTRELATIONSHIP' =>$this->contactRelationship,
        ];
        $updateInfo = $fatherInformation+$motherInformation+$spouseInformation+$contactInformation;
        $updated = u_hispatients::find($this->patientId)->update($updateInfo);
        }
        
        public function render()
        {
            $patients = DB::table('u_hispatients')
            ->where('CODE', '=', $this->patientId)
            ->first();

            $inpatient = DB::table('u_hisips')
            ->where('U_PATIENTID', '=', $patients->CODE)
            ->first();
    
            $countries = DB::table('countries')
            ->select('country')->distinct()->get();
            
            $this->fatherCountry? 
            $fatherProvinces = $this->provincesQuery($this->fatherCountry)
            : $fatherProvinces = [];

            $this->motherCountry? 
            $motherProvinces = $this->provincesQuery($this->motherCountry)
            : $motherProvinces = [];
            
            $this->spouseCountry? 
            $spouseProvinces = $this->provincesQuery($this->spouseCountry)
            : $spouseProvinces = [];

            $this->contactCountry? 
            $contactProvinces = $this->provincesQuery($this->contactCountry)
            : $contactProvinces = [];

            ($this->fatherCountry && $this->fatherProvince) ?
                $fatherMunicipalities = $this->municipalitiesQuery($this->fatherCountry,$this->fatherProvince)
                : $fatherMunicipalities = [];

            ($this->motherCountry && $this->motherProvince) ?
            $motherMunicipalities = $this->municipalitiesQuery($this->motherCountry,$this->motherProvince)
            : $motherMunicipalities = [];

            ($this->spouseCountry && $this->spouseProvince) ?
            $spouseMunicipalities = $this->municipalitiesQuery($this->spouseCountry,$this->spouseProvince)
            : $spouseMunicipalities = [];

            ($this->contactCountry && $this->contactProvince) ?
            $contactMunicipalities = $this->municipalitiesQuery($this->contactCountry,$this->contactProvince)
            : $contactMunicipalities = [];

            ($this->fatherCountry && $this->fatherProvince && $this->fatherMunicipality) ? 
            $fatherBarangays = $this->barangayQuery($this->fatherCountry , $this->fatherProvince , $this->fatherMunicipality)
            : $fatherBarangays=[];

            ($this->motherCountry && $this->motherProvince && $this->motherMunicipality) ? 
            $motherBarangays = $this->barangayQuery($this->motherCountry , $this->motherProvince , $this->motherMunicipality)
            : $motherBarangays=[];

            ($this->spouseCountry && $this->spouseProvince && $this->spouseMunicipality) ? 
            $spouseBarangays = $this->barangayQuery($this->spouseCountry , $this->spouseProvince , $this->spouseMunicipality)
            : $spouseBarangays=[];

            ($this->contactCountry && $this->contactProvince && $this->contactMunicipality) ? 
            $contactBarangays = $this->barangayQuery($this->contactCountry , $this->contactProvince , $this->contactMunicipality)
            : $contactBarangays=[];
            
            ($this->fatherCountry && $this->fatherProvince && $this->fatherMunicipality && $this->fatherBarangay) ?
                    $fatherZipcode = $this->zipcodeQuery($this->fatherCountry , $this->fatherProvince , $this->fatherMunicipality , $this->fatherBarangay)
                :   $fatherZipcode = '';
            $this->fatherZipCode = $fatherZipcode?$fatherZipcode->zip_code : '';

            ($this->motherCountry && $this->motherProvince && $this->motherMunicipality && $this->motherBarangay) ?
                    $motherZipcode = $this->zipcodeQuery($this->motherCountry , $this->motherProvince , $this->motherMunicipality , $this->motherBarangay)
                :   $motherZipcode = '';
                $this->motherZipCode = $motherZipcode?$motherZipcode->zip_code : '';

            ($this->spouseCountry && $this->spouseProvince && $this->spouseMunicipality && $this->spouseBarangay) ?
                    $spouseZipcode = $this->zipcodeQuery($this->spouseCountry , $this->spouseProvince , $this->spouseMunicipality , $this->spouseBarangay)
                :   $spouseZipcode = '';
                $this->spouseZipCode = $spouseZipcode?$spouseZipcode->zip_code : '';

            ($this->contactCountry && $this->contactProvince && $this->contactMunicipality && $this->contactBarangay) ?
                    $contactZipcode = $this->zipcodeQuery($this->contactCountry , $this->contactProvince , $this->contactMunicipality , $this->contactBarangay)
                :   $contactZipcode = '';
                $this->contactZipCode = $contactZipcode?$contactZipcode->zip_code : '';

            // dd($religions);
            // dd($nationalities);
            // dd($genders);
            // dd( $countries);
            return view('livewire.inpatient.inpatient-background-information', [
                'patients' => $patients,
                'countries' => $countries,
                'motherProvinces' => $motherProvinces,
                'fatherProvinces' => $fatherProvinces,
                'spouseProvinces' => $spouseProvinces,
                'contactProvinces' => $contactProvinces,
                'motherMunicipalities' => $motherMunicipalities,
                'fatherMunicipalities' => $fatherMunicipalities,
                'spouseMunicipalities' => $spouseMunicipalities,
                'contactMunicipalities' => $contactMunicipalities,
                'motherBarangays' => $motherBarangays,
                'fatherBarangays' => $fatherBarangays,
                'spouseBarangays' => $spouseBarangays,
                'contactBarangays' => $contactBarangays,
            ]);
        }
    }
    
