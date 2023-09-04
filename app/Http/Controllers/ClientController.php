<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\ShippingInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class ClientController extends Controller
{
    public function CategoryPage($id)
    {
        $category = Category::findOrFail($id);
        $products = Product::where('product_category_id', $id)->latest()->get();
        $categories = Category::latest()->get();
        return view('user_template.category', compact('category', 'products', 'categories'));
    }

    public function SingleProduct($id)
    {
        $product_detail = Product::findOrFail($id);
        $subcategory_id = Product::where('id', $id)->value('product_subcategory_id');
        $featuredprod = Product::where('product_subcategory_id', $subcategory_id)->latest()->get();
        return view('user_template.product', compact('product_detail', 'featuredprod'));
    }

    public function AddToCart()
    {
        $userId = Auth::id();

        $carts = Cart::where('user_id', $userId)->get();

        return view('user_template.addtocart', compact('carts'));
    }

    public function AddProductToCart(Request $request)
    {
        $product_price = $request->price;
        $quantity = $request->quantity;
        $price = $product_price * $quantity;
        Cart::insert([
            'product_id' => $request->product_id,
            'user_id' => Auth::id(),
            'quantity' => $request->quantity,
            'price' => $price,
        ]);
        return redirect()->route('addtocart')->with('message', 'Your Item added to cart successfully');
    }

    public function PendingOrders()
    {
        $userID = Auth::id();
        $pending_orders = Order::where('user_id', $userID)
            ->where('status', 'pending')
            ->latest()->get();
        return view('user_template.pendingorders', compact('pending_orders'));
    }
    public function History()
    {
        return view('user_template.history');
    }
    public function Checkout()
    {
        $userId = Auth::id();
        $carts = Cart::where('user_id', $userId)->get();
        $shipping_infos = ShippingInfo::where('user_id', $userId)->first();
        return view('user_template.checkout', compact('carts', 'shipping_infos'));
    }
    public function PlaceOrder()
    {
        $userId = Auth::id();
        $carts = Cart::where('user_id', $userId)->get();
        $shipping_infos = ShippingInfo::where('user_id', $userId)->first();
        foreach ($carts as $item) {
            Order::insert([
                'user_id' => $userId,
                'shipping_phoneNumber' => $shipping_infos->phone_number,
                'shipping_country' => $shipping_infos->country,
                'shipping_city' => $shipping_infos->city_name,
                'shipping_address' => $shipping_infos->adresse,
                'shipping_postalcode' => $shipping_infos->postal_code,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'total_price' => $item->price,

            ]);
            $id = $item->id;
            Cart::findOrfail($id)->delete();
        }
        ShippingInfo::where('user_id', $userId)->first()->delete();
        return redirect()->route('pendingordersuser')->with('message', 'Your order Has Been Placed Successfully!');
    }
    public function UserProfile()
    {
        return view('user_template.userprofile');
    }
    public function DeleteCart($id)
    {
        Cart::findOrfail($id)->delete();
        return redirect()->route('addtocart')->with('message', 'Your item from cart is Deleted successfully!');
    }
    public function GetShippingAddress()
    {
        $userId = Auth::id();
        $carts = Cart::where('user_id', $userId)->get();
        return view('user_template.shippingaddress', compact('carts'));
    }
    public function AddShippingAdress(Request $request)
    {
        ShippingInfo::insert([
            'user_id' => Auth::id(),
            'phone_number' => $request->phone_number,
            'country' => $request->country,
            'city_name' => $request->city_name,
            'adresse' => $request->adresse,
            'postal_code' => $request->postal_code,
            'order_notes' => $request->order_notes,
        ]);
        return redirect()->route('checkout');
    }
}
