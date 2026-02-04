<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        // ===== STATISTIK =====
        // Jika belum ada model Order, set default value
        $totalRevenue = 0; // Order::where('status', 'Delivered')->sum('total');
        $totalOrders  = 0; // Order::whereMonth('created_at', now()->month)->count();
        $totalUsers   = User::where('role', 'customer')->count();
        $totalProduct = Product::count();

        // ===== RECENT ORDERS =====
        // Jika belum ada model Order, set empty array
        $recentOrders = []; // Order::latest()->take(5)->get();

        // ===== CHART DATA (MINGGUAN) =====
        // Jika belum ada model Order, set default data
        $chart = [
            ['day' => 'Sen', 'val' => 0],
            ['day' => 'Sel', 'val' => 0],
            ['day' => 'Rab', 'val' => 0],
            ['day' => 'Kam', 'val' => 0],
            ['day' => 'Jum', 'val' => 0],
            ['day' => 'Sab', 'val' => 0],
            ['day' => 'Min', 'val' => 0],
        ];
        
        // $chart = Order::selectRaw('DAYNAME(created_at) as day, SUM(total) as val')
        //     ->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
        //     ->groupBy('day')
        //     ->get();

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