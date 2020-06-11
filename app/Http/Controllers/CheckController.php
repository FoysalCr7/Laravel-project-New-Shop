<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\OrderDetails;
use App\Payment;
use App\Shipping;
use Illuminate\Http\Request;
use Session;
use Cart;

use Illuminate\Support\Facades\Mail;

class CheckController extends Controller
{
    public function index()
    {
        return view('front-end.checkout.checkoutcontent');
    }

    public function customeSignUp(Request $request)
    {

        $customer = new Customer();
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->password = bcrypt($request->password);
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->save();

        $customerId = $customer->id;
        Session::put('customerId', $customerId);
        Session::put('customerName', $customer->first_name . '' . $customer->last_name);
        $data = $customer->toArray();

        return redirect('/checkout/shipping');
        /*Mail::send('front-end.mails.conformation-mail',$data,function($message)use ($data){
            $message->to($data['email']);
            $message->subject('Conformation Mail');
        });
        return 'success';
  //return redirect('/checkout');*/
    }
    public function customerLogin(Request $request){
       $customer= Customer::where('email',$request->email)->first();

        if (password_verify('$request->password', $customer->password)) {
            Session::put('customerId', $customer->id);
            Session::put('customerName', $customer->first_name . '' . $customer->last_name);
            return redirect('/checkout/shipping');
        } else {
            return redirect('/checkout')->with('message','invalid password');
        }
    }
    public function newCustomerLogin(){
        return view('front-end.customer.customer-login');
    }
    public function customerLogout (){
      Session::forget('customerId')  ;
      Session::forget('customerName')  ;
        return redirect('/');
    }

    public function shippingForm(){
        $customer= Customer::find(Session::get('customerId'));

        return view( 'front-end.checkout.shipping',compact('customer'));
    }
    public function shippingSave(Request $request){
        $shipping=new Shipping();
        $shipping->full_name=$request->full_name;
        $shipping->email=$request->email;
        $shipping->phone=$request->phone;
        $shipping->address=$request->address;
        $shipping->save();
        Session::put('shippingId',$shipping->id);
        return redirect('/checkout/payment');
    }
    public function paymentForm(){
        return view( 'front-end.checkout.payment');
    }
    public function newOrder(Request $request){
        $paymenttype=$request->payment_type;

        if($paymenttype=='cash'){
           $order=new Order();
            $order->customer_id=Session::get('customerId');
            $order->shipping_id=Session::get('shippingId');
            $order->order_total=Session::get('order_total');
            $order->save();

            $payment=New Payment();
            $payment->order_id=$order->id;
            $payment->payment_type=$paymenttype;
            $payment->save();

            $cartproduct=Cart::getContent();
            foreach ($cartproduct as $cartproduct ) {
                $orderDetails = new OrderDetails();
                $orderDetails->order_id = $order->id;
                $orderDetails->product_id = $cartproduct->id;
                $orderDetails->product_name = $cartproduct->name;
                $orderDetails->product_price = $cartproduct->price;
                $orderDetails->product_quantity = $cartproduct->quantity;
                $orderDetails->save();
            }
            Cart::isEmpty();
            return redirect('/complete/order');



        }elseif ($paymenttype=='paypal'){

        }elseif ($paymenttype=='Bkash'){

        }
    }
    public function completeOrder(){
        return 'success';
    }

}