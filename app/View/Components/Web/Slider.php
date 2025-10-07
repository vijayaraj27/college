<?php

namespace App\View\Components\Web;

use Illuminate\View\Component;

class Slider extends Component
{
    public $sliders;
    public $department;
    public $defaultTitle;
    public $defaultSubtitle;
    public $defaultButtonText;
    public $defaultButtonLink;
    public $class;

    /**
     * Create a new component instance.
     *
     * @param mixed $sliders
     * @param mixed $department
     * @param string $defaultTitle
     * @param string $defaultSubtitle
     * @param string $defaultButtonText
     * @param string $defaultButtonLink
     * @param string $class
     */
    public function __construct($sliders = [], $department = null, $defaultTitle = 'Welcome', $defaultSubtitle = 'Excellence in Engineering Education and Research', $defaultButtonText = 'Discover More', $defaultButtonLink = '#', $class = '')
    {
        $this->sliders = $sliders;
        $this->department = $department;
        $this->defaultTitle = $defaultTitle;
        $this->defaultSubtitle = $defaultSubtitle;
        $this->defaultButtonText = $defaultButtonText;
        $this->defaultButtonLink = $defaultButtonLink;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.web.slider');
    }
}
