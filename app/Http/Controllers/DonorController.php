<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonorController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | DONOR REGISTRATION PAGE
    |--------------------------------------------------------------------------
    */

    public function donorPage()
    {
        /*
        |--------------------------------------------------------------------------
        | Check Login
        |--------------------------------------------------------------------------
        */

        if (!Auth::check()) {
            return redirect()
                ->route('login')
                ->with('error', 'Please login first.');
        }

        /*
        |--------------------------------------------------------------------------
        | Logged In User
        |--------------------------------------------------------------------------
        */

        $user = Auth::user();

        /*
        |--------------------------------------------------------------------------
        | Check Existing Donor
        |--------------------------------------------------------------------------
        */

        $existingDonor = Donor::where(
            'email',
            $user->email
        )->first();

        /*
        |--------------------------------------------------------------------------
        | Already Registered
        |--------------------------------------------------------------------------
        */

        if ($existingDonor) {

            /*
            |--------------------------------------------------------------------------
            | Already Approved
            |--------------------------------------------------------------------------
            */

            if (
                $existingDonor->is_verified &&
                $existingDonor->is_active
            ) {

                return redirect()
                    ->route('home')
                    ->with(
                        'success',
                        'You are already an approved donor.'
                    );
            }

            /*
            |--------------------------------------------------------------------------
            | Waiting For Approval
            |--------------------------------------------------------------------------
            */

            return redirect()
                ->route('home')
                ->with(
                    'success',
                    'Your donor registration is already submitted and is waiting for admin approval.'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | Show Donor Registration Form
        |--------------------------------------------------------------------------
        */

        return view(
            'doner_register',
            compact('user')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | SAVE DONOR REGISTRATION
    |--------------------------------------------------------------------------
    */

    public function donorSave(Request $request)
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
        | Logged In User
        |--------------------------------------------------------------------------
        */

        $user = Auth::user();

        /*
        |--------------------------------------------------------------------------
        | Check Existing Donor
        |--------------------------------------------------------------------------
        */

        $existingDonor = Donor::where(
            'email',
            $user->email
        )->first();

        /*
        |--------------------------------------------------------------------------
        | Already Registered
        |--------------------------------------------------------------------------
        */

        if ($existingDonor) {

            /*
            |--------------------------------------------------------------------------
            | Already Approved
            |--------------------------------------------------------------------------
            */

            if (
                $existingDonor->is_verified &&
                $existingDonor->is_active
            ) {

                return redirect()
                    ->route('home')
                    ->with(
                        'success',
                        'You are already an approved donor.'
                    );
            }

            /*
            |--------------------------------------------------------------------------
            | Waiting For Approval
            |--------------------------------------------------------------------------
            */

            return redirect()
                ->route('home')
                ->with(
                    'success',
                    'You have already registered as a donor. Please wait for admin approval.'
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

        ]);


        /*
        |--------------------------------------------------------------------------
        | Split User Name
        |--------------------------------------------------------------------------
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
        | Create Donor
        |--------------------------------------------------------------------------
        */

        $donor = new Donor();


        /*
        |--------------------------------------------------------------------------
        | User Information
        |--------------------------------------------------------------------------
        */

        $donor->first_name = $firstName;

        $donor->last_name = $lastName;

        $donor->email = $user->email;

        /*
        |--------------------------------------------------------------------------
        | Already Hashed Password
        |--------------------------------------------------------------------------
        */

        $donor->password = $user->password;


        /*
        |--------------------------------------------------------------------------
        | Donor Information
        |--------------------------------------------------------------------------
        */

        $donor->phone = $validated['phone'];

        $donor->dob = $validated['dob'];

        $donor->gender = $validated['gender'];

        $donor->blood_group = $validated['bloodGroup'];

        $donor->province = $validated['province'];

        $donor->district = $validated['district'];

        $donor->address = $validated['address'];


        /*
        |--------------------------------------------------------------------------
        | Donor Status
        |--------------------------------------------------------------------------
        */

        $donor->is_verified = false;

        $donor->is_active = true;


        /*
        |--------------------------------------------------------------------------
        | Save Donor
        |--------------------------------------------------------------------------
        */

        $donor->save();


        /*
        |--------------------------------------------------------------------------
        | Redirect Home
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('home')
            ->with(
                'success',
                'Donor registration submitted successfully! Please wait for admin approval.'
            );
    }
}
