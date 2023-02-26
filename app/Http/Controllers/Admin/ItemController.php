<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Storage; 

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
			'image' => ['max:1024', 'nullable', 'mimes:jpg,jpeg,png,gif'],
		]);

		$createItem = new Item;
		$createItem->name = $request->name;
		$createItem->explanation = $request->explanation;
		$createItem->price = $request->price;
		$createItem->stock = $request->stock;
		if (!empty($request->image)) {
			$path = $request->file('image')->store('public/images/item');
			$createItem->image = basename($path);
		}
		$createItem->save();
		return redirect('/admin/item/index');
	}

	public function edit (int $id)
	{
		$item = Item::find($id);
		if (Item::where('id', '=', $item['id'])->exists()) {
			return view('admin.item.edit', compact('item'));
		} else {
			return redirect('/admin/item/index');
		}
	}

	public function update (Request $request)
	{
		$updateItem = Item::find($request->id);
		if (Item::where('id', '=', $updateItem['id'])->exists()) {
			$updateItem->name = $request->name;
			$updateItem->explanation = $request->explanation;
			$updateItem->stock = $request->stock;
			if (!empty($request->image)) {
				$past_img = $updateItem->image;
				Storage::delete('public/images/item/' . $past_img);
				$image = uniqid(mt_rand(), true);
				$image .= '.' . $request->file('image')->getClientOriginalExtension();
				$request->file('image')->storeAs('public/images/item', $image);
				$updateItem->image = $image;
			}
			$updateItem->save();
		}
		return redirect()->route('admin.item.detail', ['id' => $updateItem['id']]);
	}
}
