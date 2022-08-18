<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function make(Request $request, $id = null)
    {
        try {
            $product = new Product();

            if ($id != null) {
                $product = $product->findOrFail($id);
            }

            $product->name = $request->name;
            $product->value = $request->value;
            $product->description = $request->description;
            $product->save();

            return response()->json([
                'success' => true,
                'message' => $id == null ? 'Produto cadastrado com sucesso!' : 'Produto atualizado com sucesso!',
                'product' => $product
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
            $product = new Product();

            return response()->json([
                'success' => true,
                'product' => $product->findOrFail($id)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function getAll()
    {
        try {
            $product = new Product();
            $products = $product->all();

            return response()->json([
                'success' => true,
                'products' => $products
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
            $product = new Product();

            $product = $product->findOrFail($id);

            Product::destroy($id);

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
