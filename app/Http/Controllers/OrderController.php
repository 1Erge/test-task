<?php

namespace App\Http\Controllers;

use App\Models\Enums\OrderStatusEnum;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['user', 'product'])->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $products = Product::all();
        $users = User::all();
        return view('orders.create', compact('products', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'comment' => 'nullable|string',
        ]);

        $product = Product::findOrFail($request->product_id);
        $total = $product->price * $request->quantity;
        Order::create(array_merge($request->all(), [
            'status' => OrderStatusEnum::NEW,
            'total' => $total
        ]));
        return redirect()->route('orders.index');
    }

    public function changeStatusToCompleted(Order $order)
    {
        if ($order->status !== 'new') {
            return back()->with('error', 'Только новые заказы можно завершить.');
        }

        $order->update(['status' => OrderStatusEnum::COMPLETED]);
        return back()->with('success', 'Заказ завершён.');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index');
    }
}
