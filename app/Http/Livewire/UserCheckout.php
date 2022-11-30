<?php

namespace App\Http\Livewire;

use App\Mail\PlaceOrderMailable;
use App\Models\Cart;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Illuminate\Support\Str;

class UserCheckout extends Component
{
    public $carts, $totalProductAmount = 0, $fee, $deliveryFee, $totalFee, $codOrder;

    public $fullname, $email, $phone_number, $address;

    public function rules(){
        return [
            'email' =>'required|email',
            'phone_number' =>'required|digits:11',
            'address' =>'required',
        ];
    }

    public function placeOrder()
    {
        $this->validate();

        $order = Order::create([
            'user_id' => auth()->user()->id,
            'tracking_no' => 'mac-'.Str::random(10),
            'order_date' => Carbon::now(),
            'payment_mode' => $this->payment_mode,
            'payment_status' => 'unpaid',
            'status' => 'process',
        ]);

        foreach ($this->carts as $cart) {

            $order = Order::create([
                'order_id' => $order->id,
                'product_id' => $cart->product_id,
                // 'quantity' => $cart->quantity,
                'price' => $cart->products->price
            ]);
        }

        return $order;
    }

    public function codOrder()
    {
        $this->payment_mode = 'cod';
        $codOrder = $this->placeOrder();
        if($codOrder){

            Cart::where('user_id', auth()->user()->id)->delete();

            try{
                $order = Order::findOrFail($codOrder->id);
                Mail::to("$order->email")->send(new PlaceOrderMailable($order));
                // Mail Sent Successfully
            }catch(\Exception $e){
                // Something went wrong
            }

            session()->flash('message','Order Placed Successfully');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Order Placed Successfully',
                'type' => 'success',
                'status' => 200
            ]);
            return redirect()->to('thank-you');
        }else{

            $this->dispatchBrowserEvent('message', [
                'text' => 'Something went wrong',
                'type' => 'error',
                'status' => 500
            ]);
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
        $this->email = auth()->user()->email;

        $this->phone_number = auth()->user()->phone_number;
        // $this->pincode = auth()->user()->userDetail->pin_code;
        $this->address = auth()->user()->address;
        // $this->barangay = auth()->user()->barangay;

        $this->totalProductAmount = $this->totalProductAmount();
        $this->totalFee = $this->totalFee();
        $this->codOrder = $this->codOrder();
        return view('livewire.user-checkout', [
            'totalProductAmount' => $this->totalProductAmount,
            'totalFee' => $this->totalFee,
            'codOrder' => $this->codOrder,
        ]);
    }
}
