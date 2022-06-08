<?php

namespace App\View\Components\Home;

use Illuminate\View\Component;

class ProductList extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $products;
    public $title;
    public function __construct($title,$products)
    {
        $this->title=$title;
        $this->products=$products;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.home.product-list');
    }
}
