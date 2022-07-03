<?php

namespace App\Http\Livewire\Admin;

use App\Models\ServiceProvider;
use Livewire\Component;

class AdminServiceProvidersComponent extends Component
{
    public function render()
    {
        $providers = ServiceProvider::paginate(10);
        return view('livewire.admin.admin-service-providers-component', [
            'providers' => $providers
        ])->layout('layouts.base');
    }
}
