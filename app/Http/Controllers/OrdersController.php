<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ordered;

class OrdersController extends Controller
{
    public function created(Request $request)
    {
        try {
            $orders = new Ordered;
            $orders->description = $request->description;
            $orders->save();
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
        
    }

    public function update(Request $request, $id)
    {
        try {
            $orders = new Ordered;
            $orders->findOrFail($id);
            $orders->description = $request->description;
            $orders->save();
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
