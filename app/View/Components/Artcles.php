<?php

namespace App\View\Components;

use Illuminate\View\Component;

/**
 * Artcle Component class.
 * <x-artcles />
 * It is a group, it will group some artcle component.
 * and past every $artcle to artcle component.
 * 
 * @global object $artcles
 *      the artcles ( artcle group ) object.
 *
 *
 * @author Frankie Chow
 */
class Artcles extends Component
{
    /**
     * <x-artcles> component instance.
     * show the artcles post content ( in one page have five artcle posts. )
     * 
     * @param $artcle from database's blog_posts record.
     * @return void
     */
    public object $artcles;

    public function __construct( object $artcles )
    {
      $this->artcles = $artcles; 
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
      return view('components.artcles');
    }
}

// EOF

