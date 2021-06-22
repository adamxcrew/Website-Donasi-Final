<?php

namespace App\Http\Livewire\Admin\ProgramBerita;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\ProgramBerita;
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
            'except' => 'desc',
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
        $this->sortDirection     = 'desc';
        $this->perPage           = 25;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable         = (new ProgramBerita())->orderable;
    }

    public function render()
    {
        $query = ProgramBerita::with(['programDonasi'])->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $programBeritas = $query->paginate($this->perPage);

        return view('livewire.admin.program-berita.index', compact('query', 'programBeritas', 'programBerita'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('program_berita_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        ProgramBerita::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(ProgramBerita $programBerita)
    {
        abort_if(Gate::denies('program_berita_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $programBerita->delete();
    }
}
