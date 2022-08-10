<?php

namespace App\Http\Livewire;

use App\Models\Body;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Slider;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $categories = ServiceCategory::inRandomOrder()->take(10)->get();
        $slides = Slider::where('status', 1)->latest()->limit(1)->get();
        $bodies = Body::all();
        $services = Service::where('status', 1)->latest()->limit(4)->get();
        return view('livewire.home-component', [
            'categories' => $categories,
            'slides' => $slides,
            'bodies' => $bodies,
            'services' => $services,
        ])->layout('layouts.base');
    }
}
