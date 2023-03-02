<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Enums\Prefecture;
use Illuminate\Support\Arr;
use App\Models\User;
use App\Models\Address;

class AddressController extends Controller
{
    public function index()
    {
		$user = User::with('addresses')
			->find(Auth::id());
		$addresses = $user->addresses;
        return view('address.index', compact('addresses'));
    }

    public function register()
    {
        $prefectures = Prefecture::getInstances();
        return view('address.register', compact('prefectures'));
    }

    public function create(Request $request)
    {
        $prefectures = Prefecture::getInstances();
        $prefectureIds = Arr::pluck($prefectures, 'value');

        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'post_code' => ['required', 'regex:/^[0-9]{7}$/'],
            'prefecture_id' => ['required', Rule::in($prefectureIds)],
            'municipalities' => ['required'],
            'sub_address' => ['required'],
            'phone_num' => ['required', 'regex:/^0[0-9]{9,10}$/'],
        ]);

        if ($validator->fails()) {
            /// バリデーション失敗時の処理
            return view('address.register');
        } else {
            $same_check = Address::where('user_id', '=', Auth::id())
                ->where('post_code', '=', $request->post_code)
                ->where('prefecture', '=', $request->prefecture_id)
                ->where('municipalities', '=', $request->municipalities)
                ->where('subsequent_address', '=', $request->sub_address)
                ->get();
            if (count($same_check) == 0) {
                $address = new Address;
                $address->name = $request->name;
                $address->user_id = Auth::id();
                $address->post_code = $request->post_code;
                $address->prefecture = $request->prefecture_id;
                $address->municipalities = $request->municipalities;
                $address->subsequent_address = $request->sub_address;
                $address->phone_num = $request->phone_num;
                $address->save();
            }
        }
        return redirect(route('address'));
    }

    public function detail(Request $request)
    {
        $user_id = $request->user_id;
        $address_id = $request->address_id;
        if ($user_id == Auth::id()) {
            $address = Address::find($address_id);
            return view('address.detail',  compact('address'));
        } else {
            return redirect()->route('address');
        }
    }

    public function edit(Request $request)
    {
        $addressId = $request->address_id;
        $userId = $request->user_id;
        if ($userId == Auth::id()) {
            $address = Address::find($addressId);
            if ($address != null) {
                $prefectures = Prefecture::getInstances();
                return view('address.edit',  compact('address', 'prefectures'));
            }
        }
        return view('address.detail',  compact('address'));
    }

    public function update(Request $request)
    {
        $prefectures = Prefecture::getInstances();
        $prefectureIds = Arr::pluck($prefectures, 'value');

        $validator = Validator::make($request->all(), [
            'address_id' => ['required'],
            'name' => ['required'],
            'post_code' => ['required', 'regex:/^[0-9]{7}$/'],
            'prefecture_id' => ['required', Rule::in($prefectureIds)],
            'municipalities' => ['required'],
            'sub_address' => ['required'],
            'phone_num' => ['required', 'regex:/^0[0-9]{9,10}$/'],
        ]);

        $addressId = $request->address_id;
        $address = Address::find($addressId);
        $userId = $address->user_id;
        if ($address != null && $userId == Auth::id()) {
            if ($validator->fails()) {
                /// バリデーション失敗時の処理...
                return view('address.detail',  compact('address'));
            } else {
                $address->name = $request->name;
                $address->post_code = $request->post_code;
                $address->prefecture = $request->prefecture_id;
                $address->municipalities = $request->municipalities;
                $address->subsequent_address = $request->sub_address;
                $address->phone_num = $request->phone_num;
                $address->save();
                return view('address.detail',  compact('address'));
            }
        }
        return redirect(route('address'));
    }

    public function delete(Request $request) {
        $addressId = $request->address_id;
        $userId = $request->user_id;
        if ($userId == Auth::id()) {
            $address = Address::find($addressId);
            if ($address != null) {
                $address->delete();
            }
        }
        return redirect()->route('address');
    }
}
