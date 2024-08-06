<?php

namespace App\Livewire\ClientJob;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\ClientJob;
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
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->hideIf(true),
            Column::make("Job Title", "title")
                ->sortable(),
            Column::make("Address", "address")
                ->sortable(),
            Column::make("Address", "address")
                ->sortable(),
            Column::make("Status", "status")
                ->sortable(),
            Column::make("Schedule", "scheduled_date_time")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}
