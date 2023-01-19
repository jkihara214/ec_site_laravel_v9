<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>商品一覧</title>
</head>
<body>
<h1>商品詳細</h1>
<table border='2'>
<tr>
<th>商品名</th>
<th>商品説明</th>
<th>値段</th>
<th>在庫</th>
</tr>
<tr>
<td>{{ $item['name'] }}</td>
<td>{{ $item['explanation'] }}</td>
<td>{{ $item['price'] }}</td>
@if ($item['stock'] > 0)
<td>在庫あり</td>
@else
<td>在庫なし</td>
@endif
</tr>
</table>
<p><a href="{{ route('item.index') }}">戻る</a></p>
</body>
</html>