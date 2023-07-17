<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Cookie;

/**
 * BookMark Component class.
 * <x-book-mark />
 *
 * @author Frankie Chow
 */
class BookMark extends Component
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
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $bookmark = Cookie::get("bookmark");
        if ( $bookmark ) {
            return view('components.book-mark', [ "markid" => $bookmark ]);
        } else {
            return view('components.book-mark');
        }
    }
}

// EOF

