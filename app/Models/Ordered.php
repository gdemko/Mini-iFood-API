<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ordered extends Model
{
    protected $fillable = [
        'user_id',
        'value_total',
        'description',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('value', 'quantity')->withTimestamps();
    }

    public function store($request)
    {
        try {
            $order = new Ordered();

            return $this->make($order, $request);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message_error' => trans('message.error_register_product'),
                'message' => $e->getMessage()
            ]);
        }
    }

    public function edit($request)
    {
        try {
            $order = new Ordered();

            if ($request->id != null) {
                $order = $order->findOrFail($request->id);
            }

            return $this->make($order, $request);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message_error' => trans('message.error_update_order'),
                'message' => $e->getMessage()
            ]);
        }
    }

    private function make(Ordered $order, $request)
    {
        try {
            $title = $order->id == null ? "Novo Pedido" : "Atualização do Pedido";

            $order->user_id = auth()->user()->id;
            $dataSync = $this->formatValuesSync($request->products, $request->quantity);

            $order->description = $request->description != null ? $request->description : '';
            $order->value_total = $dataSync['total'];
            $order->save();

            $order->products()->sync($dataSync['data']);
            $order->products;

            return $order;
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message_error' => trans('message.error_make_order'),
                'message' => $e->getMessage()
            ]);
        }
    }

    private function formatValuesSync($productsIds, $quantitys)
    {
        try {
            $dataSync = [];

            $total = 0;
            foreach ($productsIds as $key => $id) {
                $product = Product::find($id);

                $total += $product->value * $quantitys[$key];

                $dataSync[$id] = [
                    'value' => $product->value,
                    'quantity' => $quantitys[$key],
                ];
            }

            return [
                'data' => $dataSync,
                'total' => $total
            ];
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
            $order = new Ordered();

            $order = $order->where('orders.id', $id)
                ->join('users', 'users.id', 'orders.user_id')
                ->select('orders.*', 'users.name as user_name')
                ->first();

            $value_total = 0;
            $quantity_total = 0;

            foreach ($order->products as $product) {
                $product->category;
                $quantity_total += $product->pivot->quantity;
                $product->pivot->sub_total = number_format(($product->pivot->value * $product->pivot->quantity), 2);
            }

            $order->quantity_total = $quantity_total;

            return $order;
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
