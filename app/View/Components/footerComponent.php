<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Setting;

class footerComponent extends Component
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
        $setting =Setting::find(1);
        return view('components.footer-component',['Settings'=>$setting]);
    }
}
