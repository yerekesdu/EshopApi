<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Good;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\Category;

class GoodApiController extends Controller
{

    public function index(Request $request)
    {
        $request->validate([
            'category_id' => 'int|required',
            'price_from' => 'int|required',
            'price_to' => 'int|required',
        ]);

        $goods = Good::all();

        if (isset($request->category_id) && isset($request->price_from) && isset($request->price_to)) {
            $goods = Good::where([
                "category_id" => $request->category_id
            ])->whereBetween('price', [$request->price_from, $request->price_to])->with('Category')->get();
            return response()->json([
                'goods' => $goods
            ]);
        }
    }

    public function getBySlug(Request $request){

        $request->validate([
            'slug' => 'required'
        ]);

        if(isset($request->slug)){
            $goodsBySlug = Good::where('slug', $request->slug)->get();
            if(Good::where('slug', $request->slug)->exists()){
                return response()->json([
                    'goods' => $goodsBySlug
                ]);
            }else {
                return response()->json([
                    'message' => 'good by slug not found'
                ]);
            }

        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Good  $good
     * @return \Illuminate\Http\Response
     */
    public function show(Good $good)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Good  $good
     * @return \Illuminate\Http\Response
     */
    public function edit(Good $good)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Good  $good
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Good $good)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Good  $good
     * @return \Illuminate\Http\Response
     */
    public function destroy(Good $good)
    {
        //
    }
}
