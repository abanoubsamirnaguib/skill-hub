<?php

namespace App\View\Components;

use Illuminate\View\Component;
use  App\Models\cat;

class navComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        
        $cats=cat::select("name", "id")->Active()->get();
        return view('components.nav-Component'
        , ['cats' => $cats]
    );
    }

}
