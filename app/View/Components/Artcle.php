<?php

namespace App\View\Components;

use Illuminate\View\Component;

/**
 * Artcle Component class.
 * <x-artcle />
 * @global object $artcle 
 *      the artcle's object.
 *      (include content, category, tag ...)
 * @globel string $type
 *      How to display the artcle.
 *      It has two type: full and short
 *          full will complete display the artcle.
 *          short just display the first paragraphs.
 *  
 * @author Frankie Chow
 */
class Artcle extends Component
{
    public object $artcle;
    public string $type;
    
    /**
     * <x-artcle> component instance.
     * show the artcle post content
     * 
     * @param $artcle from database's blog_posts record.
     * @param $type now type maybe has two type: "full", "short"
     * @return void
     */
    public function __construct( ?object $artcle, string $type )
    {
      $this->artcle = $artcle;
      $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.artcle');
    }
}

// EOF

