@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('お届け先 詳細') }}</div>

                <div class="card-body">
                <table style="border-color:#858383 ; border-style:groove; border-width:5px ;">
                    <thead>
                        <tr>
                            <th>名前</th>
                            <th>郵便番号</th>
                            <th>都道府県</th>
                            <th>市区町村</th>
                            <th>その他住所</th>
                            <th>電話番号</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $address['name'] }}</td> 
                            <td>〒{{ substr_replace($address['post_code'], '-', 3, 0) }}</td>
                            <td>{{ $address['prefecture'] }}</td>
                            <td>{{ $address['municipalities'] }}</td>
                            <td>{{ $address['subsequent_address'] }}</td>
                            <td>{{ $address['phone_num'] }}</td>
                        </tr>
                    </tbody>
                </table>
                <a class="btn btn-link" href="{{ route('address') }}">
                    {{ __('戻る') }}
                </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
