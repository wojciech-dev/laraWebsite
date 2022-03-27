<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;

class CustomerDashboardComponent extends Component
{
    public function render()
    {
        return view('livewire.customer.customer-dashboard')->layout('layouts.base');
    }
}
