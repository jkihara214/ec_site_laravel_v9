<?php
use App\Enums\Prefecture;
?>

@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('会員詳細') }}</div>

                <div class="card-body">
                <table style="border-color:#858383 ; border-style:groove; border-width:5px ;">
                    <tr>
                        <th>ID</th>
                        <td>{{ $user['id'] }}</td> 
                    </tr>
                    <tr>
                        <th>会員名</th>
                        <td>{{ $user['name'] }}</td> 
                    </tr>
                    <tr>
                        <th>メールアドレス</th>
                        <td>{{ $user['email'] }}</td>
                    </tr>
                </table>
                <p></p>
                <div>□お届け先住所</div>
                @if (count($addresses) > 0)
                    <table style="border-color:#858383 ; border-style:groove; border-width:5px ;">
                            <tr>
                                <th>名前</th>
                                <th>郵便番号</th>
                                <th>都道府県</th>
                                <th>市区町村</th>
                                <th>その他住所</th>
                                <th>電話番号</th>
                            </tr>
                        @foreach ($addresses as $address)
                            <tr>
                                <td>{{ $address['name'] }}</td> 
                                <td>〒{{ substr_replace($address['post_code'], '-', 3, 0) }}</td>
                                <td>{{ Prefecture::getDescription($address['prefecture']) }}</td>
                                <td>{{ $address['municipalities'] }}</td>
                                <td>{{ $address['subsequent_address'] }}</td>
                                <td>{{ $address['phone_num'] }}</td>
                            </tr>
                        @endforeach
                    </table>
                @else
                    <p>登録されているお届け先住所はありません</p>
                @endif
                <a class="btn btn-link" href="{{ route('admin.user.index') }}">
                    {{ __('戻る') }}
                </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
