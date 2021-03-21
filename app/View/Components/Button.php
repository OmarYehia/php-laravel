<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public $type;

    public $value;

    public $route;

    public $id;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $value, $route, $id)
    {
        $this->type = $type;
        $this->value = $value;
        $this->route = $route;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button');
    }
}
