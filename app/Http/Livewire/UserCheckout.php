<?php

namespace App\Http\Livewire;

use App\Models\Fee;
use App\Models\Cart;
use Livewire\Component;

class UserCheckout extends Component
{
    public $carts, $totalProductAmount = 0, $fee, $deliveryFee, $totalFee;

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
            $this->totalProductAmount += $cart->products->prices->price * $cart->quantity;
        }
        return $this->totalProductAmount;
    }

    public function totalFee(){
        $this->totalFee = $this->totalProductAmount + auth()->user()->fees->price;
        return $this->totalFee;
    }

    public function render()
    {
        $this->totalProductAmount = $this->totalProductAmount();
        $this->totalFee = $this->totalFee();
        return view('livewire.user-checkout', [
            'totalProductAmount' => $this->totalProductAmount,
            'totalFee' => $this->totalFee,
        ]);
    }
}
