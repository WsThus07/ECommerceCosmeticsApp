<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Models\Order;


use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function Index()
    {
        $orderCounts = DB::table('categories')
        ->leftJoin('products', 'categories.id', '=', 'products.product_category_id')
        ->leftJoin('orders', 'products.id', '=', 'orders.product_id')
        ->select('categories.id', 'categories.category_name', DB::raw('COUNT(orders.id) as order_count'))
        ->groupBy('categories.id', 'categories.category_name')
        ->get();
        $users = User::count() - 1;
        $orders = Order::count();
        $products = Product::count();
        $categories = Category::count();

        $sales = DB::table('orders')->sum('total_price');
        return view('admin.dashboard', compact('orderCounts', 'users', 'products', 'orders', 'categories', 'sales'));
    }
    
}
