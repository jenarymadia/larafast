<?php

namespace App\Livewire\Client;

use App\Models\Client;
use App\Models\ClientTag;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Edit extends Component
{
    use LivewireAlert; // Use this trait for SweetAlerts

    public $client_id;
    public $first_name;
    public $last_name;
    public $email;
    public $mobile_no;
    public $street_address;
    public $city;
    public $region;
    public $postal_code;
    public $status;
    public $note;
    public $transaction_statuses;
    public $tags = [];

    public function mount(Client $client)
    {
        $this->client_id = $client->id;
        $this->first_name = $client->first_name;
        $this->last_name = $client->last_name;
        $this->email = $client->email;
        $this->mobile_no = $client->mobile_no;
        $this->street_address = $client->street_address;
        $this->city = $client->city;
        $this->region = $client->region;
        $this->postal_code = $client->postal_code;
        $this->status = $client->status;
        $this->note = $client->note;
        $this->transaction_statuses = Status::where('module', 'lead')->get();
        $this->tags = $client->tags->pluck('tag')->toArray();
    }

    protected function rules()
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clients,email,' . $this->client_id,
            'mobile_no' => 'required|numeric',
            'street_address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'postal_code' => 'required|numeric',
            'status' => 'required',
            'note' => 'required',
        ];
    }

    public function update()
    {
        $validatedData = $this->validate();

        $client = Client::findOrFail($this->client_id);
        $client->update($validatedData);
        $client->tags()->delete();
        foreach ($this->tags as $tag) {
            ClientTag::create([
                'tag' => $tag,
                'client_id' => $client->id,
            ]);
        }

        // Use this for SweetAlerts
        $this->alert('success', __('Client successfully updated'), [
            'toast' => false,
            'position' => 'center',
            'timer' => 2000, // Optional: Set timer for auto-dismissal
        ]);

        // Redirect after showing the alert
        return redirect()->to('/clients');
    }

    public function render()
    {
        return view('livewire.client.edit');
    }
}

