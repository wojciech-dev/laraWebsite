<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Livewire\Component;
use App\Models\ServiceCategory;

class MenuComponent extends Component
{
    public $sortAsc = 'asc';
    public $sortField = 'price';

    public function render()
    {
        $categories = ServiceCategory::pluck('name');
        return view('livewire.menu-component', [
            'services' => Service::orderBy($this->sortField, $this->sortAsc)->paginate(9),
            'categories' => $categories
        ])->layout('layouts.base');
    }
}
