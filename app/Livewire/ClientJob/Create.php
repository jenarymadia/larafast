<?php

namespace App\Livewire\ClientJob;

use App\Models\ClientJob;
use App\Models\JobAttachment;
use App\Models\Status;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use LivewireAlert, WithFileUploads; // Use this trait for SweetAlerts

    public $title;
    public $client_name;
    public $address;
    public $schedule_date;
    public $schedule_time;
    public $duration;
    public $price;
    public $staff_id;
    public $status = 1;
    public $notes;
    public $transaction_statuses;
    public $files;

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
        'notes' => 'required',
        'files.*' => 'file|mimes:jpg,png,pdf,mp4,tiff,mov,h264|max:10240',
    ];

    public function mount()
    {
        $this->transaction_statuses = Status::where('module', 'jobs')->get();
    }

    public function store() {
        $validatedData = $this->validate();

        $clientJob = ClientJob::create(Arr::except($validatedData, ['files']));
 
        foreach ($this->files as $file) {
            $filePath = $file->store('job-files/'.$clientJob->id);
            // Create a record in the ClientFile table
            JobAttachment::create([
                'client_job_id' => $clientJob->id,
                'file_path' => Storage::url($filePath),
                'file_name' => $file->getClientOriginalName(),
                'file_type' => $file->getClientMimeType(),
            ]);
        }

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
