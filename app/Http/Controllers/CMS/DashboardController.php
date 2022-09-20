<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\GaleryModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('CMS.Dashboard');
    }
}
