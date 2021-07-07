<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomerMail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Question;
use App\Models\Review;
use App\Models\Newsletter;




class CustomerController extends Controller {

    
    public function show() {

        return empty(session('cart')) ? redirect('home') : view('order-page.index');

    }

    public function store(Request $request, $total) {


        if($request->isMethod('post')) {

            if(auth()->user()) {

                $validation = $request->validate([
                    'phone' => ['required', 'min:6', 'max:100'],
                    'address' => ['required', 'min:3', 'max:100'],
                    'city' => ['required', 'min:2', 'max:100'],
                    'postal' => ['required', 'numeric', 'digits:5'],
                    'country' => ['required', 'min:3', 'max:100']
                ]);

            } else {

                $validation = $request->validate([
                    'name' => ['required', 'min:3', 'max:100'],
                    'email' => ['required', 'email'],
                    'phone' => ['required', 'min:6', 'max:100'],
                    'address' => ['required', 'min:3', 'max:100'],
                    'city' => ['required', 'min:2', 'max:100'],
                    'postal' => ['required', 'numeric', 'digits:5'],
                    'country' => ['required', 'min:3', 'max:100']
                ]);

            }

            DB::transaction(function () use ($request, $total) {
                
                $customer = Customer::create([
                    'name' => auth()->user() ? auth()->user()->name : $request->name,
                    'email' => auth()->user() ? auth()->user()->email : $request->email,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'city' => $request->city,
                    'postal' => $request->postal,
                    'country' => $request->country,
                ]);



                $order = Order::create([
                    'order_number' => strtoupper('EC' . bin2hex(Str::random(32))),
                    'total' => $total,
                    'status' => 'new',
                    'customer_id' => $customer->id,
                    'auth_user_id' => auth()->user()->id
                ]);


                foreach(session('cart') as $product) {

                    $order_details = OrderDetails::create([
                        'order_id' => $order->id,
                        'product_id' => $product['id'],
                        'quantity' => $product['quantity']
                    ]);

                }

                $createEmail = $this->createEmail($order);

                $clearshoppingCart = session()->forget('cart');

            });

            return redirect('home')->with('order-success', '<h1 class="fw-bold">Thank you for shopping with us!</h1> <p>Your order is pending, waiting for approval!</p> <p>We will contact you very soon. Thanks.</p>');

        }

    }


    public function createEmail($order) {

       return Mail::to($order->customer->email)->send(new CustomerMail($order));

    }

    public function orderSummary() {

        $orderSummary = Order::where('auth_user_id', auth()->user()->id)->get();

        $review_confirmed = Review::where(['user_id' => auth()->user()->id, 'confirmed' => 1])->get();

        $review_not_confirmed = Review::where(['user_id' => auth()->user()->id, 'confirmed' => 0])->get();

        return view('shopping-history.index', compact('orderSummary', 'review_confirmed', 'review_not_confirmed'));

    }

    public function questionAsk() {

        if(request()->isMethod('post')) {

            $validation = request()->validate([
                'name' => ['required', 'max:100'],
                'question' => ['required', 'max:500'],
            ]);

            $question = Question::create([
                'name' => request('name'),
                'question' => request('question'),
                'product_id' => request('product_id')
            ]);

            return back()->with('question-asked', 'Your question has been sent, waiting for conformation!');

        }

        abort('404');

    }

    public function customerReview() {

        if(request()->isMethod('post')) {
  
            $validation = request()->validate(
                [
                    'review'=> ['required', 'max:255'],
                    'rate'=> ['required']
                ],
                /*
                [
                    'review.required' => 'The review field is required',
                    'review.max' => 'The review may not be greater than 255 characters.',
                    'rate.required' => 'The evaluation field is required.'
                ]
            */
            );

            $review = Review::create([
                'rate' => request('rate'),
                'review' => request('review'),
                'product_id' => request('product_id'),
                'user_id' => auth()->user()->id
            ]);

           return response()->json(['review' => $review]);

        }

        abort('404');

    }


    public function newsletter() {

        if(request()->isMethod('post')) {
            $validation = request()->validate([
                'email' => ['required', 'email', 'unique:newsletters']
            ]);

            $newsletter = Newsletter::create([
                'email' => request('email')
            ]);

            if($newsletter) {

                return response()->json([
                    'success' => 'Your subscribe to newsletter was successful.'
                ]);

            }

        }

        abort('404');

    }
}