<?php

namespace App\Http\Livewire\Admin;

use App\Models\Body;
use Livewire\Component;

class AdminDashboardComponent extends Component
{
    public function deleteBody($id)
    {
        $body = Body::find($id);
        if ($body->image) {
            unlink('images/body' . '/' . $body->image);
        }
        $body->delete();
        session()->flash('message', 'Body has beed deleted');
    }


    public function render()
    {
        $body = Body::paginate(10);
        return view('livewire.admin.admin-dashboard-component', [
            'bodies' => $body
        ])->layout('layouts.base');
    }
}
