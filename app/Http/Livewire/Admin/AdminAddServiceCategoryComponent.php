<?php

namespace App\Http\Livewire\Admin;

use App\Models\ServiceCategory;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminAddServiceCategoryComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $image;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function createNewCategory()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:10000',
        ]);

        $category = new ServiceCategory();
        $category->name = $this->name;
        $category->slug = $this->slug;

        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('categories', $imageName);
        $category->image = $imageName;
        $category->save();
        session()->flash('message', 'Category has been created success');
        $this->reset();
    }

    public function render()
    {

        return view('livewire.admin.admin-add-service-category-component')->layout('layouts.base');
    }
}
