<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Dashboard/Cart/Index', [
            'cartItems' => Cart::content()
                ->where('user', '=', Auth::user()->id),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Cart::add($request->id, $request->name, $request->quantity, $request->price,
            ['user_id' => $request->user, '3_pcs_disc' => $request->disc3Pc, '5_pcs_disc' => $request->disc5Pc, 'status' => $request->status])
            ->associate('App\Models\Product');

        return redirect()
            ->route('cart.index')
            ->with('message', 'Product added to Cart successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Cart::update($request->quantity, $id);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Cart::remove($id);
        return back();
    }
}
