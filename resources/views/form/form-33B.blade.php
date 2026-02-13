<!DOCTYPE html>
<html>
<style>
#text {
    line-height: 2.5;
    text-align: justify;
    font-size: 14px;
    width: 100%;
}

#table {
    border: 1px solid black;
    border-collapse: collapse;
}

#table th,
#table td {
    border: 1px solid black;
}

#header {
    font-size: 15px;
}
</style>

<body>
    @php
    $date = Carbon\Carbon::now();
    $applicants = \App\Models\Applicant::where('applicant_id',$id)->first();
    $fullname = strtoupper($applicants->first_name.' '.$applicants->middle_name.' '.$applicants->sur_name.'
    '.$applicants->suffix);
    $assignment = \App\Models\Assignment::where('applicant_id',$id)->first();
    $school = \App\Models\Schools::where('school_id',$assignment->school_id)->first();
    $other = \App\Models\Other::where('applicant_id',$id)->first();
    $salary = \App\Models\Salary::where('salary_id',$other->salary_id)->first();
    $salutatory = ($applicants->gender=="Male") ? '<u>Mr.</u>/Mrs./Ms.:' : 'Mr./Mrs./<u>Ms.</u>:';
    if(empty($school))
    {
    return redirect()->back()->with('fail','No school assigned to this applicant yet.');
    }
    @endphp
    <div>
        <label style="font-size: 12px;">{{ strtoupper($school->school_name) }}</label>
        <label style="float:right;font-size:12px;">
            <i>For Accredited/Deregulated Agencies</i>
        </label>
    </div>
    <div style="border:1px solid #000; padding:15px;background-color:gray;">
        <div style="border:1px solid #000; padding:10px;background-color:white;">
            <div><b><i>CS FORM No. 33-B</i></b></div>
            <div>
                <small><i>Revised 2025</i></small>
                <label style="float:right;margin-right:50px;"><small><i>(Stamp of Date of Receipt)</i></small></label>
            </div>
            <br /><br /><br />
            <div id="header">
                <center><b>Republic of the Philippines</b></center>
            </div>
            <div id="header">
                <center>Department of Education - Schools Division Office of General Trias City</center>
            </div>
            <div id="header">
                <center>Barangay Sta. Clara, General Trias City, Cavite</center>
            </div>
            <br /><br /><br />
            <div><b>{!! $salutatory !!}</b> <u><b>{{ $fullname }}</b></u></div>
            <div style="margin-left:40px;" id="text">
                <div style="text-align:center; display:inline-block;">
                    You&nbsp; are&nbsp; hereby&nbsp; appointed&nbsp; as&nbsp;
                    <span
                        style="display:inline-block; border-bottom:1px solid #000; padding:0 120px; font-weight:bold;">
                        {{ strtoupper($applicants->position) }}
                    </span>
                    &nbsp;&nbsp;(SG/JG/PG <u>&nbsp;{{ $salary->salary_grade }}&nbsp;</u>)
                    <div style="font-size:12px; margin-top:2px;font-weight:bold;margin-top:-20px;margin-left:50px;">
                        (Position/Title)
                    </div>
                </div>
            </div>
            <div id="text">
                <div style="display:inline-block;">
                    under
                    <span style="display:inline-block; border-bottom:1px solid #000; font-weight:bold;padding: 0 30px;">
                        {{ strtoupper($other->employment_type) }}
                    </span>
                    status&nbsp; at the <span
                        style="display:inline-block; border-bottom:1px solid #000;padding:0 30px; font-weight:bold;">
                        Department of Education - Division of General Trias City
                    </span>
                    <div style="font-size:12px; margin-top:2px;font-weight:bold;margin-top:-20px;">
                        <span style="margin-left:40px;">(Permanent,
                            Temporary, etc)</span>
                        <span style="margin-left:200px;">(Office,
                            Department, Unit)</span>
                    </div>
                </div>
            </div>
            <div id="text">
                with compensation rate of
                <span style="display:inline-block; border-bottom:1px solid #000; font-weight:bold;padding: 0 20px;">
                    {{ $salary->amount_in_words }}
                </span>
                &nbsp;&nbsp;
                <span style="display:inline-block; border-bottom:1px solid #000; font-weight:bold;padding: 0 20px;">
                    (Php {{ number_format($salary->amount,2) }})
                </span>
                pesos per month.
            </div>
            <div id="text" style="margin-left: 40px;">
                <div style="display:inline-block;">
                    The nature of this appointment is
                    <span style="display:inline-block; border-bottom:1px solid #000; padding:0 30px; font-weight:bold;">
                        {{ strtoupper($other->appointment) }}
                    </span>
                    &nbsp;vice &nbsp;
                    <span
                        style="display:inline-block; border-bottom:1px solid #000; padding: 0 {{ $other->with == 'N/A' ? '80px' : '30px' }}; font-weight:bold;">
                        {{ strtoupper($other->with) }}
                    </span>
                    who
                    <div style="font-size:12px; margin-top:2px;font-weight:bold;margin-top:-20px;margin-left:220px;">
                        (Original, Promotion, etc)
                    </div>
                </div>
            </div>
            <div id="text">
                <div style="display:inline-block;">
                    <span style="display:inline-block; border-bottom:1px solid #000; padding:0 50px; font-weight:bold;">
                        {{ strtoupper($other->status) }}
                    </span>
                    with Plantilla Item No.
                    <span style="display:inline-block; border-bottom:1px solid #000; padding:0 80px; font-weight:bold;">
                        {{ strtoupper($other->item) }}
                    </span> Page
                    <u><b>&nbsp;{{ $other->page }}&nbsp;</b></u>.
                    <div style="font-size:12px; margin-top:2px;font-weight:bold;margin-top:-20px;margin-left:5px;">
                        (Transferred, Retired, etc)
                    </div>
                </div>
            </div>
            <div id="text" style="margin-left:40px;">
                This appointment shall take effect on the date of signing by the appointing officer / authority.
            </div>
            <br /><br />
            <div>
                <label style="float:right;margin-right: 200px;">Very truly yours,</label>
            </div>
            <br /><br /><br />
            <div>
                <label style="float:right;"><u><b>IVAN BRIAN L. INDUCTIVO, CESO VI</b></u></label><br /><br />
                <label style="float:right;margin-right:50px;margin-top:-20px;"><i><small>Schools Division
                            Superitendent</small></i></label>
            </div>
            <br /><br />
            <div>
                <label style="float:right;">
                    <b
                        style="display:inline-block; border-bottom:1px solid #000; padding:0 85px;">{{ date('d F, Y',strtotime($other->date_signed)) }}</b>
                </label><br /><br />
                <label style="float:right;margin-right:100px;margin-top:-20px;">
                    <small>Date of Signing</small>
                </label>
            </div>
            <br /><br />
            <div>
                <b>Accredited/Deregulated Pursuant to <br /></b>
                <b>CSC Resolution No. 2400504, s. 2024</b><br />
                <b>Dated : <u>&nbsp;19 June 2024&nbsp;</u></b>
            </div>
            <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
            <br /><br /><br />
        </div>
    </div>
    <br />
    <div style="border:1px solid #000; padding:15px;background-color:gray;">
        <div style="border:1px solid #000; padding:10px;background-color:white;">
            <div>
                <center><b>Certification</b></center>
            </div>
            <br />
            <div id="text" style="margin-left: 40px;">
                This&nbsp; is&nbsp; to&nbsp; certify&nbsp; that&nbsp; all&nbsp;
                requirements&nbsp; and&nbsp; supporting&nbsp; papers&nbsp; pursuant&nbsp;
                to&nbsp; the&nbsp;<b>&nbsp;2025 Omnibus Rules on</b>
            </div>
            <div id="text">
                <b>Appointments and Other Human Resource Actions,</b> have been complied with, reviewied and found to be
                in order.
            </div>
            <div id="text" style="margin-left: 40px;">
                <div style="display:inline-block;">
                    This position was published at
                    <span
                        style="display:inline-block; border-bottom:1px solid #000; padding:0 {{ $other->publisher == "N/A" ? '90px' : '50px;' }}; font-weight:bold;">
                        {{ strtoupper($other->publisher) }}
                    </span> from
                    <span
                        style="display:inline-block; border-bottom:1px solid #000; padding:0 10px; font-weight:bold;font-size:15px;">
                        {!! $other->published_from ? date('F d', strtotime($other->published_from)) :
                        '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' !!}
                    </span> to
                    <span
                        style="display:inline-block; border-bottom:1px solid #000; padding:0 10px;font-weight:bold;font-size:15px;">
                        {!! $other->published_to ? date('F d', strtotime($other->published_to)) :
                        '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' !!}
                    </span>,
                </div>
            </div>
            <div id="text">
                <div style="display:inline-block;">
                    <span
                        style="display:inline-block; border-bottom:1px solid #000;padding:0 10px; font-weight:bold;font-size:15px;">
                        {{ $other->published_to ? date('Y', strtotime($other->published_to)) : 'N/A' }}
                    </span>
                    and posted in three (3) conspicuous places from
                    <span
                        style="display:inline-block; border-bottom:1px solid #000; font-weight:bold;padding:0 20px;font-size:15px;">
                        {!! $other->posted_from ? date('F d', strtotime($other->posted_from)) :
                        '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' !!}
                    </span> to
                    <span
                        style="display:inline-block; border-bottom:1px solid #000; font-weight:bold;padding:0 20px;font-size:15px;">
                        {!! $other->posted_to ? date('F d', strtotime($other->posted_to)) :
                        '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' !!}
                    </span>,
                    <span
                        style="display:inline-block; border-bottom:1px solid #000; font-weight:bold;padding:0 20px;font-size:15px;">
                        {{ $other->posted_to ? date('Y', strtotime($other->posted_to)) : 'N/A' }}
                    </span>
                    in
                </div>
            </div>
            <div id="text" style="width:100%;">
                consonance&nbsp; with&nbsp; Republic&nbsp; Act&nbsp; No.&nbsp; 7041. The&nbsp; assessment&nbsp; by&nbsp;
                the&nbsp; Human&nbsp; Resource&nbsp; Merit&nbsp; Promotion&nbsp; and
            </div>
            <div id="text">
                Selection&nbsp; Board&nbsp; (HRMPSB)&nbsp; started&nbsp; on&nbsp;
                <span
                    style="display:inline-block; border-bottom:1px solid #000; padding:0 20px; font-weight:bold;font-size:15px;">
                    {{ $other->assessment_date ? date('F d', strtotime($other->assessment_date)) : 'N/A' }}
                </span>,
                <span
                    style="display:inline-block; border-bottom:1px solid #000; padding:0 10px; font-weight:bold;font-size:15px;">
                    {{ $other->assessment_date ? date('Y', strtotime($other->assessment_date)) : 'N/A' }}
                </span>.
            </div>
            <br /><br />
            <div>
                <label style="float:right;margin-right:30px;"><u><b>&nbsp;&nbsp;&nbsp;ALMA C.
                            CRUZADA&nbsp;&nbsp;&nbsp;</b></u></label><br /><br />
                <label style="float:right;margin-right:50px;margin-top:-20px;">
                    <i><small>Administrative Officer V</small></i>
                </label>
            </div>
        </div>
        <br />
        <div style="border:1px solid #000; padding:10px;background-color:white;">
            <div>
                <center><b>Certification</b></center>
            </div>
            <br />
            <div id="text" style="margin-left: 40px;">
                This is to certify that the appointee has been screened and found qualified by the majority of the
                HRMPSB
            </div>
            <div id="text">
                during the deliberation held on
                <span
                    style="display:inline-block; border-bottom:1px solid #000; font-weight:bold;font-size:15px;padding:0 30px;">
                    {{ $other->assessment_date ? date('F d, Y', strtotime($other->assessment_date)) : 'N/A' }}
                </span>.
            </div>
            <br /><br />
            <div>
                <label style="float:right;margin-right:30px;"><u><b>ROGIN O. CONTEMPRATO,
                            CESE</b></u></label><br /><br />
                <label style="float:right;margin-right:60px;margin-top:-20px;">
                    <i><small>Public Schools District Supervisor</small></i>
                </label><br />
                <label style="float:right;margin-right:110px;margin-top:-20px;">
                    <i><small>Officer-In-Charge</small></i>
                </label><br />
                <label style="float:right;margin-right:0px;margin-top:-20px;">
                    <i><small>Office of the Assistant Schools Division Superitendent</small></i>
                </label><br />
                <label style="float:right;margin-right:90px;margin-top:-20px;">
                    <i><small>Chairperson, HRMPSB</small></i>
                </label>
            </div>
        </div>
    </div>
    <br />
    <div style="border:1px solid #000; padding:15px;background-color:gray;">
        <center style="margin-bottom:10px;"><b>CSC/HRMO Notation</b></center>
        <div style="border:1px solid #000; padding:10px;background-color:white;">
            <table id="table" style="width:100%;">
                <thead>
                    <th colspan="3">
                        <center>ACTION ON APPOINTMENTS</center>
                    </th>
                    <th>
                        <center>Recorded By</center>
                    </th>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="3">
                            <input type="checkbox" style="width:15px;height:12px;margin-bottom:4px;">
                            <b>Validated per
                                RAI for the month
                                of</b>
                        </td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <input type="checkbox" style="width:15px;height:12px;margin-bottom:4px;">
                            <b>Invalidated
                                per
                                CSCRO/FO letter
                                dated</b>
                        </td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" style="width:15px;height:12px;margin-bottom:4px;">
                            <b>Appeal</b>
                        </td>
                        <td style="text-align:center;font-weight:bold;">DATE FILED</td>
                        <td style="text-align:center;font-weight:bold;">STATUS</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" style="margin-left:40px;width:15px;height:12px;margin-bottom:4px;">
                            CSCRO/CSC-Commission
                        </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" style="width:15px;height:12px;margin-bottom:4px;">
                            <b>Petition for
                                Review</b>
                        </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" style="margin-left:40px;width:15px;height:12px;margin-bottom:4px;">
                            CSCRO/CSC-Commission
                        </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" style="margin-left:40px;width:15px;height:12px;margin-bottom:4px;">
                            Court of Appeals
                        </td>2
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" style="margin-left:40px;width:15px;height:12px;margin-bottom:4px;">
                            Supreme Court
                        </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <br />
    <div style="border:1px solid #000; padding:15px;background-color:gray;">
        <table style="width: 100%;background-color:white;" id="table">
            <tbody>
                <tr>
                    <td style="width:50%;">
                        <small>Original Copy - for the Agency</small><br />
                        <small>Certificed True Copy - for the Civil Service Commission</small><br />
                        <small>Certified True Copy - for the Appointee</small>
                    </td>
                    <td style="width:50%;">
                        <center>
                            <b>Acknowledgement</b>
                        </center>
                        <br />
                        <label style="font-size:12px;"><i>Received original copy of the appointment on</i>
                            ______________</label>
                        <br /><br />
                        <div>
                            <label
                                style="float:right;margin-right:30px;">____________________________</u></label><br /><br />
                            <label style="float:right;margin-right:120px;margin-top:-20px;">
                                <i><small>Appointee</small></i>
                            </label>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>