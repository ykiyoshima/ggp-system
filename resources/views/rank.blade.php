<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GGP</title>
    @if(app('env') == 'production')
      <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    @else
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @endif
</head>
<body>
    <h1 class="text-5xl text-gray-900 text-center pt-8 pb-4">順位</h1>
    <p class="text-xl text-gray-900 text-center pb-8">開催時間外、もしくは登壇者の一部をSKIPされた審査員の評価点は反映されません</p>
    <a id="menu_btn" href="/menu" class="block w-64 py-4 mb-8 mx-auto rounded text-2xl text-center bg-gray-300 text-gray-900 hover:bg-gray-500 hover:text-gray-100">メニューに戻る</a>
    <div class="flex border-b border-gray-400 w-4/5 mx-auto">
      <button class="block w-64 py-4 rounded text-2xl text-center bg-gray-300 text-gray-900 hover:bg-gray-500 hover:text-gray-100">歴代</button>
      <button class="block w-64 py-4 rounded text-2xl text-center bg-gray-300 text-gray-900 hover:bg-gray-500 hover:text-gray-100">シーズン別</button>
      <button class="block w-64 py-4 rounded text-2xl text-center bg-gray-300 text-gray-900 hover:bg-gray-500 hover:text-gray-100">本日</button>
    </div>
</body>
</html>