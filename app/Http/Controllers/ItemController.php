<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index ()
	{
		$items = Item::all();
		return view('item.index', compact('items'));
	}

	public function detail (int $id)
	{
		$item = Item::find($id);
		if (isset($item)) {
			return view('item.detail', compact('item'));
		} else {
			$items = Item::all();
			return view('item.index', compact('items'));
		}
	}

	public function user()
	{
		$items = Item::all();
		return view('item/user')->with('items', $items);
	}
}
