<?php

namespace App\Http\Controllers;

use \App\Models\Assignment;
use \App\Models\Schools;
use \App\Models\Other;
use \App\Models\Applicant;
use \App\Models\Salary;
use \App\Models\User;
use Illuminate\Support\Facades\DB;

class Home extends Controller
{
    public function index()
    {
        $data['title'] = "Welcome";
        return view('welcome',$data);
    }

    public function login()
    {
        $data['title'] = "Login";
        return view('auth.login',$data);
    }

    public function dashboard()
    {
        $data['title'] = "Dashboard";
        $data['schools'] = Schools::count();
        $data['list'] = DB::table('schools')
                        ->select('*')
                        ->orderBy('school_id','DESC')
                        ->limit(5)->get();
        $data['applicants'] = Applicant::count();
        $data['other'] = Other::count();
        $data['assignment'] = Assignment::count();
        //compute the total applicant based on the assigned school
        $data['total'] = DB::table('assignments as a')
                        ->leftJoin('schools as b', 'b.school_id', '=', 'a.school_id')
                        ->select(
                            'b.school_name',
                            DB::raw('COUNT(a.applicant_id) as total')
                        )
                        ->groupBy('a.school_id', 'b.school_name')
                        ->get();
        $data['position'] = DB::table('applicants')
                            ->select('position',
                            DB::raw('COUNT(applicant_id) as total'))
                            ->groupBy('position')
                            ->get();

        return view('pages.dashboard',$data);
    }

    public function allSchools()
    {
        $data['title'] = "Schools";
        $data['schools'] = Schools::all();
        return view('pages.schools.index',$data);
    }

    public function addSchool()
    {
        $data['title'] = "Add School";
        return view('pages.schools.add',$data);
    }

    public function editSchool($id)
    {
        $schools = Schools::where('school_id',$id)->first();
        if(!$schools || empty($schools))
        {
            return redirect('/schools')->with('fail', 'Sorry! Data not found. Please try again');
        }
        else
        {
            $data['title'] = "Schools";
            $data['schools'] = $schools;
            return view('pages.schools.edit',$data);
        }
    }

    public function allRecords()
    {
        $data['title'] = "Records";
        $data['applicants'] = Applicant::all();
        return view('pages.records.index',$data);
    }

    public function editRecord($id)
    {
        $applicant = Applicant::where('applicant_id',$id)->first();
        if(!$applicant||empty($applicant))
        {
            return redirect('/records')->with('fail', 'Sorry! Data not found. Please try again');
        }
        else
        {
            $data['title'] = "Records";
            $data['applicant'] = $applicant;
            $data['schools'] = Schools::all();
            $data['salary'] = Salary::all();
            //assigned
            $data['assignment'] = Assignment::where('applicant_id',$id)->first();
            //information
            $data['info'] = Other::where('applicant_id',$id)->first();
            return view('pages.records.edit',$data);
        }
    }

    public function viewRecord($id)
    {
        $applicant = Applicant::where('applicant_id',$id)->first();
        if(!$applicant||empty($applicant))
        {
            return redirect('/records')->with('fail', 'Sorry! Data not found. Please try again');
        }
        else
        {
            $data['title'] = "Records";
            $data['applicant'] = $applicant;
            return view('pages.records.view',$data);
        }
    }

    public function reports()
    {
        $data['title'] = "Reports";
        return view('pages.reports.index',$data);
    }

    public function settings()
    {
        $data['title'] = "Maintenance";
        $data['logs'] = DB::table('logs as a')
                        ->leftJoin('users as b','b.id','=','a.id')
                        ->select('a.*','b.name')
                        ->get();
        $data['salary'] = Salary::all();
        return view('pages.maintenance.settings',$data);
    }

    public function accounts()
    {
        $data['title'] = "Maintenance";
        $data['users'] = User::all();
        return view('pages.maintenance.account',$data);
    }

    public function createAccount()
    {
        $data['title'] = "New Account";
        return view('pages.maintenance.new-account',$data);
    }

    public function editAccount($id)
    {
        $user = User::where('remember_token',$id)->first();
        if(empty($user) || !$user)
        {
            return redirect('maintenance/accounts')->with('fail', 'Sorry! Data not found. Please try again');
        }
        else
        {
            $data['title'] = "Maintenance";
            $data['user'] = $user;
            return view('pages.maintenance.edit-account',$data);
        }
    }

    public function recovery()
    {
        $data['title'] = "Maintenance";
        return view('pages.maintenance.recovery',$data);
    }

    public function profile()
    {
        $data['title'] = "Profile";
        return view('pages.profile',$data);
    }
}
