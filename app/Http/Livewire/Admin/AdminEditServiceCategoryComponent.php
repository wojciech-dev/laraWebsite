<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;
use App\Models\ServiceCategory;

class AdminEditServiceCategoryComponent extends Component
{
    use WithFileUploads;
    public $category_id;
    public $name;
    public $slug;
    public $image;
    public $newImage;

    public function mount($category_id)
    {
        $category = ServiceCategory::find($category_id);
        $this->category_id = $category_id;
        $this->name = $category->name;
        $this->slug = $category->slug;
        $this->image = $category->image;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function updateServiceCategory()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);

        if ($this->newImage) {
            $this->validate([
                'newImage' => 'required|mimes:png,jpg,jpeg',
            ]);
        }

        $category = ServiceCategory::find($this->category_id);
        $category->name = $this->name;
        $category->slug = $this->slug;

        if ($this->newImage) {
            $imageName = Carbon::now()->timestamp . '.' . $this->newImage->extension();
            $this->newImage->storeAs('categories', $imageName);
            $category->image = $imageName;
        }

        $category->save();
        session()->flash('message', 'Category has been updated successfully');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-service-category-component')->layout('layouts.base');
    }
}
