<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Voter;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        $totalVoters = Voter::count();
        $todayRegistered = Voter::whereDate('created_at', Carbon::today())->count();

       return view('home', compact('user', 'totalVoters','todayRegistered'));
    }

    public function votersCreate()
    {
        return view('voters.create');
    }

    public function votersList()
    {
        return view('voters.index');
    }

    
}
