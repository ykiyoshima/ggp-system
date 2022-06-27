<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GGP</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <main class="w-4/5 mx-auto">
    <h1 class="text-6xl text-center mt-16">優勝</h1>
    @foreach($scores as $score)
      @if($score->season_name === $target_season_name)
        <div class="flex justify-center items-center my-16">
          <img src="/img/king.jpg" alt="king" width="192px">
          <p class="text-center text-[160px]">{{$score->speaker_name}} </p>
          <p class="text-[64px]">　</p>
          <p class="text-center text-[80px] pt-[80px]">{{sprintf('%.3f', ($score->total_score) / 5)}}点</p>
        </div>
        @break
      @endif
    @endforeach

    <form action="/season_result" method="POST">
      @csrf
      <input type="text" name="target_season_name" value="{{$target_season_name}}" hidden>
      <button class="block w-64 py-4 mb-8 mx-auto rounded text-2xl text-center bg-gray-300 text-gray-900 hover:bg-gray-500 hover:text-gray-100">全体</button>
    </form>
  </main>
</body>
</html>