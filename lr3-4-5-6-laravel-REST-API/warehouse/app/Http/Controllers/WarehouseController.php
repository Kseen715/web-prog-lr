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
}