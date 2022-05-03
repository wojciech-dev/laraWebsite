<?php

namespace App\Http\Livewire;

use App\Models\ServiceCategory;
use App\Models\Slider;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $categories = ServiceCategory::inRandomOrder()->take(10)->get();
        $slides = Slider::where('status', 1)->get();
        return view('livewire.home-component', [
            'categories' => $categories,
            'slides' => $slides
        ])->layout('layouts.base');
    }
}
