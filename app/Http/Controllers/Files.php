<?php

namespace App\Http\Controllers;

use \App\Models\User;
use \App\Models\Applicant;
use \App\Models\Logs;
use \App\Models\Schools;
use \App\Models\Assignment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
            Assignment::create([
                'applicant_id'=>$request->input('applicant'),
                'school_id'=>$request->input('school'),
            ]);
            Logs::create([
                'id' => Auth::id(),
                'activities' => 'Assigned user ID : '.$request->input('applicant'),
                'ip_address' => $request->ip(),
                'user_agent' => $request->header('User-Agent'),
            ]);
            return response()->json(['status'=>200,'message'=>'Successfully assigned']);
        }
    }
}