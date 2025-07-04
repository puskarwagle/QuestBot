<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PersonalInfo;

class PersonalInfoController extends Controller
{
    public function index()
    {
        $info = PersonalInfo::where('user_id', Auth::id())->first();
        return view('personal-info.index', compact('info'));
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);

        PersonalInfo::updateOrCreate(
            ['user_id' => Auth::id()],
            $data
        );

        return response()->json(['message' => 'Personal Info updated']);
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
