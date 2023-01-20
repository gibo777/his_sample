<?php
    namespace App\Traits\utilities;
    use Illuminate\Support\Facades\DB;
    use App\Models\u_hispatients;

    trait Helper{
                /**
             * undocumented function summary
             *
             * Undocumented function long description
             *
             * @param String $table table name
             * @param String $selecteItem column name
             * @return Object Code
             * @author Kier L. Aguilar - 12/14/2022
             **/

            public function getLastCode($table,$selectItem){
                $getLastCode_temp = DB::table($table)->select($selectItem)
                ->orderBy($selectItem, 'desc')->first();
            
                return $getLastCode_temp;
            }

            /**
         * undocumented function summary
         *
         * Undocumented function long description
         *
         * @param String $lastName last name
         * @param String $firstName first name
         * @param String $middleName middle name
         * @param String $extName first name
         * @return String full name
         * @author Kier L. Aguilar - 12/14/2022
         **/
        public function getFullName($lastName,$firstName,$middleName, $extName){

            // dd($lastName,$firstName,$middleName, $extName);
            if($lastName!=null){
                $lastName=$lastName;
            }else{
                $lastName=null;
            }
            if($firstName!=null){
                $firstName=$firstName;
            }else{
                $firstName=null;
            }
            if($middleName!=null){
                $middleName=$middleName;
            }else{
                $middleName=null;
            }
            if($extName!=null){
                $extName=$extName;
            }else{
                $extName=null;
            }

            if(($firstName==null)&&($lastName==null)){
                return null;
            }else{
                $fullname = strtoupper(join(' ',[$lastName.',',$firstName,$middleName,$extName ]));
            }
            
            

            // if($fullname == ",   ")
            return $fullname;
            
        }

        /**
         * undocumented function summary
         *
         * Undocumented function long description
         *
         * @param Type $dbName table name
         * @param Type $dbColumnNameSelect column name to be selected
         * @param Type $dbColumnNameGet column to be used in condition
         * @param Type $dbRequest value to be used in condition
         * @return Object usedCount
         * @author Kier L. Aguilar 12/22/2022
         **/
        public function getNumberofUsed($dbName,$dbColumnNameSelect, $dbColumnNameGet,$dbRequest){

            $usedCount=DB::table($dbName)->select($dbColumnNameSelect)->where($dbColumnNameGet,'=',$dbRequest)->first();
            return $usedCount;
        }


            /**
     * 
     * 
     *
     * Undocumented function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function updateNumberOfUsed($tableName, $columnNameGet,$columnNameCondition,$value)
    {
        if($value!=""){
            $getCountCountry=$this->getNumberofUsed($tableName,$columnNameGet,$columnNameCondition,$value);
            
            $getCountCountry=$getCountCountry->used+1;

            DB::table($tableName)->where($columnNameCondition,'=',$value)->update([
            $columnNameGet=>$getCountCountry
            ]  
        );
        }   
        return; 
    }
    }
    
