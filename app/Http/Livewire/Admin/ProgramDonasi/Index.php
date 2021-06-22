<?php

namespace App\Http\Livewire\Admin\ProgramDonasi;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\ProgramDonasi;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use WithSorting;
    use WithConfirmation;

    public int $perPage;

    public array $orderable;

    public string $search = '';

    public array $selected = [];

    public array $paginationOptions;

    protected $queryString = [
        'search' => [
            'except' => '',
        ],
        'sortBy' => [
            'except' => 'id',
        ],
        'sortDirection' => [
            'except' => 'asc',
        ],
    ];

    public function getSelectedCountProperty()
    {
        return count($this->selected);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function resetSelected()
    {
        $this->selected = [];
    }

    public function mount()
    {
        $this->sortBy            = 'id';
        $this->sortDirection     = 'asc';
        $this->perPage           = 25;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable         = (new ProgramDonasi())->orderable;
    }

    public function render()
    {
        $query = ProgramDonasi::with(['user', 'rekening'])->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $programDonasis = $query->paginate($this->perPage);

        return view('livewire.admin.program-donasi.index', compact('query', 'programDonasis'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('program_donasi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        ProgramDonasi::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(ProgramDonasi $programDonasi)
    {
        abort_if(Gate::denies('program_donasi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $programDonasi->delete();
    }
}
