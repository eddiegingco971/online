<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use Livewire\Component;

class UserCheckout extends Component
{
    public $carts, $totalProductAmount = 0;

    public $fullname, $email, $phone_number, $address;

    public function rules(){
        return [
            'fullname' =>'required',
            'email' =>'required|email',
            'phone_number' =>'required|digits:11',
            'address' =>'required',
        ];
    }

    public function cod(){
        $validateData = $this->validate();
    }

    public function totalProductAmount(){
        $this->carts = Cart::where('user_id', auth()->user()->id)->get();

        foreach ($this->carts as $cart){
            $this->totalProductAmount += $cart->products->price * $cart->quantity;
        }
        return $this->totalProductAmount;

    }
    public function render()
    {
        $this->totalProductAmount = $this->totalProductAmount();
        return view('livewire.user-checkout', [
            'totalProductAmount' => $this->totalProductAmount
        ]);
    }
}
