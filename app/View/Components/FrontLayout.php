<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;

class FrontLayout extends Component
{
    public $title;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = null)
    {
        //
        // if title = null return config('app.name')
        $this->title = $title ?? config('app.name');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $main_categories = Category::where('status', '=', 'active')->get();

        return view('frontend.layouts.front', compact('main_categories'));
    }
}