<?php

namespace App\Http\Controllers;
use \App\Models\Applicant;
use \App\Models\Other;
use \App\Models\Assignment;
use \App\Models\Schools;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;


class Export extends Controller
{
    public function exportForm32($id)
    {
        $date = Carbon::now();
        $applicants = Applicant::where('applicant_id',$id)->first();
        $fullname = strtoupper($applicants->first_name.' '.$applicants->middle_name.' '.$applicants->sur_name.' '.$applicants->suffix);
        $html = '<style>
                #text{text-align:justify;line-height:2.5;}
                </style>
                <table style="width:100%;">
                    <tbody>
                        <tr><td colspan="5"><b>CS Form No. 32</b></td></tr>
                        <tr><td colspan="5">&nbsp;</td></tr>
                        <tr><td colspan="5"><center><b>REPUBLIC OF THE PHILIPPINES</b></center></td></tr>
                        <tr><td colspan="5"><center><b>Department of Education</b></center></td></tr>
                        <tr><td colspan="5"><center><b>Division of General Trias City</b></center></td></tr>
                        <tr><td colspan="5">&nbsp;</td></tr>
                        <tr><td colspan="5">&nbsp;</td></tr>
                        <tr><td colspan="5"><center><b>OATH OF OFFICE</b></center></td></tr>
                        <tr><td colspan="5">&nbsp;</td></tr>
                        <tr>
                            <td colspan="5" id="text">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I, <u><b>&nbsp;'.$fullname.'&nbsp;</b></u> of <u><b>&nbsp;'.strtoupper($applicants->address).'&nbsp;</b></u> having been appointed to the position of
                            <u><b>&nbsp;'.strtoupper($applicants->position).'&nbsp;</b></u> hereby solemnly swear, that I will faithfully discharge to the best of my ability, the duties of my
                            present position and of all others that I may hereafter hold under the Republic of the Philippines; that I will bear true faith and allegiance to the same; that I will obey
                            the laws, legal orders, and decrees promulgated by the duly constituted authorities of the Republic of the Philippines; and that I impose this obligation upon myself voluntary,
                            without mental reservation or purpose of evasion.
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5" id="text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SO HELP ME GOD.</td>
                        </tr>
                        <tr><td colspan="5">&nbsp;</td></tr>
                        <tr>
                            <td colspan="3">&nbsp;</td>
                            <td colspan="2">
                                <center><u>&nbsp;&nbsp;<b>'.$fullname.'</b>&nbsp;&nbsp;</u></center>
                                <center><small>(Signature over Printed Name of the Appointee)</small></center>
                            </td>
                        </tr>
                        <tr><td colspan="5">&nbsp;</td></tr>
                        <tr><td colspan="5">Government ID : '.$applicants->government_id.'</td></tr>
                        <tr><td colspan="5">ID Number : '.$applicants->id_number.'</td></tr>
                        <tr><td colspan="5">Date Issued : '.date('m/d/Y',strtotime($applicants->date_issued)).'</td></tr>
                        <tr><td colspan="5">&nbsp;</td></tr>
                        <tr><td colspan="5"><hr/></td></tr>
                        <tr>
                            <td colspan="5">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Subscribed and sworn to before me this <u>&nbsp;'.$date->format('jS').'&nbsp;</u> day of <u>&nbsp;'.date('F, Y',strtotime(now())).'&nbsp;</u> in GENERAL TRIAS CITY, PHILIPPINES.
                            </td>
                        </tr>
                        <tr><td colspan="5">&nbsp;</td></tr>
                        <tr><td colspan="5">&nbsp;</td></tr>
                        <tr>
                            <td colspan="3">&nbsp;</td>
                            <td colspan="2">
                                <center><u>&nbsp;&nbsp;<b>Luis “Jon-Jon” Alandy Ferrer IV</b>&nbsp;&nbsp;</u></center>
                                <center><small>Municipal Mayor</small></center>
                            </td>
                        </tr>
                    </tbody>
                </table>';
        // Load HTML directly into Dompdf
        $pdf = Pdf::loadHTML($html);
        $pdf->setPaper('A4', 'portrait');
        // Stream or download
        return $pdf->download('form-32.pdf');
    }

