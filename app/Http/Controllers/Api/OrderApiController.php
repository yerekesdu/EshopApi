<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Good;

class OrderApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        if(auth('sanctum')->check()){
            $user = auth()->guard('sanctum')->user();
            $orders = Order::where("user_id", $user->id)->get();
            return response()->json([
                'orders' => $orders
            ]);
        } else{
            return response()->json([
                'message' => 'you are not authorized'
            ]);
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $carts = Cart::get($request->input('session_id'));

        if($carts->isEmpty()){
            return response()->json([
                'message' => 'there is no cart'
            ]);
        } else{
            if(auth('sanctum')->check()){
                $user = auth()->guard('sanctum')->user();
                $order = Order::create([
                    'user_id' => $user->id,
                    'contact_email' => $user->email,
                    'contact_phone' => $user->phone_number,
                ]);
            } else {
                $request->validate([
                    'contact_email' => 'string',
                    'contact_phone' => 'string'
                ]);

                $order = Order::create([
                    'user_id' => null,
                    'contact_email' => $request->contact_email,
                    'contact_phone' => $request->contact_phone,
                ]);
            }

            foreach ($carts as $item){
                OrderProduct::create([
                    'order_id' => $order->id,
                    'good_id' => $item->good_id,
                    'quantity' => $item->quantity,
                ]);
                Cart::remove($item->id);
            }
            return response()->json([
                'message' => 'you successfully ordered'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
