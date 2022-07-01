<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RecipeItem extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $slug;
    public $likes;
    public $title;
    public $image;
    public $excerpt;
    public function __construct($slug, $likes, $title, $image, $excerpt)
    {
        $this->slug = $slug;
        $this->likes = $likes == null ? 0 : $likes;
        $this->title = $title;
        $this->image = $image;
        $this->excerpt = $excerpt;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.recipe-item');
    }
}
