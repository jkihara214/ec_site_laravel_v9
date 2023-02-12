@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('商品一覧') }}</div>

                <div class="card-body">
                <table style="border-color:#858383 ; border-style:groove; border-width:5px ;">
                    <thead>
                        <tr>
                            <th>商品名</th>
                            <th>商品説明</th>
                            <th>値段</th>
                            <th>在庫</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $item['name'] }}</td> 
                            <td>{{ $item['explanation'] }}</td>
                            <td>{{ "￥" . $item['price'] }}</td>
                            @if ($item['stock'] > 0)
                                <td>在庫あり</td>
                            @else
                                <td>在庫なし</td>
                            @endif
                        </tr>
                    </tbody>
                </table>
                <a class="btn btn-link" href="{{ route('admin.item.index') }}">
                    {{ __('戻る') }}
                </a>
                <a class="btn btn-link" href="{{ route('admin.item.edit', ['id' => $item['id']]) }}">
                    {{ __('編集') }}
                </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