    public function exportForm4($id)
    {
        $date = Carbon::now();
        $applicants = Applicant::where('applicant_id',$id)->first();
        $fullname = strtoupper($applicants->first_name.' '.$applicants->middle_name.' '.$applicants->sur_name.' '.$applicants->suffix);
        $assignment = Assignment::where('applicant_id',$id)->first();
        $school = Schools::where('school_id',$assignment->school_id)->first();
        $html = '<style>
                #text{text-align:justify;line-height:2.5;}
                </style>
                <table style="width:100%;">
                    <tbody>
                        <tr><td colspan="5"><b>CS Form No. 4</b></td></tr>
                        <tr><td colspan="5">&nbsp;</td></tr>
                        <tr><td colspan="5"><center><b>REPUBLIC OF THE PHILIPPINES</b></center></td></tr>
                        <tr><td colspan="5"><center><b>Department of Education</b></center></td></tr>
                        <tr><td colspan="5">&nbsp;</td></tr>
                        <tr><td colspan="5">&nbsp;</td></tr>
                        <tr><td colspan="5"><center><b>CERTIFICATION OF ASSUMPTION TO DUTY</b></center></td></tr>
                        <tr><td colspan="5">&nbsp;</td></tr>
                        <tr>
                            <td colspan="5" id="text">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This is to certify that Ms/Mr <u><b>&nbsp;'.$fullname.'&nbsp;</b></u> has assumed the duties and responsibilities as
                            <u>&nbsp;'.strtoupper($applicants->position).'&nbsp;</u> &nbsp;of&nbsp; <u>&nbsp;'.strtoupper($school->school_name).'&nbsp;</u>
                            effective <u>&nbsp;'.date('F d, Y',strtotime(now())).'&nbsp;</u>.
                            </td>
                        </tr>
                        <tr><td colspan="5">&nbsp;</td></tr>
                        <tr>
                            <td colspan="5" id="text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This certification is issued in connection with the issuance of the appointment of Ms/Mr
                            <u>&nbsp;'.strtoupper($applicants->sur_name).'&nbsp;</u> as <u>&nbsp;'.strtoupper($applicants->position).'&nbsp;</u>.
                            </td>
                        </tr>
                        <tr><td colspan="5">&nbsp;</td></tr>
                        <tr>
                            <td colspan="5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Done this <u>&nbsp;'.$date->format('jS').'&nbsp;</u> day of <u>&nbsp;'.date('F, Y',strtotime(now())).'&nbsp;</u> in <u>GENERAL TRIAS CITY</u></td>
                        </tr>
                        <tr><td colspan="5">&nbsp;</td></tr>
                        <tr><td colspan="5">&nbsp;</td></tr>
                        <tr>
                            <td colspan="3">&nbsp;</td>
                            <td colspan="2">
                                <center><u>&nbsp;&nbsp;<b>'.$school->principal.'</b>&nbsp;&nbsp;</u></center>
                                <center><small>'.$school->designation.'</small></center>
                            </td>
                        </tr>
                        <tr><td colspan="5">&nbsp;</td></tr>
                        <tr><td colspan="5">&nbsp;</td></tr>
                        <tr><td colspan="5">Date : '.date('F d, Y',strtotime(now())).'</td></tr>
                        <tr><td colspan="5">&nbsp;</td></tr>
                        <tr><td colspan="5">Attested by :</td></tr>
                        <tr><td colspan="5">&nbsp;</td></tr>
                        <tr><td colspan="5">&nbsp;</td></tr>
                        <tr>
                            <td colspan="2">
                                <center><u>&nbsp;&nbsp;<b>ALMA C. CRUZADA</b>&nbsp;&nbsp;</u></center>
                                <center><small>Administrative Officer V</small></center>
                            </td>
                            <td colspan="3">&nbsp;</td>
                        </tr>
                    </tbody>
                </table>';
        // Load HTML directly into Dompdf
        $pdf = Pdf::loadHTML($html);
        $pdf->setPaper('A4', 'portrait');
        // Stream or download
        return $pdf->download('form-4.pdf');
    }

    public function exportForm33B($id)
    {

    }

    public function exportForm1($id)
    {

    }
}