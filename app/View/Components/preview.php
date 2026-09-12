<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class preview extends Component
{
    public $photo1, $title1, $discount1, $review1, $price1, $original_price1;
    public function __construct($photo, $title, $discount, $review, $price, $originalPrice = null)
    {
        $this->photo1 = $photo;
        $this->title1 = $title;
        $this->discount1 = $discount;
        $this->review1 = $review;
        $this->price1 = $price;
        $this->original_price1 = $originalPrice;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.preview');
    }
}
