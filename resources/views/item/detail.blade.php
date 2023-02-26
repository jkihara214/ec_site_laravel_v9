@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('商品一覧') }}</div>

                <div class="card-body">
                <table style="border-color:#858383 ; border-style:groove; border-width:5px ;">
                    <tr>
                        <th>商品名</th>
                        <td>{{ $item['name'] }}</td> 
                    </tr>
                    <tr>
                        <th>画像</th>
                        @if ($item['image'] === NULL)
                            <td>未登録</td>
                        @else
                            <td><img src="{{ asset('/storage/images/item/' . $item['image']) }}" width="300" height="250"></td>
                        @endif
                    </tr>
                    <tr>
                        <th>商品説明</th>
                        <td>{{ $item['explanation'] }}</td>
                    </tr>
                    <tr>
                        <th>値段</th>
                        <td>{{ "￥" . number_format($item['price']) }}</td>
                    </tr>
                    <tr>
                        <th>在庫</th>
                        @if ($item['stock'] > 0)
                            <td>在庫あり</td>
                        @else
                            <td>在庫なし</td>
                        @endif
                    </tr>
                </table>
                <form class="btn btn-link" method="post" action="{{ route('cart.add') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="item_id" value="{{ $item['id'] }}">
                    <button type="submit">カートへ入れる</button>
                </form>
                <a class="btn btn-link" href="{{ route('item.index') }}">
                    {{ __('戻る') }}
                </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
