<?php

namespace App\Http\Controllers\Authsle;

use App\Models\Report;
use Illuminate\Http\Request;
use App\Models\BookAppointment;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class SleController extends Controller
{
    //function displays home page for Sle Dashboard
    public function index()
    {
        //get newly approved reports 
        $reports = Report::where('status', 2)->latest()->paginate(5);

        // get newly unapproved reports
        $unapprovedReport = Report::where('status', 0)->latest()->get();

        //get newly approved appointments
        $appointmentNotification = BookAppointment::where('approved', 1)->latest()->get();

        //display dashboard with approved and unapproved reports 
        return view('sle-dashboard', compact(['reports', 'unapprovedReport', 'appointmentNotification']));
    }

    //setting statuses on report
    //function to display reports by getting the report id 
    public function viewReport($id)
    {
        //get report reports made by a student 
        $report = Report::with('student')->find($id);
        //setting report status to viewed
        $report->status = 1;
        $report->save();

        //display report made by student with exact location
        return view('sle.pages.view-report', compact(['report']));
    }

    //function to approve report by getting the report id
    public function  approveReport($id)
    {   //get report by id 
        $report = Report::where('id', $id)->first();

        //set report to true(approved) 
        $report->status = 2;
        //attaching SLE who approved report 
        $report->sle_id = Auth::id();
        //after setting report to true - save report
        $report->save();

        // after saving report redirect back with success message
        return  redirect()->route('sle.dashboard')->with('status', 'Report Approved Successfully');
    }

    //reject report function
    public function rejectReport($id)
    {
        //get report by id 
        $report = Report::where('id', $id)->first();

        //set report to true(approved) 
        $report->status = 3;
        //attaching SLE who approved report 
        $report->sle_id = Auth::id();
        //after setting report to null - save report
        $report->save();

        // after saving report redirect back with success message
        return  redirect()->route('sle.dashboard')->with('status', 'Report Rejected!!!');
        
    }

    //function to display book appointment form
    public function showBookAppointment()
    {
        return view('sle.pages.book-appointment');
    }

    //function to book appointment 
    public function bookAppointment(Request $request)
    {
        //validate form data
        $request->validate([
            'purpose' => ['required', 'string', 'max:225'],
            'venue' => ['required', 'string', 'max:225'],
            'date' => ['required', 'date'],
            'description' => ['required', 'string', 'max:225'],
        ]);

        //get form data 
        $user = BookAppointment::create([
            'sle_id' => $request->sle_id,
            'purpose' => $request->purpose,
            'venue' => $request->venue,
            'date' => $request->date,
            'description' => $request->description,
        ]);

        //save form data to database
        event(new Registered($user));

        //after booking appointment redirect back with success message
        return redirect(RouteServiceProvider::HOME_SLE)->with('status', 'Appointment Booked Successfully');
    }

    public function Appointments(){

        //get approved appointments
        $approvedAppointments = BookAppointment::where('approved', 1)->latest()->paginate(5);

        return view('sle.pages.appointment', compact(['approvedAppointments']));
    }
}