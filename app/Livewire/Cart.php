<?php

namespace App\Livewire;

use App\Models\CartSparePart;
use Livewire\Component;

class Cart extends Component
{
    public $item;
    public $quantity;

    public function mount($item)
    {
        $this->item = $item;
        $this->quantity = $item->quantity; // Assuming the item has a quantity property
    }

    public function increment()
    {
        $this->quantity++;
        $this->updateCart();
    }

    public function decrement()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
            $this->updateCart();
        }
    }

    public function updateCart()
    {
        $this->item->quantity = $this->quantity;
        $this->item->save();
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
