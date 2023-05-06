<?php

namespace App\Http\Controllers\Auth;

use App\Models\Report;
use App\Models\Submission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\BookAppointment;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;

class FireDepartmentController extends Controller
{
    public function index()
    {
        //get newly unapproved appointments
        $appointmentNotification = BookAppointment::where('approved', 0)->latest()->get();

        //get newly approved reports 
        $approvedReports = Report::where('status', 2)->latest()->paginate(5);

        return view('dashboard', compact(['approvedReports', 'appointmentNotification']));
    }

    public function Appointments()
    {

        $unapprovedAppointments = BookAppointment::where('approved', 0)->latest()->paginate(5);
        return view('Pages.appointments', compact(['unapprovedAppointments']));
    }

    public function updateAppointment(Request $request)
    {
        $request->validate([
            'appointment_id' => ['required'],
            'date' => ['date'],
            'comment' => ['required', 'string']
        ]);

        $updateAppointment = BookAppointment::where('id', $request->appointment_id);
        $updateAppointment->date = $request->date;
        $updateAppointment->comment = $request->comment;
        $updateAppointment->approved = 1;
        $updateAppointment->save();

        return redirect()->back()->with('status', 'Appointment Approved Successfully');
    }

    public function showApprovedReport($id)
    {

        $approvedReport = Report::with('sle')->find($id);
        // dd($approvedReport);

        $closeReport = Report::with('submission')->find($id);
        // dd($closeReport);

        return view('Pages.view-report', compact(['approvedReport', 'closeReport']));
    }

    public function showSubmittedReport()
    {

        $submittedReport = Submission::where('id', 2)->latest()->paginate(5);

        return view('Pages.submit-report', compact(['submittedReport']));
    }


    public function postSubmittedReport(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:225'],
            'report_id' => ['required'],
            'file_name' => ['required', 'mimes:docx,pdf', 'max:10048'],
        ]);

        $file_ext = $request->file_name->getClientOriginalExtension();
        $file_name = Str::camel(trim($request->title)) . date('Y-m-d') . '.' . $file_ext;

        $request->file_name->move(public_path('reports'), $file_name);

        $closeReport = Report::find($request->report_id);
        $closeReport->status = 4;
        $closeReport->save();

        $user = Submission::create([
            'title' => $request->title,
            'report_id' => $request->report_id,
            'file_name' => $file_name
        ]);

        event(new Registered($user));



        return redirect()->back()->with('status', 'Report Submitted & Closed Successfully');
    }
}