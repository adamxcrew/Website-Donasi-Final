<?php

namespace App\Http\Livewire\Admin\Donasi;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\Donasi;
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
        $this->orderable         = (new Donasi())->orderable;
    }

    public function render()
    {
        $query = Donasi::with(['programDonasi'])->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $donasis = $query->paginate($this->perPage);

        return view('livewire.admin.donasi.index', compact('query', 'donasis'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('donasi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Donasi::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(Donasi $donasi)
    {
        abort_if(Gate::denies('donasi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $donasi->delete();
    }
}
