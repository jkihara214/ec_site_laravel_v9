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
                            <th>値段</th>
                            <th>在庫</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td><a href="{{ route('admin.item.detail', ['id' => $item['id']]) }}">{{ $item['name'] }}</a></td>
                                <td>{{ "￥" . $item['price'] }}</td>
                                @if ($item['stock'] > 0)
                                    <td>在庫あり</td>
                                @else
                                    <td>在庫なし</td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
