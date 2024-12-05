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
}