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

    public function add ()
	{
		return view('admin.item.add');
	}

	public function create (Request $request)
	{
		$request->validate([
			'name' => ['required'],
			'explanation' => ['required'],
			'price' => ['required', 'regex:/^[1-9][0-9]{0,6}$/'],
			'stock' => ['required', 'regex:/^0$|^[1-9][0-9]{0,3}$/'],
		]);

		$item = new Item;
		$item->name = $request->name;
		$item->explanation = $request->explanation;
		$item->price = $request->price;
		$item->stock = $request->stock;
		$item->save();
		return redirect('/admin/item/index');
	}
}
