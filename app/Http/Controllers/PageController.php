<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AboutFeature;
use App\Models\Bloodcampaign;
use App\Models\BloodRequest;
use App\Models\BloodStock;
use App\Models\Contact;
use App\Models\Doctor;
use App\Models\Donor;
use App\Models\HospitalInfo;
use App\Models\SmallFeatursOfBloodBank;
use App\Models\Statistics;
use App\Models\UserLogin;
use Illuminate\Http\Request;


class PageController extends BaseController
{
    // HomePage
    function homePage()
    {
        return view('home');
    }

    // About Page
    function aboutPage()
    {
        $about = About::first();
        $aboutFeatures = AboutFeature::all();
        $SmallFeatursOfBloodBank = SmallFeatursOfBloodBank::all();
        return view('about', compact('about', 'aboutFeatures', 'SmallFeatursOfBloodBank'));
    }

    // Campaigns Page
    // function campaignsPage()
    // {
    //     $Bloodcampaigns = Bloodcampaign::all();
    //     $Statisticsdata = Statistics::first();
    //     return view('campaigns', compact('Bloodcampaigns', 'Statisticsdata'));
    // }

    public function campaignsPage()
    {
        $Bloodcampaigns = Bloodcampaign::all();

        $Statisticsdata = Statistics::first();

        // Same data as Filament Campaigns Stat
        $activeCampaigns = Bloodcampaign::count();

        // Live database counts
        $contacts = Contact::count();
        $donors = Donor::count();
        $bloodRequests = BloodRequest::count();

        return view('campaigns', compact(
            'Bloodcampaigns',
            'Statisticsdata',
            'activeCampaigns',
            'contacts',
            'donors',
            'bloodRequests'
        ));
    }


    // Contact Page
    function contactPage()
    {
        return view('contact');
    }

    function contactSave(Request $request)
    {
        $contact = new Contact();

        $contact->full_name = $request->full_name;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
       

        $contact->save();

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }

    // Hospital Page
    function hospitalPage()
    {
        $hospitalInfos = HospitalInfo::first();
        $doctors = Doctor::all();

        return view('hospitals', compact('hospitalInfos', 'doctors'));
    }

    // Search Page
    // public function searchPage(Request $request)
    // {
    //     $bloodStocks = BloodStock::orderBy('id')->get();
    //     return view('search', compact('bloodStocks',));
    // }

    // Search Page - UPDATED with filter logic
    public function searchPage(Request $request)
    {
        // Get verified donors
        $query = Donor::where('is_verified', true)->where('is_active', true);

        // Apply filters
        if ($request->filled('name')) {
            $query->where(function ($q) use ($request) {
                $q->where('first_name', 'LIKE', '%' . $request->name . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $request->name . '%');
            });
        }

        if ($request->filled('blood_group')) {
            $query->where('blood_group', $request->blood_group);
        }

        if ($request->filled('location')) {
            $query->where(function ($q) use ($request) {
                $q->where('province', 'LIKE', '%' . $request->location . '%')
                    ->orWhere('district', 'LIKE', '%' . $request->location . '%')
                    ->orWhere('address', 'LIKE', '%' . $request->location . '%');
            });
        }

        $donors = $query->get();

        // Get blood requests
        $bloodRequests = BloodRequest::orderBy('created_at', 'desc')->limit(10)->get();

        // Get blood stocks for statistics
        $bloodStocks = BloodStock::orderBy('id')->get();

        return view('search', compact('donors', 'bloodRequests', 'bloodStocks'));
    }



    // Donor Register Page
    function donerRegisterPage()
    {
        return view('doner_register');
    }

    // Blood Request Page
    function bloodRequestPage()
    {
        return view('blood_request');
    }

    // Login Page
    function loginPage()
    {
        return view('login');
    }

    function loginuserStore(Request $request)
    {
        $userlogin = UserLogin::where('email', $request->email)->first();

        if (!$userlogin) {

            $userlogin = new UserLogin();

            $userlogin->user_type = $request->user_type;
            $userlogin->email = $request->email;
            $userlogin->password = $request->password;

            $userlogin->save();
        }

        return redirect()->route('home');
    }
}
