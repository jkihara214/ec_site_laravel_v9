<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Cart;
use App\Models\Item;
use Exception;

class CartController extends Controller
{
	public function index() {
		$user = User::with('carts.item')
				->find(Auth::id());
		$carts = $user->carts;
		$subtotals = $this->subtotals($carts);
		$totals = $this->totals($carts);
		return view('cart.index', compact('carts', 'totals', 'subtotals'));
	}

	private function subtotals($carts) {
		$result = 0;
		foreach ($carts as $cart) {
			$result += $cart->subtotal(); //税抜き価格(商品の総和)
		}
		return $result;
	}

	private function totals($carts) {
		$result = $this->subtotals($carts) + $this->tax($carts); //税込み価格(商品の 総和)
		return $result;
	}

	private function tax($carts) {
		$result = floor($this->subtotals($carts) * 0.1); //税込み価格小数点以下切捨て
		return $result;
	}

	public function add(Request $request) {
		$item_id = $request->item_id;
		$item = Item::find($item_id);
		if ($item->stock > 0) {
			$qty = '1';
			$cart = Cart::firstOrCreate(['user_id' => Auth::id(), 'item_id' => $item_id], ['quantity' => 0]);
			try {
				DB::beginTransaction();
				$cart->increment('quantity', $qty);
				$item->decrement('stock', $qty);
				DB::commit();
			} catch (Exception $e) {
				DB::rollback();
			}
			return redirect()->route('cart');
		}
		return redirect()->route('item.index');
	}

	public function delete(Request $request) {
		$cart_id = $request->cart_id;
		$cart = Cart::find($cart_id);
		if ($cart->user_id == Auth::id()) {
			$item_id = $cart->item_id;
			$qty = $cart->quantity;
			try {
				DB::beginTransaction();
				Item::find($item_id)->increment('stock', $qty);
				$cart->delete();
				DB::commit();
			} catch (Exception $e) {
				DB::rollback();
			}
		}
		return redirect(route('cart'));
	}
}