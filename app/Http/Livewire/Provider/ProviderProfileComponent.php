<?php

namespace App\Http\Livewire\Provider;

use App\Models\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProviderProfileComponent extends Component
{
    public function render()
    {
        $provider = ServiceProvider::where('user_id', Auth::user()->id)->first();



        return view('livewire.provider.provider-profile-component', [
            'provider' => $provider
        ])->layout('layouts.base');
    }
}
