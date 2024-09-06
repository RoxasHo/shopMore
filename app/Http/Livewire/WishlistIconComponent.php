<?php
//Choong Kah Chay
namespace App\Http\Livewire;

use Livewire\Component;

class WishlistIconComponent extends Component
{
    protected $listeners = ['refreshComponent'=>'$refresh'];
    public function render()
    {
        return view('livewire.wish-list-icon-component');
    }
}
