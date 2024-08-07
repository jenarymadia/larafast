<?php

namespace App\Livewire\ClientJob;

use App\Models\ClientJob;
use App\Models\Status;
use Illuminate\Support\Facades\Log;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Create extends Component
{
    use LivewireAlert; // Use this trait for SweetAlerts

    public $title;
    public $client_name;
    public $address;
    public $schedule_date;
    public $schedule_time;
    public $duration;
    public $price;
    public $staff_id;
    public $status;
    public $notes;
    public $transaction_statuses;

    protected $rules = [
        'title' => 'required|string|max:255',
        'client_name' => '',
        'address' => 'required',
        'schedule_date' => 'required',
        'schedule_time' => 'required|string|max:255',
        'duration' => 'required|string|max:255',
        'price' => 'required|string|max:255',
        'staff_id' => '',
        'status' => 'required',
        'notes' => 'required'
    ];

    public function mount()
    {
        $this->transaction_statuses = Status::where('module', 'jobs')->get();
    }

    public function store() {

        $validatedData = $this->validate();

        ClientJob::create($validatedData);

        // Use this for SweetAlerts
        $this->alert('success', __('Job successfully created'), [
            'toast' => false,
            'position' => 'center',
            'timer' => 2000, // Optional: Set timer for auto-dismissal
        ]);

        // Redirect after showing the alert
        return redirect()->to('/jobs');
    }

    public function render()
    {
        return view('livewire.client-job.create');
    }

}
