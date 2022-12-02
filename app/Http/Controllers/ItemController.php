<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{

    public function index()
    {
        $items = Item::all();
        return response()
            ->json($items);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $item = new Item();
        $item->item_sku = $request->item_sku;
        $item->item_desc = $request->item_desc;
        $item->item_cost = $request->item_cost;
        $item->save();
        //$item = Item::create($request->all());
        return[
            "status" => 200,
            "data" => $item,
        ];
    }

    public function show($id)
    {
        $item = Item::find($id);
        return response()
            ->json($item);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $item = Item::find($id);
        $item->item_sku = $request->item_sku;
        $item->item_desc = $request->item_desc;
        $item->item_cost = $request->item_cost;
        $item->save();

        return[
            "status" => 200,
            "data" => $item,
        ];
    }

    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();
        return[
            "status" => 200,
        ];
    }
}
