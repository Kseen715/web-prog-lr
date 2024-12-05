<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;

class WarehouseController extends Controller
{
    public function index()
    {
        return Warehouse::query()->get();
    }

    public function info($id)
    {
        return Warehouse::query()
            ->where('id', $id)
            ->first();
    }

    public function top()
    {
        return Warehouse::query()
            ->limit(5)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function get_items($id)
    {
        try {
            $wh = Warehouse::find($id);

            if (!$wh) {
                return response()->json([
                    'success' => false,
                    'message' => 'Warehouse not found',
                    'data' => null
                ], 404);
            }

            return response()->json([
                'success' => true,
                'data' => $wh->shelves,
                'message' => 'Shelves retrieved successfully'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve shelves',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}