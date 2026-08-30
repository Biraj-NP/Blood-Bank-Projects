<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EventCard extends Component
{
    /**
     * Create a new component instance.
     */
    public $image, $title , $shorttxt , $location, $startdate, $enddate;
    public function __construct($image,$title,$shorttxt,$location,$startdate,$enddate)
    {
        $this->image = $image;
        $this->title = $title;
        $this->shorttxt = $shorttxt;
        $this->location = $location;
        $this->startdate = $startdate;
        $this->enddate = $enddate;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.event-card');
    }
}
