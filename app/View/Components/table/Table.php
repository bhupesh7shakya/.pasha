<?php

namespace App\View\Components\Table;

use Illuminate\View\Component;

class Table extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $tableHeaders;
    public function __construct($tableHeaders)
    {
        $this->tableHeaders = $tableHeaders;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table.table');
    }
}
