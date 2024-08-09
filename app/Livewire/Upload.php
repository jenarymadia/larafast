<?php

namespace App\Livewire;

use App\Models\UploadedFile;
use Livewire\Component;
use Livewire\WithFileUploads;

class Upload extends Component
{
    use WithFileUploads;

    public $photos = [];
    public $savedFiles = [];
    public $isUploading = false;
    public $progress = 0;

    public function mount()
    {
        // Retrieve previously uploaded files
        $this->savedFiles = UploadedFile::all();
    }

    public function updatedPhotos()
    {
        foreach ($this->photos as $photo) {
            $path = $photo->store('uploads');
            // Save the file info in the database
            UploadedFile::create([
                'file_name' => $photo->getClientOriginalName(),
                'file_path' => $path,
            ]);
        }

        // Refresh the saved files list
        $this->savedFiles = UploadedFile::all();
    }

    public function uploadFiles()
    {
        foreach ($this->photos as $photo) {
            $path = $photo->store('uploads');
            // Save the file info in the database
            UploadedFile::create([
                'file_name' => $photo->getClientOriginalName(),
                'file_path' => $path,
            ]);
        }

        // Refresh the saved files list
        $this->savedFiles = UploadedFile::all();

        // Clear the photos array and reset the upload state
        $this->photos = [];
        $this->isUploading = false;
        $this->progress = 0;
    }

    public function errorUpload()
    {
        $this->isUploading = false;
        // Handle upload error (optional logging or user notification)
    }

    public function progressUpload($progress)
    {
        $this->progress = $progress;
    }

    public function render()
    {
        return view('livewire.upload');
    }
}
