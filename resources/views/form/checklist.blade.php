<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <style>
    body {
        font-family: DejaVu Sans, sans-serif;
        font-size: 8px;
    }

    #table {
        border: 1px solid black;
        border-collapse: collapse;
    }

    #table th,
    #table td {
        border: 1px solid black;
    }
    </style>
</head>

<body>
    @php
    $applicants = \App\Models\Applicant::where('applicant_id',$id)->first();
    $fullname = strtoupper($applicants->first_name.' '.$applicants->middle_name.' '.$applicants->sur_name.'
    '.$applicants->suffix);
    $other = \App\Models\Other::where('applicant_id',$id)->first();
    $salary = \App\Models\Salary::where('salary_id',$other->salary_id)->first();
    @endphp
    <div>
        <label style="float:right;font-size:8px;">
            <i>Checklist For Action in the Regional/Field Office</i>
        </label>
    </div>
    <br /><br />
    <div style="text-align: center;font-size:15px;font-weight:bold;">APPOINTMENT PROCESSING CHECKLIST</div>
    <br />
    <table id="table" width="100%">
        <tbody>
            <tr>
                <td><b>Name</b></td>
                <td colspan="11"><b>{{ $fullname }}</b></td>
            </tr>
            <tr>
                <td><b>Position Title</b></td>
                <td colspan="3"><b>{{ $applicants->position }}</b></td>
                <td colspan="2" style="text-align: center;font-weight:bold;">SG/Step:</td>
                <td colspan="6" style="text-align: center;font-weight:bold;">{{ $salary->salary_grade }}</td>
            </tr>
            <tr>
                <td><b>Monthly<br />Compensation</b></td>
                <td colspan="3"><b>{{ number_format($salary->amount,2) }}</b></td>
                <td colspan="4"><b>Daily Compensation (Casual)</b></td>
                <td colspan="4">&nbsp;</td>
            </tr>
            <tr>
                <td><b>Agency</b></td>
                <td colspan="3"><b>DepEd, Divisions of General Trias City</b></td>
                <td colspan="2" style="text-align: center;"><b>Sector</b></td>
                <td style="text-align: center;"><b>LGU</b></td>
                <td style="text-align: center;"><b>GOCC</b></td>
                <td style="text-align: center;"><b>NGA</b></td>
                <td colspan="3" style="text-align: center;"><b>SUC</b></td>
            </tr>
            <tr>
                <td colspan="12">&nbsp;</td>
            </tr>
            <tr>
                <td style="text-align: center;"><b>AREA</b></td>
                <td colspan="3" style="text-align: center;"><b>CRITERIA</b></td>
                <td style="text-align: center;"><b>YES</b></td>
                <td style="text-align: center;"><b>NO</b></td>
                <td colspan="6" style="text-align: center;"><b>REMARKS</b><br />(Provide specific details)</td>
            </tr>
            <tr>
                <td rowspan="6">
                    <center><b>Qualification<br />Standards</b></center>
                    <br />
                    <center>
                        <i>Does the appointee<br /> meet the minimum<br />qualification<br /> requirements of the<br />
                            position at the time of<br />
                            issuance of<br /> appointment?</i>
                    </center>
                    <br />
                </td>
                <td colspan="3" style="padding:10px;">
                    <b>1</b> Education :
                </td>
                <td>
                    <center>&#10003;</center>
                </td>
                <td></td>
                <td colspan="6">{{ $applicants->education }}</td>
            </tr>
            <tr>
                <td colspan="3" style="padding:10px;">
                    <b>2</b> Experience :
                </td>
                <td>
                    <center>&#10003;</center>
                </td>
                <td></td>
                <td colspan="6">{{ $applicants->experience }} relevant experience</td>
            </tr>
            <tr>
                <td colspan="3" style="padding:10px;">
                    <b>3</b> Training :
                </td>
                <td>
                    <center>&#10003;</center>
                </td>
                <td></td>
                <td colspan="6">{{ $applicants->training }} relevant training</td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left:10px;">
                    <b>4</b> Eligibility: PBET/LET/RA1080 (TEACHER)
                </td>
                <td>
                    <center>&#10003;</center>
                </td>
                <td></td>
                <td colspan="6" style="text-align: center;">LET</td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left:10px;">
                    <b>5</b> Other Requirements <i>(e.g. Age/Residency for LGU Dept. Heads; Term of Office for SUC<br />
                        President)</i>
                </td>
                <td></td>
                <td></td>
                <td colspan="6" style="text-align: center;">N/A</td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left:10px;">
                    Senior HS - Track/Strand Subjects <i>(for DepEd appointments)</i>
                </td>
                <td></td>
                <td></td>
                <td colspan="6">&nbsp;</td>
            </tr>
            <tr>
                <td rowspan="19" style="text-align: center;">
                    <b>Common<br />Requirements for<br />Regular<br />Appointments</b><br />
                    <i>Are the following<br />requirements<br />provided?</i>
                </td>
                <td colspan="3" style="padding-left:10px;">
                    <b>6 Original Copy/ies of Appointment (3 copies)</b>
                </td>
                <td></td>
                <td></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left:20px;">
                    i. CS Form No. 33-A Revised 2018 Appointment Form (Regulated)
                </td>
                <td></td>
                <td></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left:20px;">
                    ii. CS Form No. 33-B Revised 2018 Appointment Form (Accredited)
                </td>
                <td>
                    <center>&#10003;</center>
                </td>
                <td></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left:20px;">
                    iii. CS Form No. 34-A Plantilla of Casual Appointment (Regulated)
                </td>
                <td></td>
                <td></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left:20px;">
                    iv. CS Form No. 34-B Plantilla of Casual Appointment (Accredited)
                </td>
                <td></td>
                <td></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left:20px;">
                    v. CS Form No. 34-C Plantilla of Casual Appointment (LGU - Regulated)
                </td>
                <td></td>
                <td></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left:20px;">
                    vi. CS Form No. 34-D Plantilla of Casual Appointment (LGU - Accredited)
                </td>
                <td></td>
                <td></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left:20px;">
                    vii. CS Form No. 34-E Plantilla of Casual Appointment (NGA-GOCC-SUC)
                </td>
                <td></td>
                <td></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left:20px;">
                    viii. CS Form No. 34-F Plantilla of Casual Appointment (LGU)
                </td>
                <td></td>
                <td></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left:10px;">
                    <b>7 Employment Status</b>
                </td>
                <td></td>
                <td></td>
                <td colspan="6">
                    <center>{{ $other->employment_type }}</center>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left:20px;">
                    i. Provisional Appointment notation for DepEd
                </td>
                <td></td>
                <td></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left:20px;">
                    ii. is the appointee subject for Probation?<br />
                    A notation that the appointee is under probation for a specified<br />
                    period shall be indicated on the face of the appointment issued
                </td>
                <td></td>
                <td></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left:10px;">
                    <b>8 Nature of Appointment</b>
                </td>
                <td></td>
                <td></td>
                <td colspan="6">
                    <center>{{ $other->appointment }}</center>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left:10px;">
                    <b>9 Signature of Appointing Authority</b>
                </td>
                <td>
                    <center>&#10003;</center>
                </td>
                <td></td>
                <td colspan="6">
                    <center>IVAN BRIAN L. INDUCTIVO, CESO VI</center>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left:10px;">
                    <b>10 Date of Signing</b>
                </td>
                <td></td>
                <td></td>
                <td colspan="6">
                    <center>{{ date('F d, Y',strtotime($other->date_signed)) }}</center>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left:10px;">
                    <b>11 Certification of Publication/Posting of VACANT Position</b><br />
                    <i style="padding-left:10px;">(should be duly signed by the authorized HRMO)</i>
                </td>
                <td>
                    <center>&#10003;</center>
                </td>
                <td></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left:10px;">
                    <b>12 Certification by Chairperson of the HRMPSB or the Placement Committee</b><br />
                    <i style="padding-left:10px;">(at the back of appointment)</i>
                </td>
                <td>
                    <center>&#10003;</center>
                </td>
                <td></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left:10px;">
                    <b>13 Acknowledgement</b><br />
                    <i style="padding-left:10px;">(Original/Photocopy of appointment received by the
                        appointee?<br />Date of receipt
                        indicated?)</i>
                </td>
                <td>
                    <center>&#10003;</center>
                </td>
                <td></td>
                <td colspan="6">
                    <center>{{ date('F d, Y',strtotime($other->date_signed)) }}</center>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left:10px;">
                    <b>14 Properly filled-out Personal Data Sheet (CS Form 212, Revised 2017)</b><br />
                    <i style="padding-left:10px;">(except for reappointment (renewal) to temporary,<br />contractual,
                        substitute, and provisional
                        appointments)</i>
                </td>
                <td>
                    <center>&#10003;</center>
                </td>
                <td></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td rowspan="2" style="text-align: center;">
                    <b>Submission and <br />Effectivity of<br />Appointment</b>
                </td>
                <td colspan="3" style="padding-left: 10px;">
                    <b>15 Is the agency accredited?</b><br />
                    <i style="padding-left:10px;">
                        i. If accredited, was RAI (CS Form No. 2, Revised 2018) with original copy of<br />
                    </i>
                    <i style="padding-left:10px;">
                        appointment (CSC copy) and supporting documents submitted to the CSC on or<br />
                    </i>
                    <i style="padding-left:10px;">
                        before the 30th day of the succeding month?
                    </i>
                </td>
                <td>
                    <center>&#10003;</center>
                </td>
                <td></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left: 20px;">
                    <i>
                        ii. if NOT accredited, was the appointment (3 copies) submitted to the CSC with <br />
                        supporting documents in the pescribed Appointment Transmittal Form (CS Form No. 1, <br />
                        Revised 2018) within 30 calendar days from the date of issuance?
                    </i>
                </td>
                <td></td>
                <td>
                    <center>&#10003;</center>
                </td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td rowspan="7" style="text-align: center;">
                    <b>Additional<br />Requirements in<br />Specific Cases</b><br />
                    <i>Are the following<br />cases applicable?</i>
                </td>
                <td colspan="3" style="padding-left: 10px;">
                    <b>16 Erasures or alterations on the appointments</b><br />
                    <i style="padding-left: 10px;">
                        * Certification of Erasures/Alteration on appointment Form<br />
                    </i>
                    <i style="padding-left:10px;">
                        (CS Form. 3, s. 2017) signed by the Appointing Officer/Authority or<br />
                    </i>
                    <i style="padding-left:10px;">
                        Any Authorized Official
                    </i>
                </td>
                <td></td>
                <td>
                    <center>&#10003;</center>
                </td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left: 10px;">
                    <b>17 With decided administrative/criminal case</b><br />
                    <i style="padding-left: 10px;">
                        * Certified true copy of decision issued by the office/court/tribunal
                    </i>
                </td>
                <td></td>
                <td></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left:10px;">
                    <b>18 Discrepancy in name, date/place of birth</b><br />
                    <i style="padding-left:10px;">
                        * Resolution/Order issued by the Commission / CSC Regional Office<br />
                    </i>
                    <i style="padding-left:10px;">
                        (CSCRO) concerned correcting the discrepancy
                    </i>
                </td>
                <td></td>
                <td></td>
                <td colspan="6" style="text-align: center;">N/A</td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left:10px;">
                    <b>19 Change of Civil Status on account of:</b><br />
                    <i style="padding-left:10px;">
                        i. Marriage - Original Marriage Contract/ Certificate duly authenticated by<br />
                    </i>
                    <i style="padding-left:10px;">
                        the Philippine Statistics Authority or the Local Civil Registrar of the <br />
                    </i>
                    <i style="padding-left:10px;">
                        municipality/city where the marriage was registered or recorded
                    </i>
                </td>
                <td></td>
                <td></td>
                <td colspan="6" style="text-align: center;">N/A</td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left:20px;">
                    <i>
                        ii. Annulment or Declaration of Nullity of the same - Authenticated copy of <br />
                        the Court Order and Marriage Certificate/Contract of annotation
                    </i>
                </td>
                <td></td>
                <td></td>
                <td colspan="6" style="text-align: center;">N/A</td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left:10px;">
                    <b>20 Appointments issued by the SUCs under National Budget Circular (NBC) No. 461</b><br />
                    <i style="padding-left:10px;">
                        * Copy of DBM-approved NOSCA on the reclassification of position based on<br />
                    </i>
                    <i style="padding-left:10px;">
                        NBC No. 461 and SUC Board Resolution approving the same
                    </i>
                </td>
                <td></td>
                <td></td>
                <td colspan="6" style="text-align: center;">N/A</td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left:10px;">
                    <b>21 Appointment issued for faculty positions/ranks in fields/courses/colleges in <br />
                        SUCs and LUCs where there is dearth of holders of Master's degree in specific fields</b><br />
                    <i style="padding-left:10px;">
                        * Certification issued by CHED that there is dearth of holders of <br /> Master's degree in
                        speficic fields
                    </i>
                </td>
                <td></td>
                <td></td>
                <td colspan="6" style="text-align: center;">N/A</td>
            </tr>
            <tr>
                <td rowspan="14" style="text-align: center;">
                    <b>Additional<br />Requirements in<br />Specific Cases</b><br />
                    Are the following<br />cases applicable?
                </td>
                <td colspan="3" style="padding-left:10px;">
                    <b>22 Appointments Requiring Board Resolution such as Head of Agency appointment by the<br />
                        Board, SUC President, Local Water District (LWD) General Manager</b><br />
                    <i style="padding-left:10px;">
                        * Copy of Board Resolution
                    </i>
                </td>
                <td></td>
                <td></td>
                <td colspan="6" style="text-align: center;">N/A</td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left:10px;">
                    <b>23 Ban on Issuance of Appointment During Election Period</b><br />
                    <i style="padding-left:10px;">
                        * Resolution issued by the Commission on Elections (COMELEC) en banc, Chairman or<br />
                    </i>
                    <i style="padding-left:10px;">
                        Regional Election Director, granting exemption from the prohibition
                    </i>
                </td>
                <td></td>
                <td></td>
                <td colspan="6" style="text-align: center;">N/A</td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left:10px;">
                    <b>24 LGU Appointment</b>
                </td>
                <td></td>
                <td></td>
                <td colspan="6" style="text-align: center;">N/A</td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left:20px;">
                    i. Certification issued by the appointing officer/authority that<br />
                    appointment is issued in accordance wuth the limitations provided<br />
                    for under Section 325, RA No. 7160; and
                </td>
                <td></td>
                <td></td>
                <td rowspan="6" colspan="6" style="text-align: center;">N/A</td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left:20px;">
                    ii. Certification issued by the Provincial/City/Municipal Accountant<br />
                    that funds are available
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left:20px;">
                    iii. Appointment to head of department or office, such as Department<br />
                    Head, Administrator, Legal Officer, and Information Officer<br />
                    positions requiring concurrence by the Sanggunian<br />
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left:25px;">
                    <i>
                        * Concurred / Acted by Sanggunian - Sanggunian Resolution<br />
                        embodying the concurrence of the majority of all the<br />
                        members of Sanggunian
                    </i>
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left:25px;">
                    <i>
                        * Not Concurred / Acted by Sanggunian - Certification issued<br />
                        by the Sanggunian Secretary or HRMO confirming the non-<br />
                        action by the Sanggunian
                    </i>
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left:20px;">
                    iv. Creation and reclassification of positions and appropriation of funds<br />
                    <i style="padding-left:5px;">
                        * Sangguniang Panlalawigan/Panlungsod/Bayan Ordinance
                    </i>
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left:10px;">
                    <b>25 Appointment Involving Demotion</b><br />
                    <span style="padding-left:10px;">
                        i. Non-disciplinary in Nature
                    </span>
                </td>
                <td></td>
                <td></td>
                <td colspan="6" rowspan="3" style="text-align: center;">N/A</td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left:25px;">
                    <i>
                        * Certification issued by the agency head that the demotion is not<br />
                        the result of an administrative case; and
                    </i>
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left:25px;">
                    <i>
                        * Written consent by the employee that he/she interposes no objection to<br />
                        his/her demotion
                    </i>
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left:10px;">
                    <b>26 Temporary and Provisional Appointment</b><br />
                    <i style="padding-left:10px;">
                        * Certification issued by the appointing officer/authority vouching the<br />
                        absence of an applicant who meets all the qualification requirements of<br />
                        the position (CS Form No. 5, Revised 2018)
                    </i>
                </td>
                <td></td>
                <td></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left:10px;">
                    <b>32529 Reclassification</b><br />
                    <i style="padding-left:10px;">
                        * NOSCA approved by the DBM/Memo Order issued by Governance<br />
                        Commission for GOCCs (GCG)
                    </i>
                </td>
                <td></td>
                <td>
                    <center>&#10003;</center>
                </td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td rowspan="10" style="text-align: center;">
                    <b>Documents<br />Submitted</b>
                </td>
                <td colspan="3" style="padding-left:10px;">
                    <b>28 ORIGINAL COPY OF AUTHENTICATED CERTIFICATE OF ELIGIBILITY/RATING/LICENSE-</b><br />
                    <i style="padding-left:10px;">
                        Except if the eligibility has been previously authenticated in 2004 or onward and<br />
                        recorded by the CSC
                    </i>
                </td>
                <td>
                    <center>&#10003;</center>
                </td>
                <td></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left:10px;">
                    <b>29 Position Description Form <i style="color:red;">(DBM-CSC Form No. 1, Revised
                            2017)</i></b><br />
                </td>
                <td>
                    <center>&#10003;</center>
                </td>
                <td></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left:10px;">
                    <b>30 Oath of Office (CS Form No. 32, Revised 2018)</b>
                </td>
                <td>
                    <center>&#10003;</center>
                </td>
                <td></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left:10px;">
                    <b>31 Certification of Assumption to Duty (CS Form No. 4, Revised 2018)</b>
                </td>
                <td>
                    <center>&#10003;</center>
                </td>
                <td></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left:10px;">
                    <b>32 Performance Rating in the last period (Promotion or Transfer)</b>
                </td>
                <td></td>
                <td></td>
                <td colspan="6" style="text-align: center;">N/A</td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left:10px;">
                    <b>33 Justification (if the promotion is more than 3 SG)</b>
                </td>
                <td></td>
                <td></td>
                <td colspan="6" style="text-align: center;">N/A</td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left:10px;">
                    <b>34 Electronic file stored in CD/flash drive or sent thru email + 2 printed copies of:</b>
                </td>
                <td></td>
                <td></td>
                <td colspan="6" rowspan="3" style="text-align: center;">N/A</td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left:25px;">
                    i. Appointment Transmittal and Action Form (ATAF)<br />
                    (CS Form No.1, Revised 2018) or
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left:25px;">
                    ii. Reports on Appointment Issued (RAI)<br />
                    (CS Form No. 2, Revised 2018)
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left:10px;">
                    <b>35 Others</b>
                </td>
                <td></td>
                <td></td>
                <td colspan="6" style="text-align:center;">N/A</td>
            </tr>
        </tbody>
    </table>
    CSC FO Recommendation:<br />
    <table id="table" width="100%">
        <tbody>
            <tr>
                <td colspan="12" style="padding-left:15px;padding-top:10px;">
                    <div><input type="checkbox" checked /> <b>APPROVAL/VALIDATION</b></div>
                    <div><input type="checkbox" /> <b>DISAPPROVAL/INVALIDATION</b></div>
                    <div><input type="checkbox" /> <b>OTHERS,
                            specify:</b>_____________________________________________________</div>
                    <span style="padding-left:15px;">Remarks (Indicate the reasons for disapproval/invalidation)</span>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    Evaluated: <br /><br /><br />
                </td>
                <td colspan="4">
                    Verified: <br /><br /><br />
                    <center>
                        <u><b>EUNESE P. LOYOLA</b></u><br />
                        <i>Administrative Officer IV</i>
                    </center>
                </td>
                <td colspan="4">
                    Recommended: <br /><br /><br />
                    <center>
                        <u><b>ALMA C. CRUZADA</b></u><br />
                        <i>Administrative Officer V</i>
                    </center>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    Date
                </td>
                <td colspan="4">
                    Date
                </td>
                <td colspan="4">
                    Date
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>