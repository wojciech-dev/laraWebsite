<?php

namespace App\Http\Livewire;

use App\Models\ServiceCategory;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $categories = ServiceCategory::inRandomOrder()->take(10)->get();
        return view('livewire.home-component', [
            'categories' => $categories
        ])->layout('layouts.base');
    }
}
