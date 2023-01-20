<?php


    namespace App\Traits\utilities;
    use Illuminate\Support\Facades\DB;
    use App\Models\u_hisops;
    use App\Models\u_hisips;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Validator;
    use Carbon\Carbon;

    trait newCaseHelper{

        public function newAndUpdateCase($request){
            $created = '';
            $updated ='';
            $message = '';
            $table =  $request->type == 'Ip' ?'u_hisips':'u_hisops';
            $body = $request->data;
            $assignedPersonnel = '';
            $table == 'u_hisops' ?$assignedPersonnel = 'U_ASSISTEDBY' : $assignedPersonnel = 'U_ADMITTEDBY';
            // dd($body);
            $rules = [
                'U_ARRIVEDBY' => 'required',
                'DATECREATED' => 'required | before:now | date',
                'NE_U_CHIEFCOMPLAINT' =>'required',
                $assignedPersonnel => 'required',
        
            ];
            $validator = Validator::make($body, $rules);

            if($validator->fails()){
                $errors = $validator->getMessageBag()->toArray();
                $keys = array_keys($errors);
                return response ([
                    'success' => false,
                    'errors' => $keys,
                ]);
            }

            $isActiveExisting = DB::table($table)->select('id')->where(['DOCNO'=>$request->data['DOCNO'],'DOCSTATUS'=>'Active'])->first() ?? '';
            if($request->type == 'Ip'){  
                    if($isActiveExisting){
                        $body['LASTUPDATEDBY'] = Auth::user()->user_name;
                        $updated = u_hisips::find($isActiveExisting->id)->update($body);
                        $updated && $message = 'updated';
                    }else{
                        $body['DOCSTATUS'] = 'Active';
                        $body['CREATEDBY'] = Auth::user()->user_name;
                        $created = u_hisips::create($body);
                        $created && $message = 'created';
                    }
            }else{
                    if($isActiveExisting){
                        $body['LASTUPDATEDBY'] = Auth::user()->user_name;
                        $updated = u_hisops::find($isActiveExisting->id)->update($body);
                        $updated && $message = 'updated';
                    }else{
                        $body['DOCSTATUS'] = 'Active';
                        $body['CREATEDBY'] = Auth::user()->user_name;
                        $created = u_hisops::create($body);
                        $created && $message = 'created';
                    }
            }
            return response(['created'=>$created,
                'updated' => $updated, 
                'message' => $message,
                'success' => true,
            ]);
        }
    }
