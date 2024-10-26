<?php

namespace App\Http\Controllers;

use App\Models\Subscription;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'subscriptions' => Subscription::all()
        ]);
    }
}
