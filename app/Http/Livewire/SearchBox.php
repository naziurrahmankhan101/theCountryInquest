<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SearchBox extends Component
{
    public $search = '';

    public function updatedSearch()
    {
        $this->emit('search', $this->search); // Use emit() instead of dispatch() in Livewire v2
    }

    public function render()
    {
        return view('livewire.search-box');
    }
}