<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PersonalInfo;

class PersonalInfoController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        // dd([
        //     'auth_id' => Auth::id(),
        //     'auth_user' => Auth::user(),
        //     'personalInfo_query' => PersonalInfo::where('user_id', Auth::id())->toSql(),
        //     'personalInfo_result' => PersonalInfo::where('user_id', Auth::id())->first(),
        //     'db_all' => PersonalInfo::all(),
        // ]);

        $personalInfo = PersonalInfo::where('user_id', Auth::id())->first();
        return view('personal-info.index', compact('personalInfo'));
    }

    public function store(Request $request)
    {
        // dd('Store method hit', $request->all());
        $data = $this->validateData($request);
        $userId = Auth::id();
        $data['user_id'] = $userId;
        
        PersonalInfo::updateOrCreate(
            ['user_id' => $userId],
            $data
        );
        
        return redirect()->route('personal-info.index')->with('success', 'Personal Info updated');
    }

    protected function validateData(Request $request): array
    {
        return $request->validate([
            'first_name' => 'required|string',
            'middle_name' => 'nullable|string',
            'last_name' => 'required|string',
            'phone_number' => 'required|string',
            'current_city' => 'nullable|string',
            'street' => 'nullable|string',
            'state' => 'nullable|string',
            'zipcode' => 'nullable|string',
            'country' => 'nullable|string',
            'ethnicity' => 'nullable|string',
            'gender' => 'nullable|string',
            'disability_status' => 'nullable|string',
            'veteran_status' => 'nullable|string',
        ]);
    }
}
