<?php

namespace App\View\Components\Web;

use Illuminate\View\Component;

class QuickNavigation extends Component
{
    public $items;
    public $title;
    public $class;

    /**
     * Create a new component instance.
     *
     * @param array $items
     * @param string $title
     * @param string $class
     */
    public function __construct($items = [], $title = 'Details', $class = '')
    {
        $this->items = $items;
        $this->title = $title;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.web.quick-navigation');
    }
}
