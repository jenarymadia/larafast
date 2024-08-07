<?php

namespace App\Livewire\Client;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Client;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ClientTable extends DataTableComponent
{
    use LivewireAlert; 
    
    protected $model = Client::class;

    public function builder(): Builder
    {
        return Client::query()
        ->where("user_id", Auth::id());
    }

    public array $bulkActions = [
        'deleteSelected' => 'Delete Selected',
    ];

    public function configure(): void
    {
        $this->setPrimaryKey('id')
        ->setTableRowUrl(function($row) {
            return route('clients.edit', $row);
        });
    }

    public function columns(): array
    {
        $statuses = Status::where('module', 'lead')->get();
        return [
            Column::make("Id", "id")
                ->hideIf(true),
            Column::make("First Name", "first_name")
                ->sortable(),
            Column::make("Last Name", "last_name")
                ->sortable(),
            Column::make("Email Address", "email")
                ->sortable(),
            Column::make("Phone Number", "mobile_no")
                ->sortable(),
            Column::make('Status')
            ->format(
                function($value, $row, Column $column) use ($statuses) {
                    $status_key = $statuses->where('value', $value)->first()->key;
                    return "<span class='inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20'>$status_key</span>";
                }
            )->html(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }

    public function deleteSelected()
    {
        // Ensure there are selected clients
        if (empty($this->getSelected())) {
            session()->flash('error', 'No clients selected for deletion.');
            return;
        }

        // Delete selected clients
        Client::whereIn('id', $this->selected)->delete();

        // Clear the selected array
        $this->clearSelected();

        // Provide feedback
        $this->alert('success', __('Client successfully deleted'), [
            'toast' => false,
            'position' => 'center',
            'timer' => 2000, // Optional: Set timer for auto-dismissal
        ]);
    }
}
