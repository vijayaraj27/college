<?php

namespace App\View\Components\Web;

use Illuminate\View\Component;

class Breadcrumb extends Component
{
    public $title;
    public $items;
    public $background;
    public $class;

    /**
     * Create a new component instance.
     *
     * @param string $title
     * @param array $items
     * @param string $background
     * @param string $class
     */
    public function __construct($title = '', $items = [], $background = 'linear-gradient(135deg, #2c5aa0 0%, #1e3a8a 100%)', $class = '')
    {
        $this->title = $title;
        $this->items = $items;
        $this->background = $background;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.web.breadcrumb');
    }
}
