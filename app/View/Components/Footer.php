<?php

namespace App\View\Components;

use Illuminate\View\Component;

/**
 * Footer Component class.
 * <x-footer />
 * 
 * @author Frankie Chow
 * @global string $current_year ( Current Year )
 * @global string $next_year ( Next Year )
 * 
 */
class Footer extends Component
{
    // find this current year and nex year for copyright.
    public string $current_year;
    public string $next_year;
    /**
     * webpage's footer
     *
     * @return void
     */
    public function __construct()
    {
        $this->current_year = date('Y');
        $this->next_year = $this->current_year + 1;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.footer');
    }
}

// EOF

