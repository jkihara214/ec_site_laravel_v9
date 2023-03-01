@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('会員一覧') }}</div>

                <div class="card-body">
                @if (count($users) > 0)
                    <table style="border-color:#858383 ; border-style:groove; border-width:5px ;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>会員名</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td><a href="{{ route('admin.user.detail', ['userId' => $user['id']]) }}">{{ $user['name'] }}</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>会員登録情報はありません</p>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
