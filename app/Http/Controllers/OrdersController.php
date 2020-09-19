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
                $order = $order->findOrFail($id);
            }
            
            $order->user_id = $request->user_id;
            $order->value_total = $request->value_total;
            $order->number = $request->number;
            $order->description = $request->description;
            $order->save();
            $order->products()->sync($request->products);
            $order->products;

            return response()->json([
                'success' => true,
                'message' => $id == null ? 'Ordem cadastrada com sucesso!' : 'Ordem atualizada com sucesso!',
                'order' => $order
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function get($id)
    {
        try {
            $order = new Ordered;
            
            return response()->json([
                'success' => true,
                'order' => $order->findOrFail($id)
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function destroy($id)
    {
        try {

            $order = new Ordered;

            $order = $order->findOrFail($id);
            
            Ordered::destroy($id);

            return response()->json([
                'success' => true,
                'message' => 'Registro deletado',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
