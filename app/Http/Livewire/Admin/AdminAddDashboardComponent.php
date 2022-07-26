<?php

namespace App\Http\Livewire\Admin;

use App\Models\Body;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;

class AdminAddDashboardComponent extends Component
{

    use WithFileUploads;
    public $name;
    public $title;
    public $image;
    public $content;
    public $more = 0;


    public function addNewBodies()
    {
        $this->validate([
            'name' => 'required',
            'title' => 'required',
            'image' => 'mimes:png,jpg,jpeg|max:10000',
        ]);

        $body = new Body();
        $body->title = $this->title;
        $body->name = $this->name;
        $body->content = $this->content;
        $body->more = $this->more ?? 1;

        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('body', $imageName);
        $body->image = $imageName;
        $body->save();
        session()->flash('message', 'Body has beed created successfully');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.admin-add-dashboard-component')->layout('layouts.base');
    }
}
