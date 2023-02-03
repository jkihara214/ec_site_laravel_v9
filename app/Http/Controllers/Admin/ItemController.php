<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index ()
	{
		$items = Item::all();
		return view('admin.item.index', compact('items'));
	}

	public function detail (int $id)
	{
		$item = Item::find($id);
		if (isset($item)) {
			return view('admin.item.detail', compact('item'));
		} else {
			$items = Item::all();
			return view('admin.item.index', compact('items'));
		}
	}
}
