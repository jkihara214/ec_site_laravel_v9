@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('お届け先 新規登録') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('address.create') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('名前') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="post_code" class="col-md-4 col-form-label text-md-end">{{ __('郵便番号') }}</label>

                            <div class="col-md-6">
                                <input id="post_code" type="text" class="form-control @error('post_code') is-invalid @enderror" name="post_code" value="{{ old('post_code') }}" required autocomplete="post_code">

                                @error('post_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="prefecture" class="col-md-4 col-form-label text-md-end">{{ __('都道府県') }}</label>

                            <div class="col-md-6">
                                <input id="prefecture" type="text" class="form-control @error('prefecture') is-invalid @enderror" name="prefecture" value="{{ old('prefecture') }}" required autocomplete="prefecture">

                                @error('prefecture')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="municipalities" class="col-md-4 col-form-label text-md-end">{{ __('市区町村') }}</label>

                            <div class="col-md-6">
                                <input id="municipalities" type="text" class="form-control @error('municipalities') is-invalid @enderror" name="municipalities" value="{{ old('municipalities') }}" required autocomplete="municipalities">

                                @error('municipalities')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="sub_address" class="col-md-4 col-form-label text-md-end">{{ __('その他住所') }}</label>

                            <div class="col-md-6">
                                <input id="sub_address" type="text" class="form-control @error('sub_address') is-invalid @enderror" name="sub_address" value="{{ old('sub_address') }}" required autocomplete="sub_address">

                                @error('sub_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone_num" class="col-md-4 col-form-label text-md-end">{{ __('携帯番号') }}</label>

                            <div class="col-md-6">
                                <input id="phone_num" type="text" class="form-control @error('phone_num') is-invalid @enderror" name="phone_num" value="{{ old('phone_num') }}" required autocomplete="phone_num">

                                @error('phone_num')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('登録') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
