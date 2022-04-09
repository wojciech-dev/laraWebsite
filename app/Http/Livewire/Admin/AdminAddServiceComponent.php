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
    public $price;
    public $discount_type;
    public $image;
    public $thumbnail;
    public $status;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    protected $rules = [
        'name' => 'required',
        'slug' => 'required',
        'service_category_id' => 'required',
        'price' => 'required',
        'discount_type' => 'required',
        'image' => 'required|mimes:png,jpg,jpeg|max:10000',
        'thumbnail' => 'required|mimes:png,jpg,jpeg|max:10000',
        'status' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function createNewService()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'service_category_id' => 'required',
            'price' => 'required',
            'discount_type' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:10000',
            'thumbnail' => 'required|mimes:png,jpg,jpeg|max:10000',
            'status' => 'required',
        ]);

        $service = new Service();
        $service->name = $this->name;
        $service->slug = $this->slug;
        $service->service_category_id = $this->service_category_id;
        $service->price = $this->price;
        $service->discount_type = $this->discount_type;
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
