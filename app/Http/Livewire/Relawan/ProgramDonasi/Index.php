<?php

namespace App\Http\Livewire\Relawan\ProgramDonasi;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\ProgramDonasi;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

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
        $this->perPage           = 10;
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
        $query = $query->where('user_id', Auth::id());
        $programDonasis = $query->paginate($this->perPage);

        return view('livewire.relawan.program-donasi.index', compact('query', 'programDonasis'));
    }

    public function deleteSelected()
    {
        ProgramDonasi::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(ProgramDonasi $programDonasi)
    {
        $programDonasi->delete();
    }
}
