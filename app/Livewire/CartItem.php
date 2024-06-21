<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartItem extends Component
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
        // Update the cart in the session or database
        // This depends on how you are managing your cart
        // For example, if you are using a session:
        session()->put("cart.{$this->item->id}.quantity", $this->quantity);
        $this->emit('cartUpdated');
    }

    public function render()
    {
        return view('livewire.cart-item');
    }
}
