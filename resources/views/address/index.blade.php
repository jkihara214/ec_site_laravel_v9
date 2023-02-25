@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('お届け先住所の選択') }}</div>

                <div class="card-body">
                @if (is_countable($addresses))
                    <table style="border-color:#858383 ; border-style:groove; border-width:5px ;">
                        <thead>
                            <tr>
                                <th>名前</th>
                                <th>選択</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($addresses as $address)
                            <tr>
                                <td><a href="{{ route('address.detail', ['address_id' => $address['id'], 'user_id' => $address['user_id']]) }}">{{ $address['name'] }}</a></td>
                                <td><input type="radio" name="address" value="{{ $address['id'] }}"></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p>登録されているお届け先はありません</p>
                @endif
                <a class="btn btn-link" href="{{ route('address.register') }}">
                    {{ __('お届け先登録へ') }}
                </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
