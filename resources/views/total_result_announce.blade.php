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
  <div class="w-4/5 mx-auto py-16">
    <p class="text-4xl my-8">GGP</p>
    <p class="text-4xl my-8">歴代</p>
  </div>
  <div id="total_rank" class="text-center w-4/5 mx-auto pb-8 mt-4">
    <div class="flex justify-center">
      <p class="w-[5%]">順位</p>
      <p class="w-[10%]">シーズン</p>
      <p class="w-[30%]">テーマ</p>
      <p class="w-[15%]">評価点</p>
      <p class="w-[20%]">登壇者</p>
      <p class="w-[20%]">クラス</p>
    </div>
    @foreach($scores as $index => $score)
      @if ($score->season_name === $target_season_name)
        <div class="flex justify-center bg-yellow-200 py-2">
      @else
        <div class="flex justify-center even:bg-gray-200 py-2">
      @endif
        <p class="w-[5%] text-2xl">{{$index + 1}}位</p>
        <p class="w-[10%] text-2xl">{{$score->season_name}}</p>
        <p class="w-[30%] text-2xl">企画・リサーチ・趣味</p>
        <p class="w-[15%] text-2xl">{{sprintf('%.3f', ($score->total_score) / 5)}}</p>
        <p class="w-[20%] text-2xl">{{$score->speaker_name}}</p>
        <p class="w-[20%] text-2xl">{{$score->speaker_class}}</p>
      </div>
    @endforeach
  </div>

  <a href="/admin_menu" class="block w-64 py-4 mx-auto rounded text-2xl text-center bg-gray-300 text-gray-900 hover:bg-gray-500 hover:text-gray-100">管理者MENU</a>
</body>
</html>