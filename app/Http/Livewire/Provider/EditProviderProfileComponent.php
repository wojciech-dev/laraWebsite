<?php

namespace App\Http\Livewire\Provider;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;
use App\Models\ServiceCategory;
use App\Models\ServiceProvider;
use Illuminate\Support\Facades\Auth;

class EditProviderProfileComponent extends Component
{
    use WithFileUploads;
    public $service_provider_id;
    public $image;
    public $about;
    public $city;
    public $service_category_id;
    public $service_locations;
    public $newImage;

    public function mount()
    {
        $provider = ServiceProvider::where('user_id', Auth::user()->id)->first();
        $this->service_provider_id = $provider->id;
        $this->image = $provider->image;
        $this->about = $provider->about;
        $this->city = $provider->city;
        $this->service_category_id = $provider->service_category_id;
        $this->service_locations = $provider->service_locations;
    }

    public function updateProfile()
    {
        $provider = ServiceProvider::where('user_id', Auth::user()->id)->first();

        if ($this->newImage) {
            //unlink('images/providers' . '/' . $slide->image);
            $imageName = Carbon::now()->timestamp . '.' . $this->newImage->extension();
            $this->newImage->storeAs('providers', $imageName);
            $provider->image = $imageName;
        }

        $provider->about = $this->about;
        $provider->city = $this->city;
        $provider->service_category_id = $this->service_category_id;
        $provider->service_locations = $this->service_locations;
        $provider->save();
        session()->flash('message', 'Profile has beed updated successfully');
    }

    public function render()
    {
        $categories = ServiceCategory::all();
        return view('livewire.provider.edit-provider-profile-component', [
            'categories' => $categories
        ])->layout('layouts.base');
    }
}
