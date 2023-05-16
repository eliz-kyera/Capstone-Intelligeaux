<?php

namespace App\Http\Controllers\Authstd;

use App\Models\Report;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class StudentController extends Controller
{
    //function displays home page for Student Dashboard
     public function index(){
        
        $reports = Report::where('student_id', Auth::id())->latest()->paginate(5);

        //return dashboard with created reports
        return view('std-dashboard', compact(['reports']));
     }

    //function to make report
     public function create(Request $request){
        //validate form data
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'image' => ['required', 'image','mimes:png,jpg,jpeg', 'max:5048'],
            'description' => ['required', 'string', 'max:255'],
        ]);
        //get extension of image
        $image_ext = $request->image->getClientOriginalExtension();
        //get current date
        $date = date('Y-m-d');
        $image_name = $date. '_'. rand(0,999).  '.' . $image_ext;
        //save image to public/images folder
        $request->image->move(public_path('images'), $image_name);

        //current geolocation
        $lat = $request->latitude;
        $lng = $request->longitude;

        //get form data
        $user = Report::create([
            'student_id' => $request->student_id,
            'title' => $request->title,
            'image' => $image_name,
            'description' => $request->description,
            'latitude' => $lat,
            'longitude' => $lng,
            
        ]);
        //save report to database
        event(new Registered($user));
        //after saving report redirect back with success message
        return redirect(RouteServiceProvider::HOME_STD)->with('status', 'Fire Report Submitted Successfully');

     }
}