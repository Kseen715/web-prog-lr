<?php

namespace App\Http\Controllers;

use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        return Item::query()->get();
    }

    public function info($id)
    {
        return Item::query()
            ->where('id', $id)
            ->first();
    }

    public function top()
    {
        return Item::query()
            ->limit(4)
            ->orderBy('created_at', 'desc')
            ->get();
    }
}