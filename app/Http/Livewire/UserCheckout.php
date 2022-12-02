<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItems;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;

class UserCheckout extends Component
{
    public $carts, $totalProductAmount = 0,$fee, $deliveryFee, $totalFee;

    // public $fullname, $email, $phone_number, $address;

    public $firstname,$lastname, $email, $phone_number, $address;

    public function rules(){
        return [
            // 'firstname' =>'required',
            // 'lastname' =>'required',
            // 'email' =>'required|email',
            'phone_number' =>'required|digits:11',
            'address' =>'required',
        ];
    }

    public function placeOrder(){
        $this->validate();

        foreach ($this->carts as $cart){
            // $this->totalProductAmount += $cart->products->price * $cart->quantity;
        $order = Order::create([
            'user_id'=> auth()->user()->id,
            'product_id'=> $cart->product_id,
            'tracking_number' => 'mac'.Str::random(5),
            'order_date' => Carbon::now()->format('m-d-y'),
            'total_amount' => $this->totalFee,
            'quantity' => $cart->quantity,
            'payment_method' => $this->payment_method,
            'payment_status'=>'unpaid',
            'status'=> 'new',
        ]);
    }

        $orderItem = OrderItems::create([
            'order_id'=> $order->id,
            'user_id'=> auth()->user()->id,
            'product_id'=> $cart->product_id,
            // 'cart_id'=> $cart->id,
        ]);


        return $orderItem;

    }


    public function codOrder(){
        $this->payment_method = 'cod';

        $codOrder = $this->placeOrder();
        if($codOrder){

            Cart::where('user_id', auth()->user()->id)->delete();
            return redirect()->to('/user-order')->with('status', ' Thank you for ordering!');
            // try{
            //     $order = Order::findOrFail($codOrder->id);
            //     Mail::to("$order->email")->send(new PlaceOrderMailable($order));
            //     // Mail Sent Successfully
            // }catch(\Exception $e){
            //     // Something went wrong
            // }
        }else{

            return redirect()->back('error', 'Something went wrong');
        }
    }

    public function qrcode(){
        $this->payment_method = 'scan_gcash';


        $qrcode = $this->placeOrder();
        if($qrcode){

            Cart::where('user_id', auth()->user()->id)->delete();
            return redirect()->to('/user-order')->with('status', ' Thank you for ordering!');
            // try{
            //     $order = Order::findOrFail($codOrder->id);
            //     Mail::to("$order->email")->send(new PlaceOrderMailable($order));
            //     // Mail Sent Successfully
            // }catch(\Exception $e){
            //     // Something went wrong
            // }

        }else{

            return redirect()->back('error', 'Something went wrong');
        }
    }

    public function totalProductAmount(){
        $this->carts = Cart::where('user_id', auth()->user()->id)->get();

        foreach ($this->carts as $cart){
            $this->totalProductAmount += $cart->products->price * $cart->quantity;
        }
        return $this->totalProductAmount;

    }

    public function totalFee(){
        $this->totalFee = $this->totalProductAmount + auth()->user()->fees->price;
        return $this->totalFee;
    }

    public function render()
    {
        // $this->firstname = auth()->user()->firstname;
        // $this->lastname =auth()->user()->lastname;
        // $this->email = auth()->user()->email;
        $this->phone_number = auth()->user()->phone_number;
        $this->address = auth()->user()->address;


        $this->totalProductAmount = $this->totalProductAmount();
        $this->totalFee = $this->totalFee();
        return view('livewire.user-checkout', [
            'totalProductAmount' => $this->totalProductAmount,
            'totalFee' => $this->totalFee,
        ]);
    }
}
