<?php

namespace App\Livewire;

use App\Models\Subscription;
use Livewire\Component;

class CreateSubscription extends Component
{
    public $subscription_type;
    public $station_id;
    public $phone_number;
    public $start_time;
    public $end_time;
    public $weekdays = null;
    public $weekends = null;

    protected $rules = [
        'station_id' => 'required|string',
        'phone_number' => 'required|string',
        'start_time' => 'required',
        'end_time' => 'required',
        'weekdays' => 'required_without:weekends',
        'weekends' => 'required_without:weekdays',
    ];

    protected $messages = [
        'station_id.required' => 'The station id is required',
        'phone_number.required' => 'The phone number is required',
        'start_time.required' => 'The start time is required',
        'end_time.required' => 'The end time is required',
        'weekdays.required_without' => 'You need to select either weekdays or weekends',
        'weekends.required_without' => '',
    ];

    public function mount($station_id)
    {
        $this->station_id = $station_id;
        $this->subscription_type = 'bikes_low_or_offline';
        $this->phone_number = '070';
        $this->start_time = '08:00';
        $this->end_time = '18:00';
    }
    public function submit()
    {
        $this->validate();
        // Ensure station exists
        $subscription =  Subscription::create([
            'subscription_type' => $this->subscription_type,
            'station_id' => $this->station_id,
            'phone_number' => $this->phone_number,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'weekdays' => $this->weekdays ?? false,
            'weekends' => $this->weekends ?? false,
        ]);
        $this->reset();

        session()->flash('message', 'Subscription created successfully.');
    }

    public function render()
    {
        return view('livewire.create-subscription');
    }
}
