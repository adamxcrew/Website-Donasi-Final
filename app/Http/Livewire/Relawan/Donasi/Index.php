<?php

namespace App\Http\Livewire\Relawan\Donasi;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\Donasi;
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
        $query = $query->whereIn('program_donasi_id',function($query){
            $query->select('id')->from('program_donasis')->where('user_id', Auth::id());
        });
        $donasis = $query->paginate($this->perPage);

        return view('livewire.relawan.donasi.index', compact('query', 'donasis'));
    }

    public function deleteSelected()
    {
        Donasi::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(Donasi $donasi)
    {
        $donasi->delete();
    }
}
