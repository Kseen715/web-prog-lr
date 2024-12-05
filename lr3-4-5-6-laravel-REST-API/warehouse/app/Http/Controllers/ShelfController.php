<?php

namespace App\Http\Controllers;

use App\Models\Shelf;

class ShelfController extends Controller
{
    public function index()
    {
        return Shelf::query()->get();
    }

    public function info($id)
    {
        return Shelf::query()
            ->where('id', $id)
            ->first();
    }

    public function top()
    {
        return Shelf::query()
            ->limit(5)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function get_items($id)
    {
        try {
            $shelf = Shelf::find($id);

            if (!$shelf) {
                return response()->json([
                    'success' => false,
                    'message' => 'Shelf not found',
                    'data' => null
                ], 404);
            }

            return response()->json([
                'success' => true,
                'data' => $shelf->items,
                'message' => 'Items retrieved successfully'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve items',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}