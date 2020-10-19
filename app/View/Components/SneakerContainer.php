<?php

namespace App\View\Components;

use App\Models\Sneaker;
use Illuminate\View\Component;

class SneakerContainer extends Component
{
    public $sneaker;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Sneaker $sneaker)
    {
        $this->sneaker = $sneaker;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.sneaker-container');
    }
}
