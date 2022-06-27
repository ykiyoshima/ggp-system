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
  <main class="w-4/5 mx-auto">
    <p class="text-4xl my-8">GGP</p>
    <p class="text-4xl my-8">シーズン {{$target_season_name}}</p>
    <div class="w-full mx-auto flex justify-center text-center pb-8">
      <p class="w-1/4 text-3xl">順位</p>
      <p class="w-1/4 text-3xl">評価点</p>
      <p class="w-1/2 text-3xl">登壇者</p>
    </div>

    <?php $rank = 1; ?>
    @foreach($scores as $score)
      @if($score->season_name === $target_season_name)
        <div class="w-full mx-auto flex justify-center items-center pb-8 text-center">
          <p class="w-1/4 text-5xl">{{$rank}}位</p>
          <p class="w-1/4 text-5xl">{{sprintf('%.3f', ($score->total_score) / 5)}}</p>
          <p class="w-1/2 text-5xl">{{$score->speaker_name}} </p>
        </div>
        <?php $rank++; ?>
      @endif
    @endforeach
    <form action="/total_result" method="POST">
      @csrf
      <input type="text" name="target_season_name" value="{{$target_season_name}}" hidden>
      <button class="block w-64 py-4 my-8 mx-auto rounded text-2xl text-center bg-gray-300 text-gray-900 hover:bg-gray-500 hover:text-gray-100">歴代</button>
    </form>
  </main>
</body>
</html>