<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use Livewire\Component;

class UserCart extends Component
{
    // public $quantityCount = 1;
    // public function loadCarts(){
    //     $carts = Cart::orderBy('created_at', 'desc')->where('user_id', auth()->user()->id)->get();
    //     return compact('carts');
    // }

    public $carts, $total_amount = 0;

    public function incrementQuantity(int $cartId){
        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
        if($cartData){
            $cartData->increment('quantity');
            $this->dispatchBrowserEvent('status', 'Quantity Updated');
        }else{
            $this->dispatchBrowserEvent('error', 'Something went wrong');
        }

    }
    public function decrementQuantity(int $cartId){
        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
        if($cartData){
            $cartData->decrement('quantity');
            $this->dispatchBrowserEvent('status', 'Quantity Updated');
        }else{
            $this->dispatchBrowserEvent('error', 'Something went wrong');
        }


    }


    // public function incrementQuantity($cartId){
    //     $cart = Cart::where('id', $cartId)->firstOrFail();
    //     $this->quantityCount = $cart->quantity;
    //     $this->quantityCount++;
    //     $cart->update(['quantity' => $this->quantityCount]);
    // }
    public function render()
    {
        $this->carts = Cart::where('user_id', auth()->user()->id)->get();
        return view('livewire.user-cart',['carts' => $this->carts]);
    }
}
