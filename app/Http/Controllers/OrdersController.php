<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ordered;

class OrdersController extends Controller
{
    public function make(Request $request, $id = null)
    {
        try {
            $order = new Ordered;

            if($id != null)
            {
                $order->findOrFail($id);
            }
            
            $order->description = $request->description;
            $order->save();
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
