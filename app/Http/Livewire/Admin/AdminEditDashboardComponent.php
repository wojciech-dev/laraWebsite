<?php

namespace App\Http\Livewire\Admin;

use App\Models\Body;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;

class AdminEditDashboardComponent extends Component
{

    use WithFileUploads;
    public $name;
    public $title;
    public $newImage;
    public $content;
    public $more;

    public function mount($body_id)
    {
        $body = Body::find($body_id);
        $this->slide_id = $body_id;
        $this->name = $body->name;
        $this->title = $body->title;
        $this->image = $body->image;
        $this->content = $body->content;
        $this->more = $body->more;
    }


    public function updateBodies()
    {
        $this->validate([
            'name' => 'required',
            'title' => 'required',
        ]);

        if ($this->newImage) {
            $this->validate([
                'newImage' => 'mimes:png,jpg,jpeg',
            ]);
        }

        $body = Body::find($this->slide_id);
        $body->name = $this->name;
        $body->title = $this->title;
        $body->content = $this->content;

        if ($this->newImage) {
            unlink('images/body' . '/' . $body->image);
            $imageName = Carbon::now()->timestamp . '.' . $this->newImage->extension();
            $this->newImage->storeAs('body', $imageName);
            $body->image = $imageName;
        }

        $body->more = $this->more;
        $body->save();
        session()->flash('message', 'Body has been updated successfully');
    }


    public function render()
    {
        return view('livewire.admin.admin-edit-dashboard-component')->layout('layouts.base');
    }
}
