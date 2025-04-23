<?php

namespace App\Http\Controllers;

use App\Models\Voter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\VoterRegistered;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\VotersExport;
use Carbon\Carbon;

class VoterController extends Controller
{
    public function create()
    {
        return view('voters.create');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'dob' => ['required', 'date', function ($attribute, $value, $fail) {
                if (Carbon::parse($value)->age < 18) {
                    $fail('You must be at least 18 years old to register.');
                }
            }],
            'mobile' => 'required',
            'email' => 'required|email|unique:voters',
            'address' => 'required',
            'taluk' => 'required',
            'district' => 'required',
            'state' => 'required',
        ]);

        $voter = Voter::create($request->all());

        // Send confirmation email to registered Users
        Mail::to($voter->email)->send(new VoterRegistered($voter));

        
        if ($request->ajax()) {
            return response()->json(['message' => 'Voter registered successfully!']);
        }

        return redirect()->route('voters.index')->with('success', 'Voter registered successfully!');
    }

    public function index(Request $request)
    {
        $query = Voter::query();

        if ($request->district) {
            $query->where('district', $request->district);
        }

        if ($request->state) {
            $query->where('state', $request->state);
        }

        $voters = $query->paginate(10);

        return view('voters.index', compact('voters'));
    }

    public function export()
    {
        try {
            return Excel::download(new VotersExport, 'voters_list.xlsx');
        } catch (Exception $e) {
            Log::error('Error exporting voters', [
                'error' => $e->getMessage(),
            ]);
            return redirect()->back()->with('error', 'Something went wrong while exporting voters!');
        }
    }

    public function show(Voter $voter)
    {
        return view('voters.show', compact('voter'));
    }
}
