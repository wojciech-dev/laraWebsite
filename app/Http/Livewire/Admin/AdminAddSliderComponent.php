<?php

namespace App\Http\Livewire\Admin;

use App\Models\Slider;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddSliderComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $image;
    public $status = 0;


    public function addNewSlide()
    {
        $this->validate([
            'title' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:10000',
        ]);

        $slide = new Slider();
        $slide->title = $this->title;

        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('slider', $imageName);
        $slide->image = $imageName;
        $slide->status = $this->status;
        $slide->save();
        session()->flash('message', 'Slide has beed created successfully');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.admin-add-slider-component')->layout('layouts.base');
    }
}
