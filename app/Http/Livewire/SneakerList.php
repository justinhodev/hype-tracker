<?php

namespace App\Http\Livewire;

use App\Models\Sneaker;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class SneakerList extends Component
{
    use WithPagination;

    const PAGINATE_LENGTH = 20;

    public $search = '';

    protected $updatesQueryString = ['search'];

    public function mount(): void
    {
        $this->fill(request()->only('search'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render(): View
    {
        return $this->renderSneakerList();
    }

    public function renderSneakerList(): View
    {
        $sneakers = [];

        if (strlen(trim($this->search)) > 0) {
            $sneakers = Sneaker::where('name', 'LIKE', '%'.$this->search.'%')
                ->paginate(self::PAGINATE_LENGTH);

            return view('livewire.sneaker-list', ['sneakers' => $sneakers]);
        }

        $sneakers = Sneaker::paginate(self::PAGINATE_LENGTH);

        return view('livewire.sneaker-list', ['sneakers' => $sneakers]);
    }
}
