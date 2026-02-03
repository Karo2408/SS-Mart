<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        // ===== STATISTIK =====
        $totalRevenue = Order::where('status', 'Delivered')->sum('total');
        $totalOrders  = Order::whereMonth('created_at', now()->month)->count();
        $totalUsers   = User::where('is_admin', 0)->count();
        $totalProduct = Product::count();

        // ===== RECENT ORDERS =====
        $recentOrders = Order::latest()
            ->take(5)
            ->get();

        // ===== CHART DATA (MINGGUAN) =====
        $chart = Order::selectRaw('DAYNAME(created_at) as day, SUM(total) as val')
            ->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
            ->groupBy('day')
            ->get();

        return view('admin.dashboard', compact(
            'totalRevenue',
            'totalOrders',
            'totalUsers',
            'totalProduct',
            'recentOrders',
            'chart'
        ));
    }
}
