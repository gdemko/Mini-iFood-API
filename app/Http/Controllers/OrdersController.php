<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ordered;

class OrdersController extends Controller
{
    public function store(Request $request)
    {
        try {
            $order = new Ordered();
            $order = $order->store($request);

            return response()->json([
              'success' => true,
              'message' => 'Pedido registrado com sucesso!',
              'data' => $order
          ], 201);
        } catch (\Exception $e) {
            return response()->json([
              'success' => false,
              'message' => trans('message.error_store_order'),
              'error_message' => $e->getMessage()
          ]);
        }
    }

    public function update(Request $request)
    {
        try {
            $order = new Ordered();
            $old_order = $order->findOrFail($request->id);
            $order = $order->edit($request);

            return response()->json([
              'success' => true,
              'message' => trans('message.update_order'),
              'data' => $order
          ], 200);
        } catch (\Exception $e) {
            return response()->json([
              'success' => false,
              'message' => trans('message.error_update_order'),
              'error_message' => $e->getMessage()
          ]);
        }
    }

    public function get($id)
    {
        try {
            $order = new Ordered();

            $order = $order->get($id);

            return response()->json([
              'success' => true,
              'data' => $order
          ]);
        } catch (\Exception $e) {
            return response()->json([
              'success' => false,
              'message' => trans('message.error_get_order'),
              'error_message' => $e->getMessage()
          ], 404);
        }
    }

    public function getAll()
    {
        try {
            $order = new Ordered();
            $orders = $order->all();

            return response()->json([
              'success' => true,
              'data' => $orders
          ], 200);
        } catch (\Exception $e) {
            return response()->json([
              'success' => false,
              'message' => trans('message.error_getAll_order'),
              'error_message' => $e->getMessage()
          ]);
        }
    }

    public function destroy($id)
    {
        try {
            $order = new Ordered();

            $order = $order->findOrFail($id);

            Ordered::destroy($id);

            return response()->json([
                'success' => true,
                'message' => trans('message.destroy_order'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => trans('message.error_destroy_order'),
                'error_message' => $e->getMessage()
            ], 200);
        }
    }
}
