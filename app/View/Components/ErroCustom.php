<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ErroCustom extends Component
{
    public $erro;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($erro)
    {
        $this->erro = $erro;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.erro-custom');
    }
}
