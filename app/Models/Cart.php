<?php

namespace App\Models;

use App\Models\Good;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ["session_id", "good_id", "price", "quantity"];

    public static function get($session_id){
//        return self::where(["session_id" => session()->getId()])->get();
        return self::where("session_id", $session_id)->get();
    }

    public static function count(){
        return self::where(["session_id" => session()->geId()])->sum("quantity");
    }

    public static function add($good_id, $session_id){
        $good = Good::findOrFail($good_id);
//        dd($good);

        if($cart = self::where("session_id", $session_id)){
            if($cart = self::where([
//            "session_id" => session()->getId(),
                "session_id" => $session_id,
                "good_id" => $good_id,
            ])->first()){
                $cart->quantity++;
                $cart->save();
            } else {
                $cart = self::create([
                    "session_id" => $session_id,
                    "good_id" => $good->id,
                    "quantity" => 1,
                    "price" => $good->price
                ]);
            }
        }
            else{
            $cart = self::create([
                "session_id" => session()->getId(),
                "good_id" => $good->id,
                "quantity" => 1,
                "price" => $good->price
            ]);
        }
        return $cart;
    }

    public static function decrease($good_id, $session_id){
        $good = Good::findOrFail($good_id);

        if($cart = self::where("session_id", $session_id)){
            if($cart = self::where([
//            "session_id" => session()->getId(),
                "session_id" => $session_id,
                "good_id" => $good_id,
                ['quantity', '>', 1]
            ])->first()) {
                $cart->quantity--;
                $cart->save();
            }
        }else {
            DB::table('carts')->where([
                "session_id" => $session_id,
                "good_id" => $good_id,
                "quantity" => 1
            ])->delete();
        }



//        if($cart = self::where([
//            "session_id" => session()->getId(), "good_id" => $good->id, [ 'quantity', '>', 1 ]
//        ])->first()){
//            $cart->quantity--;
//            $cart->save();
//        } else{
//            DB::table('carts')->where([
//                "session_id" => session()->getId(),
//                "good_id" => $good->id,
//                "quantity" => 1,
//                "price" => $good->price
//            ])->delete();
//        }
        return $cart;
    }


    public static function quantity($id, $quantity){
        if($quantity <=0) {
            return self::remove($id);
        }

        $cart = self::findOrFail($id);

        $cart->quntity = $quantity;
        $cart->save();

        return $cart;
    }

    public static function remove($id){
        return self::destroy($id);
    }

    public static function flush(){
        return self::where(["session_id" => session()->getId()])->delete();
    }

    public function total(){
        return self::where(["session_id" => getId()])->get()->map(function ($item){
            return $item->price * $item->quantity;
        })->sum();
    }

}
