<?php

namespace App\Http\Controllers\Checkout;
use Cart;
use Session;
use Stripe;
use App\Models\Order;
use App\Models\Menu;
use App\Models\OrderItem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{   
    protected $Stripe;
    public function index(){
        return view('checkout.index');
    }

    public function storecheckout(Request $request)
    {
        $order = Order::create([
            'order_number'      =>  'ORD-'.strtoupper(uniqid()),
            'user_id'           => auth()->user()->id,
            'status'            =>  'pending',
            'grand_total'       =>  Cart::getSubTotal(),
            'item_count'        =>  Cart::getTotalQuantity(),
            'payment_status'    =>  0,
            'payment_method'    =>  null,
            'first_name'        =>  $request->first_name,
            'last_name'         =>  $request->last_name,
            'address'           =>  $request->address,
            'city'              =>  $request->city,
            'country'           =>  $request->country,
            'post_code'         =>  $request->post_code,
            'phone_number'      =>  $request->phone_number,
            'notes'             =>  $request->notes
        ]);
        if ($order) {

            $items = Cart::getContent();

            foreach ($items as $item)
            {
                // A better way will be to bring the product id with the cart items
                // you can explore the package documentation to send product id with the cart
                $menu = Menu::where('name', $item->name)->first();

                $orderItem = new OrderItem([
                    'menu_id'    =>  $menu->id,
                    'quantity'      =>  $item->quantity,
                    'price'         =>  $item->getPriceSum()
                ]);

                $order->items()->save($orderItem);
            }
        }

        return view('paymentgateway.payment', compact('order'));
        
    }
    public function complete(Request $request)
    {
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');

        $status = $this->Stripe->completePayment($paymentId, $payerId);

        $order = Order::where('order_number', $status['invoiceId'])->first();
        $order->status = 'processing';
        $order->payment_status = 1;
        $order->payment_method = 'PayPal -'.$status['salesId'];
        $order->save();

        Cart::clear();
        return view('wellcome', compact('order'));
    }
    
}
