<!DOCTYPE html>
<html>
<style>
#text {
    line-height: 2.5;
    text-align: justify;
    font-size: 14px;
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
    @endphp
    <div>
        <label style="font-size: 12px;">{{ strtoupper($school->school_name) }}</label>
        <label style="float:right;font-size:12px;">
            <i>For Accredited/Deregulated Agencies</i>
        </label>
    </div>
    <div style="border:1px solid #000; padding:15px;background-color:gray;">
        <div style="border:1px solid #000; padding:10px;background-color:white;">
            <div><b><i>CSFORM No. 33-B</i></b></div>
            <small><i>Revised 2018</i></small>
            <div>
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
            <div><b>Mr./Ms./Mrs.:</b> <u><b>{{ $fullname }}</b></u></div>
            <div style="margin-left:40px;" id="text">
                <div style="text-align:center; display:inline-block;">
                    You are hereby appointed as
                    <span
                        style="display:inline-block; border-bottom:1px solid #000; padding:0 120px; font-weight:bold;">
                        {{ strtoupper($applicants->position) }}
                    </span>
                    (SG/JG/PG <u>&nbsp;{{ $salary->salary_grade }}&nbsp;</u>)
                    <div style="font-size:12px; margin-top:2px;font-weight:bold;margin-top:-20px;margin-left:50px;">
                        <i>(Position/Title)</i>
                    </div>
                </div>
            </div>
            <div id="text">
                <div style="display:inline-block;">
                    under
                    <span style="display:inline-block; border-bottom:1px solid #000; font-weight:bold;padding: 0 30px;">
                        {{ strtoupper($other->employment_type) }}
                    </span>
                    status at the <span
                        style="display:inline-block; border-bottom:1px solid #000;padding:0 10px; font-weight:bold;">
                        Department of Education - Division of General Trias City
                    </span>
                    <div style="font-size:12px; margin-top:2px;font-weight:bold;margin-top:-20px;">
                        <i style="margin-left:40px;">(Permanent,
                            Temporary, etc)</i>
                        <i style="margin-left:200px;">(Office,
                            Department, Unit)</i>
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
                    vice <u><b style="padding:0 20px;">&nbsp;{{ $other->with }}&nbsp;</b></u> who
                    <div style="font-size:12px; margin-top:2px;font-weight:bold;margin-top:-20px;margin-left:230px;">
                        <i>(Original, Promotion, etc)</i>
                    </div>
                </div>
            </div>
            <div id="text">
                <div style="display:inline-block;">
                    <span style="display:inline-block; border-bottom:1px solid #000; padding:0 30px; font-weight:bold;">
                        {{ strtoupper($other->status) }}
                    </span>
                    with Plantilla Item No.
                    <span
                        style="display:inline-block; border-bottom:1px solid #000; padding:0 100px; font-weight:bold;">
                        {{ strtoupper($other->item) }}
                    </span> Page
                    <u><b>&nbsp;{{ $other->page }}&nbsp;</b></u>.
                    <div style="font-size:12px; margin-top:2px;font-weight:bold;margin-top:-20px;margin-left:5px;">
                        <i>(Transferred, Retired, etc)</i>
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
                <label style="float:right;"><b>IVAN BRIAN L. INDUCTIVO, CESO VI</b></label><br /><br />
                <label style="float:right;margin-right:50px;margin-top:-20px;"><i><small>Schools Division
                            Superitendent</small></i></label>
            </div>
            <br /><br />
            <div>
                <label style="float:right;">
                    <b
                        style="display:inline-block; border-bottom:1px solid #000; padding:0 100px;">{{ date('d F, Y',strtotime($other->date_signed)) }}</b>
                </label><br /><br />
                <label style="float:right;margin-right:100px;margin-top:-20px;">
                    <small>Date of Signing</small>
                </label>
            </div>
            <br /><br />
            <div>
                <b>Accredited/Deregulated Pursuant to <br /></b>
                <b>CSC Resolution No. 2400504, s. 2024</b>
            </div>
            <br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
            <div>

                <label style="float:right;margin-right:50px;"><i><small>(Stamp of Date of Release)</small></i></label>
            </div>
            <br /><br />
        </div>
    </div>
    <br />
    <div style="border:1px solid #000; padding:15px;background-color:gray;">
        <div style="border:1px solid #000; padding:10px;background-color:white;">
            <div>
                <center><b>Certification</b></center>
            </div>
            <br />
            <div id="text" style="margin-left: 20px;">
                This is to certify that all requirements and supporting papers pursuant to <b>CSC MC No <u>&nbsp;24, s.
                        2017,&nbsp;</u></b>
            </div>
            <div id="text">
                <b>as amended</b> have been complied with, reviewied and found to be in order.
            </div>
            <div id="text" style="margin-left: 20px;">
                <div style="display:inline-block;">
                    This position was published at
                    <span style="display:inline-block; border-bottom:1px solid #000; padding:0 75px; font-weight:bold;">
                        CSC Job Portal
                    </span> from
                    <span
                        style="display:inline-block; border-bottom:1px solid #000; padding:0 20px; font-weight:bold;font-size:15px;">
                        {{ date('F d, Y',strtotime($other->published_from)) }}
                    </span> to
                </div>
            </div>
            <div id="text">
                <div style="display:inline-block;">
                    <span style="display:inline-block; border-bottom:1px solid #000; font-weight:bold;font-size:15px;">
                        {{ date('F d, Y',strtotime($other->published_to)) }}
                    </span> and posted in
                    <span
                        style="display:inline-block; border-bottom:1px solid #000; font-weight:bold;font-size:15px;padding:0 10px;">
                        SDO Bulletin Board, School Bulletin Board and LGU Bulletin Board
                    </span>
                </div>
            </div>
            <div id="text">
                <div style="display:inline-block;">
                    from
                    <span
                        style="display:inline-block; border-bottom:1px solid #000; font-weight:bold;padding:0 20px;font-size:15px;">
                        {{ date('F d, Y',strtotime($other->posted_from)) }}
                    </span> to
                    <span
                        style="display:inline-block; border-bottom:1px solid #000; font-weight:bold;padding:0 20px;font-size:15px;">
                        {{ date('F d, Y',strtotime($other->posted_to)) }}
                    </span> in consonance with RA No. 7041. The assessment by
                </div>
            </div>
            <div id="text">
                the Human Resource Merit Promotion and Selection Board (HRMPSB) started on
                <span style="display:inline-block; border-bottom:1px solid #000; font-weight:bold;font-size:15px;">
                    {{ date('F d, Y',strtotime($other->assessment_date)) }}.
                </span>
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
                    style="display:inline-block; border-bottom:1px solid #000; font-weight:bold;font-size:15px;padding:0 20px;">
                    {{ date('F d, Y',strtotime($other->assessment_date)) }}
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
                    <i><small>HRMPSB Chairperson</small></i>
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
                    <th>
                        <center>ACTION ON APPOINTMENTS</center>
                    </th>
                    <th>
                        <center>Recorded By</center>
                    </th>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <input type="checkbox" style="width:15px;height:15px;"> <b>Validated per RAI for the month
                                of</b>
                        </td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" style="width:15px;height:15px;"> <b>Invalidated per CSCRO/FO letter
                                dated</b>
                        </td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" style="width:15px;height:15px;"> <b>Appeal</b>
                        </td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" style="margin-left:40px;width:15px;height:15px;">
                            CSCRO/CSC-Commission
                        </td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" style="width:15px;height:15px;"> <b>Petition for Review</b>
                        </td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" style="margin-left:40px;width:15px;height:15px;">
                            CSCRO/CSC-Commission
                        </td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" style="margin-left:40px;width:15px;height:15px;">
                            Court of Appeals
                        </td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" style="margin-left:40px;width:15px;height:15px;">
                            Supreme Court
                        </td>
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
                        <small>Original Copy - for the Appointee</small><br />
                        <small>Original Copy - for the Civil Service Commission</small><br />
                        <small>Original Copy - for the Agency</small>
                    </td>
                    <td style="width:50%;">
                        <center>
                            <b>Acknowledgement</b>
                        </center>
                        <br />
                        <label style="font-size:12px;">Received original / photocopy of appointment on
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
