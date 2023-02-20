@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('カート') }}</div>

                <div class="card-body">
                <a class="btn btn-link" href="{{ route('item.index') }}">
                    {{ __('商品追加') }}
                </a>
                @if (0 < count($carts))
                    <table style="border-color:#858383 ; border-style:groove; border-width:5px ;">
                        <thead>
                            <tr>
                                <th>商品名</th>
                                <th>数量</th>
                                <th>値段</th>
                                <th>削除</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($carts as $cart)
                            <tr>
                                <td>{{ $cart->item->name }}</td>
                                <td>{{ $cart->quantity }}</td>
                                <td>{{ $cart->subtotal() }}</td>
                                <td>
                                <form method="post" action="{{ route('cart.delete') }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="cart_id" value="{{ $cart->id }}">
                                    <button type="submit">削除</button>
                                </form>
                                </td>
                            </tr>
                        @endforeach
                            <tr>
                                <td>合計</td>
                                <td>{{ $subtotals }}</td>
                                <td>税込: {{ $totals }}</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    <a class="btn btn-link" href="{{ route('address') }}">
                        {{ __('お届け先選択') }}
                    </a>
                    @else
                        <p>カートに商品はありません</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
