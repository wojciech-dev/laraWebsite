<?php

namespace App\Http\Livewire\Admin;

use App\Models\Service;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;
use App\Models\ServiceCategory;

class AdminEditServiceComponent extends Component
{
    use WithFileUploads;
    public $service_id;
    public $name;
    public $slug;
    public $service_category_id;
    public $price;
    public $difficulty_level;
    public $image;
    public $thumbnail;
    public $status;

    public $newthumbnail;
    public $newimage;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function mount($service_slug)
    {
        $service = Service::where('slug', $service_slug)->first();
        $this->service_id = $service->id;
        $this->name = $service->name;
        $this->slug = $service->slug;
        $this->service_category_id = $service->service_category_id;
        $this->price = $service->price;
        $this->difficulty_level = $service->difficulty_level;
        $this->image = $service->image;
        $this->thumbnail  = $service->thumbnail;
        $this->status = $service->status;
    }

    protected $rules = [
        'name' => 'required',
        'slug' => 'required',
        'service_category_id' => 'required',
        'price' => 'required',
        'difficulty_level' => 'required',
        'status' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

        if ($this->newthumbnail) {
            $this->validateOnly($propertyName, [
                'newthumbnail' => 'required|mimes:jpg,png,jpeg'
            ]);
        }

        if ($this->newimage) {
            $this->validateOnly($propertyName, [
                'newimage' => 'required|mimes:jpg,png,jpeg'
            ]);
        }
    }

    public function updateService()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'service_category_id' => 'required',
            'price' => 'required',
            'difficulty_level' => 'required',
            'status' => 'required',
        ]);

        if ($this->newthumbnail) {
            $this->validate([
                'newthumbnail' => 'required|mimes:jpg,png,jpeg'
            ]);
        }

        if ($this->newimage) {
            $this->validate([
                'newimage' => 'required|mimes:jpg,png,jpeg'
            ]);
        }

        $service = Service::find($this->service_id);
        $service->name = $this->name;
        $service->slug = $this->slug;
        $service->service_category_id = $this->service_category_id;
        $service->price = $this->price;
        $service->difficulty_level = $this->difficulty_level;
        $service->status = $this->status;

        if ($this->newthumbnail) {
            unlink('images/services/thumbnails' . '/' . $service->thumbnail);
            $imageName = Carbon::now()->timestamp . '.' . $this->newthumbnail->extension();
            $this->newthumbnail->storeAs('services', $imageName);
            $service->thumbnail = $imageName;
        }

        if ($this->newimage) {
            unlink('images/services' . '/' . $service->image);
            $imageName2 = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            $this->newimage->storeAs('services/thumbnails', $imageName2);
            $service->image = $imageName2;
        }


        $service->save();
        session()->flash('message', 'Services has beed updated successfully');
    }

    public function render()
    {
        $categories = ServiceCategory::all();
        return view('livewire.admin.admin-edit-service-component', [
            'categories' => $categories
        ])->layout('layouts.base');
    }
}
