<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Good;

class CartApiController extends Controller
{

    public function index(Request $request)
    {
        $carts = Cart::get($request->input('session_id'));
        if($carts->isEmpty()){
            return response()->json([
                'message' => 'cart is empty for this session_id'
            ]);
        } else {
            return response()->json([
                'carts' => $carts,
                'session_id' => session()->getId()
            ]);
        }
    }

    public function create()
    {
        //
    }

    public function add(Request $request)
    {
        $good = Good::findOrfail($request->input('good_id'));
        $cart = Cart::add($request->input('good_id'), $request->input('session_id'));

        return response()->json([
            'message' => 'you added successfully'
        ]);
    }

    public function subtract(Request $request)
    {
        $good = Good::findOrfail($request->input('good_id'));
        $cart = Cart::decrease($good->id, $request->input('session_id'));

        return response()->json([
            'message' => 'you subtracted successfully'
        ]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
