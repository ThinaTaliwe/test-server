<?php

namespace App\View\Components\aside;

use Illuminate\View\Component;

class ClickIcon extends Component
{
    public $link;
    public $class;
    public $text;
    public $icon;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($link = '#', $class = '', $text = '', $icon)
    {
        $this->link = $link;
        $this->class = $class;
        $this->text = $text;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.aside.click-icon');
    }
}
