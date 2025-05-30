<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
public function index()
{
    $cartItems = CartItem::with('product')
        ->where('user_id', Auth::id())
        ->orderBy('created_at', 'desc')  // NEW: newest first
        ->get();

    // Filter out items with missing product
    $validItems = $cartItems->filter(fn($item) => $item->product !== null);

    $totalPrice = $validItems->sum(fn($item) => $item->product->price * $item->quantity);

    return view('customer.cart.index', [
        'cartItems' => $validItems,
        'totalPrice' => $totalPrice,
    ]);
}


public function add(Request $request, $productId)
{
    $request->validate([
        'quantity' => 'required|integer|min:1',
    ]);
    $quantity = $request->input('quantity');

    // Use $productId from the URL, no need to validate product_id in request
    $cartItem = CartItem::where('user_id', Auth::id())
        ->where('product_id', $productId)
        ->first();

    if ($cartItem) {
        $cartItem->quantity += $quantity;
        $cartItem->save();
    } else {
        CartItem::create([
            'user_id' => Auth::id(),
            'product_id' => $productId,
            'quantity' => $quantity,
        ]);
    }

    return back()->with('success', 'Item added to cart!');
}



    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $cartItem = CartItem::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $cartItem->quantity = $request->input('quantity');
        $cartItem->save();

        return back()->with('success', 'Cart updated.');
    }

    public function remove($id)
    {
        CartItem::where('id', $id)
            ->where('user_id', Auth::id())
            ->delete();

        return back()->with('success', 'Item removed.');
    }

    public function checkout()
    {
        // You can implement order creation logic here.
        CartItem::where('user_id', Auth::id())->delete();

        return redirect()->route('shop.index')->with('success', 'Checkout complete!');
    }
}
