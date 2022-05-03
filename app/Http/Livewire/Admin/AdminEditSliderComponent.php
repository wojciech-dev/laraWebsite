<?php

namespace App\Http\Livewire\Admin;

use App\Models\Slider;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;

class AdminEditSliderComponent extends Component
{

    use WithFileUploads;
    public $title;
    public $image;
    public $status = 0;
    public $newImage;

    public function mount($slide_id)
    {
        $slide = Slider::find($slide_id);
        $this->slide_id = $slide_id;
        $this->title = $slide->title;
        $this->image = $slide->image;
        $this->status = $slide->status;
    }


    public function updateSlide()
    {
        $this->validate([
            'title' => 'required',
        ]);

        if ($this->newImage) {
            $this->validate([
                'newImage' => 'required|mimes:png,jpg,jpeg',
            ]);
        }

        $slide = Slider::find($this->slide_id);
        $slide->title = $this->title;

        if ($this->newImage) {
            unlink('images/slider' . '/' . $slide->image);
            $imageName = Carbon::now()->timestamp . '.' . $this->newImage->extension();
            $this->newImage->storeAs('slider', $imageName);
            $slide->image = $imageName;
        }

        $slide->status = $this->status;
        $slide->save();
        session()->flash('message', 'Slide has been updated successfully');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-slider-component')->layout('layouts.base');
    }
}
