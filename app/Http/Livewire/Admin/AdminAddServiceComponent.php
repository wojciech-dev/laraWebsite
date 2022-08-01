<?php

namespace App\Http\Livewire\Admin;

use App\Models\Service;
use App\Models\ServiceCategory;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;

class AdminAddServiceComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $service_category_id;
    public $content;
    public $street;
    public $price;
    public $calories;
    public $estimated_elivery;
    public $difficulty_level;
    public $image;
    public $thumbnail;
    public $description;
    public $status;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    protected $rules = [
        'name' => 'required',
        'image' => 'mimes:png,jpg,jpeg|max:10000',
        'thumbnail' => 'mimes:png,jpg,jpeg|max:10000',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function createNewService()
    {
        $this->validate([
            'name' => 'required',
            'image' => 'nullable|mimes:png,jpg,jpeg|max:10000',
            'thumbnail' => 'nullable|mimes:png,jpg,jpeg|max:10000',
        ]);

        $service = new Service();
        $service->name = $this->name;
        $service->slug = $this->slug;
        $service->service_category_id = $this->service_category_id;
        $service->content = $this->content;
        $service->street = $this->street;
        $service->price = $this->price;
        $service->calories = $this->calories;
        $service->estimated_elivery = $this->estimated_elivery;
        $service->difficulty_level = $this->difficulty_level;
        $service->description = $this->description;
        $service->status = $this->status;

        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('services', $imageName);
        $service->image = $imageName;

        $imageName2 = Carbon::now()->timestamp . '.' . $this->thumbnail->extension();
        $this->thumbnail->storeAs('services/thumbnails', $imageName2);
        $service->thumbnail = $imageName2;

        $service->save();
        session()->flash('message', 'Services has beed created successfully');
        $this->reset();
    }

    public function render()
    {
        $categories = ServiceCategory::all();
        return view('livewire.admin.admin-add-service-component', [
            'categories' => $categories
        ])->layout('layouts.base');
    }
}
