<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

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
            ->limit(5)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function store(Request $request)
    {
        $item = Item::create($request->all());
        return response()->json([
            'id' => $item->id,
        ]);
    }

    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        $item->update($request->all());
        return response()->json([
            'id' => $item->id,
        ]);
    }

    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
        return response()->json([
            'id' => $item->id,
        ]);
    }

    public function patch(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        $item->update($request->all());
        return response()->json([
            'id' => $item->id,
        ]);
    }
}