<?php

namespace App\Http\Livewire\Admin;

use App\Models\Slider;
use Livewire\Component;

class AdminSliderComponent extends Component
{

    public function deleteslide($slide_id)
    {
        $slide = Slider::find($slide_id);

        if ($slide->image) {
            unlink('images/slider' . '/' . $slide->image);
        }

        $slide->delete();
        session()->flash('message', 'Slide has beed deleted succesfully');
    }

    public function render()
    {
        $slides = Slider::paginate(5);
        return view('livewire.admin.admin-slider-component', [
            'slides' => $slides
        ])->layout('layouts.base');
    }
}
