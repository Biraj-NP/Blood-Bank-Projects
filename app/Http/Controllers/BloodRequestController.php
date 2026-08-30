<?php

namespace App\Http\Controllers;

use App\Models\BloodRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BloodRequestController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | BLOOD REQUEST PAGE
    |--------------------------------------------------------------------------
    */

    public function bloodRequest()
    {
        /*
        |--------------------------------------------------------------------------
        | Check Login
        |--------------------------------------------------------------------------
        */

        if (!Auth::check()) {
            return view('blood_request');
        }

        /*
        |--------------------------------------------------------------------------
        | Get Logged In User
        |--------------------------------------------------------------------------
        */

        $user = Auth::user();

        /*
        |--------------------------------------------------------------------------
        | Show Blood Request Page
        |--------------------------------------------------------------------------
        */

        return view(
            'blood_request',
            compact('user')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | SAVE BLOOD REQUEST
    |--------------------------------------------------------------------------
    */

    public function bloodRequestSave(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | Check Login
        |--------------------------------------------------------------------------
        */

        if (!Auth::check()) {
            return redirect()
                ->route('login')
                ->with(
                    'error',
                    'Please login first.'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | Get Logged In User
        |--------------------------------------------------------------------------
        */

        $user = Auth::user();

        /*
        |--------------------------------------------------------------------------
        | Make Sure User Exists
        |--------------------------------------------------------------------------
        */

        if (!$user) {
            return redirect()
                ->route('login')
                ->with(
                    'error',
                    'User account not found.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | Validation
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([

            'phone' => [
                'required',
                'string',
                'max:20',
            ],

            'dob' => [
                'required',
                'date',
            ],

            'gender' => [
                'required',
                'in:Male,Female,Other',
            ],

            'bloodGroup' => [
                'required',
                'in:A+,A-,B+,B-,AB+,AB-,O+,O-',
            ],

            'province' => [
                'required',
                'string',
                'max:100',
            ],

            'district' => [
                'required',
                'string',
                'max:100',
            ],

            'address' => [
                'required',
                'string',
                'max:500',
            ],

            'cause' => [
                'required',
                'string',
                'max:1000',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | Split Logged In User's Name
        |--------------------------------------------------------------------------
        |
        | Example:
        |
        | Ram Bahadur
        |
        | First Name = Ram
        | Last Name  = Bahadur
        |
        */

        $nameParts = explode(
            ' ',
            trim($user->name),
            2
        );

        $firstName = $nameParts[0];

        $lastName = $nameParts[1] ?? '';


        /*
        |--------------------------------------------------------------------------
        | Create Blood Request
        |--------------------------------------------------------------------------
        */

        $bloodRequest = new BloodRequest();


        /*
        |--------------------------------------------------------------------------
        | Login User Data
        |--------------------------------------------------------------------------
        */

        $bloodRequest->first_name = $firstName;

        $bloodRequest->last_name = $lastName;

        $bloodRequest->email = $user->email;


        /*
        |--------------------------------------------------------------------------
        | Login User Password
        |--------------------------------------------------------------------------
        |
        | users table मा भएको already hashed password
        | नै blood_requests table मा राखिन्छ।
        |
        */

        $bloodRequest->password = $user->password;


        /*
        |--------------------------------------------------------------------------
        | Blood Request Form Data
        |--------------------------------------------------------------------------
        */

        $bloodRequest->phone = $validated['phone'];

        $bloodRequest->dob = $validated['dob'];

        $bloodRequest->gender = $validated['gender'];

        $bloodRequest->blood_group = $validated['bloodGroup'];

        $bloodRequest->province = $validated['province'];

        $bloodRequest->district = $validated['district'];

        $bloodRequest->address = $validated['address'];

        $bloodRequest->cause = $validated['cause'];


        /*
        |--------------------------------------------------------------------------
        | Save Blood Request
        |--------------------------------------------------------------------------
        */

        $bloodRequest->save();


        /*
        |--------------------------------------------------------------------------
        | Redirect Home
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('home')
            ->with(
                'success',
                'Blood request submitted successfully!'
            );
    }
}
