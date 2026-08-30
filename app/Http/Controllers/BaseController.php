<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BBMScompany;
use Illuminate\Support\Facades\View;

class BaseController extends Controller
{
    public function __construct()
    {
        $BBMScompanies = BBMScompany::first();

        View::share([
            'BBMScompanies' => $BBMScompanies,
        ]);
    }
}
