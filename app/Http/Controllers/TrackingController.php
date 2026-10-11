<?php

namespace App\Http\Controllers;

use App\Models\Tracking;
use App\Http\Controllers\Controller;

class TrackingController extends Controller
{
    public function index()
    {
        $trackings = Tracking::with('hotel')->latest()->paginate(15);
        return view('tracking.index', compact('trackings'));
    }
}
