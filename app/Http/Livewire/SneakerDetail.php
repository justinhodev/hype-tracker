<?php

namespace App\Http\Livewire;

use App\Models\Sneaker;
use Livewire\Component;

class SneakerDetail extends Component
{
    public $sneaker;

    public function render()
    {
        return view('livewire.sneaker-detail')
            ->extends('layouts.app');
    }

    public function mount(Sneaker $sneaker)
    {
        $this->sneaker = $sneaker;
    }
}
