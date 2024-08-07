<?php

namespace App\Livewire\ClientJob;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\ClientJob;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Illuminate\Database\Eloquent\Builder;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class DataTable extends DataTableComponent
{
    use LivewireAlert;

    protected $model = ClientJob::class;
    public $title = "title";

    public function builder(): Builder
    {
        return ClientJob::query()
            ->where("user_id", Auth::id());
    }

    public array $bulkActions = [
        'deleteSelected' => 'Delete Selected',
    ];

    public function configure(): void
    {
        $this->setPrimaryKey('id')
        ->setTableRowUrl(function($row) {
            return route('jobs.edit', $row);
        });
    }

    public function columns(): array
    {
        $statuses = Status::where('module', 'jobs')->get();

        return [
            Column::make("Id", "id")
                ->hideIf(true),
            Column::make("Job Title", "title")
                ->sortable(),
            Column::make("Address", "address")
                ->sortable(),
            Column::make("Address", "address")
                ->sortable(),
            Column::make('Status')
                ->format(
                    function($value, $row, Column $column) use ($statuses) {
                        $status_key = $statuses->where('value', $value)->first()->key;
                        return "<span class='inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20'>$status_key</span>";
                    }
                )->html(),
            Column::make("Schedule", "schedule_date")
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
            session()->flash('error', 'No jobs selected for deletion.');
            return;
        }

        // Delete selected clients
        Client::whereIn('id', $this->selected)->delete();

        // Clear the selected array
        $this->clearSelected();

        // Provide feedback
        $this->alert('success', __('Job successfully deleted'), [
            'toast' => false,
            'position' => 'center',
            'timer' => 2000, // Optional: Set timer for auto-dismissal
        ]);
    }
}
