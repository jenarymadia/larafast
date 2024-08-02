<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
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
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->hideIf(true),
            LinkColumn::make('Action')
            ->title(fn($row) => 'Edit')
            ->location(fn($row) => route('clients.edit', $row->id))
            ->attributes(fn($row) => [
                'class' => "font-medium text-blue-600 dark:text-blue-500 hover:underline"
            ]),
            Column::make("First Name", "first_name")
                ->sortable(),
            Column::make("Last Name", "last_name")
                ->sortable(),
            Column::make("Email Address", "email")
                ->sortable(),
            Column::make("Phone Number", "mobile_no")
                ->sortable(),
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
        $this->alert('success', __('Client successfully created'), [
            'toast' => false,
            'position' => 'center',
            'timer' => 2000, // Optional: Set timer for auto-dismissal
        ]);
    }
}
