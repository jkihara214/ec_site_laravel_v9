<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>商品一覧</title>
</head>
<body>
<h1>商品一覧</h1>
<table border='2'>
<tr>
<th>商品名</th>
<th>値段</th>
<th>在庫</th>
</tr>
@foreach ($items as $item)
<tr>
<td><a href="{{ route('item.detail', ['id' => $item['id']]) }}">{{ $item['name'] }}</a></td>
<td>{{ $item['price'] }}</td>
@if ($item['stock'] > 0)
<td>在庫あり</td>
@else
<td>在庫なし</td>
@endif
</tr>
@endforeach
</table>
</body>
</html>