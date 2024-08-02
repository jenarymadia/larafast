<?php

namespace App\Livewire\Client;

use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithPagination;

class ClientTable extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'first_name';
    public $sortDirection = 'asc';
    public $selected = [];
    public $selectAll = false;

    protected $updatesQueryString = ['search', 'sortField', 'sortDirection'];

    protected $listeners = ['performSearch'];

    public function render()
    {
        $clients = $this->getClients()->paginate(5);

        return view('livewire.client.client-table', [
            'clients' => $clients,
        ]);
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function toggleSelectAll()
    {   
        $clients = $this->getClients()->paginate(5);

        $this->selectAll = !$this->selectAll;
        $this->selected = $this->selectAll ? $clients->pluck('id')->toArray() : [];
        Log::info($this->selected);
        Log::info($this->selectAll);
    }

    public function toggleSelection($clientId)
    {
        if (in_array($clientId, $this->selected)) {
            // Remove client from selection
            $this->selected = array_diff($this->selected, [$clientId]);
        } else {
            // Add client to selection
            $this->selected[] = $clientId;
        }

        // If all items were selected but one is deselected, update `selectAll` status
        if (count($this->selected) === $this->getClients()->count()) {
            $this->selectAll = true;
        } else {
            $this->selectAll = false;
        }

        Log::info($this->selected);
        Log::info($this->selectAll);
    }

    public function updatedSelected($value)
    {
        if ($this->selectAll) {
            $this->selectAll = false;
        }
    }

    public function deleteSelected()
    {
        Client::whereIn('id', $this->selected)->delete();
        $this->selected = [];
    }

    public function performSearch()
    {
        // Search is handled directly through the $search property
    }

    private function getClients()
    {
        return Auth::user()->clients()
            ->when($this->search, function($query) {
                $query->where('first_name', 'like', '%' . $this->search . '%')
                      ->orWhere('last_name', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%')
                      ->orWhere('mobile_no', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->sortField, $this->sortDirection);
    }
}
