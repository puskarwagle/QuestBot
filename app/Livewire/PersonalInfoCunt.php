<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\PersonalInfo;

class PersonalInfoCunt extends Component
{
    public $first_name = '';
    public $middle_name = '';
    public $last_name = '';
    public $phone_number = '';
    public $current_city = '';
    public $street = '';
    public $state = '';
    public $zipcode = '';
    public $country = '';
    public $ethnicity = '';
    public $gender = '';
    public $disability_status = '';
    public $veteran_status = '';

    protected $rules = [
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
    ];

    public function mount()
    {
        $personalInfo = PersonalInfo::where('user_id', Auth::id())->first();
        
        if ($personalInfo) {
            $this->fill($personalInfo->toArray());
        }
    }

    public function save()
    {
        $validatedData = $this->validate();
        $validatedData['user_id'] = Auth::id();

        $isUpdate = PersonalInfo::where('user_id', Auth::id())->exists();
        
        PersonalInfo::updateOrCreate(
            ['user_id' => Auth::id()],
            $validatedData
        );

        $message = $isUpdate ? 'Personal Info updated' : 'Personal Info created';
        session()->flash('success', $message);
    }

    public function PersonalInfoExists()
    {
        return PersonalInfo::where('user_id', Auth::id())->exists();
    }

    public function render()
    {
        return view('livewire.personal-info-cunt');
    }
}