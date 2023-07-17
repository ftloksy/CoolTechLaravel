<?php

/**
 * Artcle Header Component class.
 * <x-artcle-header />
 * 
 * @global object $artcle 
 *      the artcle's object.
 *      (include title, created, creater ...)
 * @globel string $type
 *      How to display the artcle.
 *      It has two type: full and short
 *          full will complete display the artcle.
 *          short just display the first paragraphs.
 *
 * @author Frankie Chow
 */
namespace App\View\Components;

use Illuminate\View\Component;

class ArtcleHeader extends Component
{
    public object $artcle;
    public string $type;
    
    /**
     * <x-artcle-header> component instance.
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
        return view('components.artcle-header');
    }
}

// EOF

