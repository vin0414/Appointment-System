<?php

namespace App\Http\Controllers;

use \App\Models\User;
use \App\Models\Applicant;
use \App\Models\Logs;
use \App\Models\Schools;
use \App\Models\Assignment;
use \App\Models\Salary;
use \App\Models\Other;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Number;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Files extends Controller
{
    public function saveApplicant(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'first_name'=>'required|string|regex:/^(?!.*<script>).*$/i',
            'middle_name'=>'required|string|regex:/^(?!.*<script>).*$/i',
            'sur_name'=>'required|string|regex:/^(?!.*<script>).*$/i',
            'position'=>'required|string|regex:/^(?!.*<script>).*$/i',
            'gender'=>'required|string',
            'government_id'=>'required|string|regex:/^(?!.*<script>).*$/i',
            'id_number'=>'required|string|unique:applicants,id_number|regex:/^(?!.*<script>).*$/i',
            'date_issued'=>'required|date',
            'address'=>'required|string|regex:/^(?!.*<script>).*$/i',
            'education'=>'required|string|regex:/^(?!.*<script>).*$/i',
            'experience'=>'required|string|regex:/^(?!.*<script>).*$/i',
            'training'=>'required|string|regex:/^(?!.*<script>).*$/i'
        ]);
        if($validator->fails())
        {
            return response()->json([
                'status' => 422,
                'errors' => $validator->errors(),
            ]);
        }
        else
        {
            Applicant::create([
                'first_name'=>$request->input('first_name'),
                'middle_name'=>$request->input('middle_name'),
                'sur_name'=>$request->input('sur_name'),
                'suffix'=>$request->input('suffix'),
                'position'=>$request->input('position'),
                'gender'=>$request->input('gender'),
                'government_id'=>$request->input('government_id'),
                'id_number'=>$request->input('id_number'),
                'date_issued'=>$request->input('date_issued'),
                'address'=>$request->input('address'),
                'brgy_captain'=>$request->input('brgy_captain'),
                'education'=>$request->input('education'),
                'experience'=>$request->input('experience'),
                'training'=>$request->input('training')
            ]);
            return response()->json(['status'=>200,'message'=>'Applicant submitted successfully']);
        }
    }
    public function saveSchool(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'school'=>'required',
            'principal'=>'required',
            'designation'=>'required'
        ]);
        if($validator->fails())
        {
            return response()->json([
                'status' => 422,
                'errors' => $validator->errors(),
            ]);
        }
        else
        {
            Schools::create([
                'school_name'=>$request->input('school'),
                'principal'=>$request->input('principal'),
                'designation'=>$request->input('designation')
            ]);
            Logs::create([
                'id' => Auth::id(),
                'activities' => 'Added new school',
                'ip_address' => $request->ip(),
                'user_agent' => $request->header('User-Agent'),
            ]);
            return response()->json(['status'=>200,'message'=>'Successfully added']);
        }
    }

    public function updateSchool(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'id'=>'required',
            'school'=>'required',
            'principal'=>'required',
            'designation'=>'required'
        ]);
        if($validator->fails())
        {
            return response()->json([
                'status' => 422,
                'errors' => $validator->errors(),
            ]);
        }
        else
        {
            DB::table('schools')
            ->where('school_id',$request->input('id'))
            ->update([
                'school_name'=>$request->input('school'),
                'principal'=>$request->input('principal'),
                'designation'=>$request->input('designation')
            ]);
            Logs::create([
                'id' => Auth::id(),
                'activities' => 'Update '.$request->input('school'),
                'ip_address' => $request->ip(),
                'user_agent' => $request->header('User-Agent'),
            ]);
            return response()->json(['status'=>200,'message'=>'Successfully applied changes']);
        }
    }

    public function assignApplicant(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'applicant'=>'required|numeric',
            'school'=>'required|numeric',
        ]);
        if($validator->fails())
        {
            return response()->json([
                'status' => 422,
                'errors' => $validator->errors(),
            ]);
        }
        else
        {
            $checkData = Assignment::where('applicant_id',$request->input('applicant'))->first();
            if(!$checkData || empty($checkData))
            {
                Assignment::create([
                    'applicant_id'=>$request->input('applicant'),
                    'school_id'=>$request->input('school'),
                ]);
            }
            else
            {
                DB::table('assignments')
                ->where('applicant_id',$request->input('applicant'))
                ->update([
                    'school_id'=>$request->input('school'),
                ]);
            }
            Logs::create([
                'id' => Auth::id(),
                'activities' => 'Assigned user ID : '.$request->input('applicant'),
                'ip_address' => $request->ip(),
                'user_agent' => $request->header('User-Agent'),
            ]);
            return response()->json(['status'=>200,'message'=>'Successfully assigned']);
        }
    }

    public function saveSalary(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'salary_grade'=>'required',
            'amount'=>'required',
        ]);
        if($validator->fails())
        {
            return response()->json([
                'status' => 422,
                'errors' => $validator->errors(),
            ]);
        }
        else
        {
            $raw = $request->input('amount');
            // Remove commas and trim spaces
            $clean = trim(str_replace(',', '', $raw));
            // Remove non-numeric characters except dot
            $clean = preg_replace('/[^0-9.]/', '', $clean);
            // Cast to double
            $amount = (double) $clean;

            Salary::create([
                'salary_grade'=>$request->input('salary_grade'),
                'amount'=>$amount,
                'amount_in_words'=>$this->pesoToWords($amount)
            ]);
            Logs::create([
                'id' => Auth::id(),
                'activities' => 'Added new salary grade : '.$request->input('salary_grade'),
                'ip_address' => $request->ip(),
                'user_agent' => $request->header('User-Agent'),
            ]);
            return response()->json(['status'=>200,'message'=>'Successfully added']);
        }
    }

    public function pesoToWords($amount)
    {
        $whole = floor($amount);
        $decimal = round(($amount - $whole) * 100);

        $words = Number::spell($whole) . ' pesos';

        if ($decimal > 0) {
            $words .= ' and ' . Number::spell($decimal) . ' centavos';
        }

        return ucwords($words);
    }

    public function editSalary(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'edit_salary_grade'=>'required',
            'edit_amount'=>'required',
        ],[
            'edit_salary_grade.required'=>'Salary Grade is required',
            'edit_amount.required'=>'Amount is required'
        ]);
        if($validator->fails())
        {
            return response()->json([
                'status' => 422,
                'errors' => $validator->errors(),
            ]);
        }
        else
        {
            $raw = $request->input('edit_amount');
            // Remove commas and trim spaces
            $clean = trim(str_replace(',', '', $raw));
            // Remove non-numeric characters except dot
            $clean = preg_replace('/[^0-9.]/', '', $clean);
            // Cast to double
            $amount = (double) $clean;

            DB::table('salaries')
            ->where('salary_id',$request->input('salary_id'))
            ->update([
                'salary_grade'=>$request->input('edit_salary_grade'),
                'amount'=>$amount,
                'amount_in_words'=>$this->pesoToWords($amount)
            ]);
            Logs::create([
                'id' => Auth::id(),
                'activities' => 'Update the salary grade : '.$request->input('edit_salary_grade'),
                'ip_address' => $request->ip(),
                'user_agent' => $request->header('User-Agent'),
            ]);
            return response()->json(['status'=>200,'message'=>'Successfully applied changes']);
        }
    }

    public function fetchSalary(Request $request)
    {
        $val = $request->input('value');
        $data = Salary::where('salary_id',$val)->first();
        return response()->json(['status'=>200,'data'=>$data]);
    }

    public function saveRecords(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'salary_grade'=>'required',
            'employment'=>'required',
            'appointment'=>'required',
            'person'=>'required',
            'status'=>'required',
            'item'=>'required',
            'page'=>'required',
            'date'=>'required'
        ]);
        if($validator->fails())
        {
            return response()->json([
                'status' => 422,
                'errors' => $validator->errors(),
            ]);
        }
        else
        {
            $checkData = Other::where('applicant_id',$request->input('applicant'))->first();
            if(!$checkData||empty($checkData))
            {
                Other::create([
                    'applicant_id'=>$request->input('applicant'),
                    'salary_id'=>$request->input('salary_grade'),
                    'employment_type'=>$request->input('employment'),
                    'appointment'=>$request->input('appointment'),
                    'with'=>$request->input('person'),
                    'status'=>$request->input('status'),
                    'item'=>$request->input('item'),
                    'page'=>$request->input('page'),
                    'date_signed'=>$request->input('date'),
                    'published_from'=>$request->input('published_from'),
                    'published_to'=>$request->input('published_to'),
                    'posted_from'=>$request->input('posted_from'),
                    'posted_to'=>$request->input('posted_to'),
                    'assessment_date'=>$request->input('assessment'),
                ]);
            }
            else
            {
                DB::table('others')
                ->where('applicant_id',$request->input('applicant'))
                ->update([
                    'applicant_id'=>$request->input('applicant'),
                    'salary_id'=>$request->input('salary_grade'),
                    'employment_type'=>$request->input('employment'),
                    'appointment'=>$request->input('appointment'),
                    'with'=>$request->input('person'),
                    'status'=>$request->input('status'),
                    'item'=>$request->input('item'),
                    'page'=>$request->input('page'),
                    'date_signed'=>$request->input('date'),
                    'published_from'=>$request->input('published_from'),
                    'published_to'=>$request->input('published_to'),
                    'posted_from'=>$request->input('posted_from'),
                    'posted_to'=>$request->input('posted_to'),
                    'assessment_date'=>$request->input('assessment'),
                    'updated_at'=>now()
                ]);
            }
            Logs::create([
                'id' => Auth::id(),
                'activities' => 'Save/update the records of Applicant No : '.$request->input('applicant'),
                'ip_address' => $request->ip(),
                'user_agent' => $request->header('User-Agent'),
            ]);
            return response()->json(['status'=>200,'message'=>'Successfully save/update data']);
        }
    }

    public function saveAccount(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'email' => 'required|email:rfc,dns',
            'fullname' =>'required|string',
            'status'=>'required|integer',
            'password' => [
                'required',
                'min:8',
                'max:255',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/'
            ]
        ],[
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.max' => 'Password must not exceed 255 characters.',
            'password.regex' => 'Password must include at least one uppercase letter, one lowercase letter, one number, and one special character.',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status' => 422,
                'errors' => $validator->errors(),
            ]);
        }
        else
        {
            $status = $request->input('status');
            User::create([
                'name'=>$request->input('fullname'),
                'email'=>$request->input('email'),
                'email_verified_at' => ($status == 1) ? now() : null,
                'password'=>Hash::make($request->input('password')),
                'remember_token'=>Str::random(60)
            ]);
            Logs::create([
                'id' => Auth::id(),
                'activities' => 'Registered account : '.$request->input('fullname'),
                'ip_address' => $request->ip(),
                'user_agent' => $request->header('User-Agent'),
            ]);
            return response()->json(['status'=>200,'message'=>'Successfully added']);
        }
    }

    public function editAccount(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'email' => 'required|email:rfc,dns',
            'fullname' =>'required|string',
            'status'=>'required|integer',
            'password' => [
                'required',
                'min:8',
                'max:255',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/'
            ]
        ],[
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.max' => 'Password must not exceed 255 characters.',
            'password.regex' => 'Password must include at least one uppercase letter, one lowercase letter, one number, and one special character.',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status' => 422,
                'errors' => $validator->errors(),
            ]);
        }
        else
        {
            $id = $request->input('account_id');
            $status = $request->input('status');
            DB::table('users')
            ->where('id',$id)
            ->update([
                'name'=>$request->input('fullname'),
                'email'=>$request->input('email'),
                'email_verified_at' => ($status == 1) ? now() : null,
                'password'=>Hash::make($request->input('password')),
            ]);
            Logs::create([
                'id' => Auth::id(),
                'activities' => 'Update account : '.$request->input('fullname'),
                'ip_address' => $request->ip(),
                'user_agent' => $request->header('User-Agent'),
            ]);
            return response()->json(['status'=>200,'message'=>'Successfully applied changes']);
        }
    }

    public function resetAccount(Request $request)
    {
        $val = $request->input('value');
        DB::table('users')
        ->where('id',$val)
        ->update([
            'password'=>Hash::make('Abc12345?')
        ]);
        Logs::create([
            'id' => Auth::id(),
            'activities' => 'Reset the  account of ID : '.$val,
            'ip_address' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
        ]);
        return response()->json(['status'=>200,'message'=>'Successfully reset']);
    }

    public function accountPassword(Request $request)
    {
        $id = Auth::user()->id;
        $validator = Validator::make($request->all(),[
            'current_password' => [
                'required','min:8','max:255',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/'
            ],
            'new_password' => [
                'required','min:8','max:255',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/'
            ],
            'confirm_password'=>[
                'required','same:new_password'
            ]
        ], [
            // Password errors
            'current_password.required' => 'Password is required.',
            'current_password.min' => 'Password must be at least 8 characters.',
            'current_password.max' => 'Password must not exceed 255 characters.',
            'current_password.regex' => 'Password must include at least one uppercase letter, one lowercase letter, one number, and one special character.',
            'new_password.required' => 'Password is required.',
            'new_password.min' => 'Password must be at least 8 characters.',
            'new_password.max' => 'Password must not exceed 255 characters.',
            'new_password.regex' => 'Password must include at least one uppercase letter, one lowercase letter, one number, and one special character.',
            'confirm_password.required' => 'Password is required.',
            'confirm_password.same' => 'Mismatch password. Please try again',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->errors(),
            ]);
        }
        else
        {
            $account = User::where('id',$id)->first();
            if (Hash::check($request->input('new_password'), $account->password)) {
                return response()->json([
                    'status' => 422,
                    'errors' => [
                        'new_password' => ['Please create a new password different from the current one']
                    ]
                ]);
            }
            else
            {
                DB::table('users')
                ->where('id',$id)
                ->update([
                    'password'=>bcrypt($request->input('new_password'))
                ]);
                return response()->json([
                    'status' => 200,
                    'success' => 'Successfully applied changes',
                ]);
            }
        }
    }
}
