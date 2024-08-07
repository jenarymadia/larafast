<?php

namespace App\Livewire\ClientJob;

use App\Models\ClientJob;
use App\Models\Status;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Edit extends Component
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
    public $job;

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

    public function mount(ClientJob $job)
    {
        $this->job = $job;
        $this->title = $job->title;
        $this->client_name = $job->client_name;
        $this->address = $job->address;
        $this->schedule_date = $job->schedule_date;
        $this->schedule_time = $job->schedule_time;
        $this->duration = $job->duration;
        $this->price = $job->price;
        $this->staff_id = $job->staff_id;
        $this->status = $job->status;
        $this->notes = $job->notes;

        $this->transaction_statuses = Status::where('module', 'jobs')->get();
    }

    public function update()
    {
        $validatedData = $this->validate();

        $this->job->update($validatedData);

        // Use this for SweetAlerts
        $this->alert('success', __('Job successfully updated'), [
            'toast' => false,
            'position' => 'center',
            'timer' => 2000, // Optional: Set timer for auto-dismissal
        ]);

        // Redirect after showing the alert
        return redirect()->route('jobs.index'); // Change 'jobs.index' to the appropriate route
    }

    public function render()
    {
        return view('livewire.client-job.edit');
    }
}
