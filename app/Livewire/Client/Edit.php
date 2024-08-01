<?php

namespace App\Livewire\Client;

use App\Models\Client;
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
        $this->status = $client->status == 1 ? true : false;
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
            'status' => 'required|boolean',
        ];
    }

    public function update()
    {
        $validatedData = $this->validate();

        $client = Client::findOrFail($this->client_id);
        $client->update($validatedData);

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

