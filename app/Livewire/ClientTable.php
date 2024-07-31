<?php

namespace App\Livewire;

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
        Log::info($this->search);
        $clients = Auth::user()->clients()
            ->when($this->search, function($query) {
                $query->where('first_name', 'like', '%' . $this->search . '%')
                      ->orWhere('last_name', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%')
                      ->orWhere('mobile_no', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.client-table', [
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
        $this->selectAll = !$this->selectAll;
        $this->selected = $this->selectAll ? Client::pluck('id')->toArray() : [];
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
}
