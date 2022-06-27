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
    <h1 class="text-6xl text-gray-900 font-bold text-center pt-32 pb-16">登壇予約</h1>
    <a id="menu_btn" href="/menu" class="block w-64 py-4 mb-16 mx-auto rounded text-2xl text-center bg-gray-300 text-gray-900 hover:bg-gray-500 hover:text-gray-100">メニューに戻る</a>
    <div>
      <div class="flex justify-center text-xl text-gray-900 text-center">
        <p class="w-16">状態</p>
        <p class="w-24">シーズン</p>
        <p class="w-32">開催日</p>
        <p class="w-56">テーマ</p>
        <p class="w-[30rem]">登壇者</p>
      </div>
      @foreach ($seasons as $season)
      @if ($season->season_date >= date('Y-m-d'))
        <div class="flex justify-center text-xl text-gray-900 text-center mb-4">
          <p class="w-16 h-[192px] flex justify-center items-center border border-gray-900">受付中</p>
          <p class="w-24 h-[192px] flex justify-center items-center border-y border-r border-gray-900">{{$season->season_name}}</p>
          <p class="w-32 h-[192px] flex justify-center items-center border-y border-r border-gray-900">{{$season->season_date}}</p>
          <p class="w-56 h-[192px] flex justify-center items-center border-y border-r border-gray-900">{{$season->season_theme}}</p>
          <div class="w-[30rem] h-[192px] border-y border-r border-gray-900">
            @if ($season->speaker1_name)
              <div class="flex justify-center items-center my-2 divide-x divide-gray-400"><p class="w-[10%]">1</p><p class="w-[30%]">{{$season->speaker1_class}}</p><p class="w-2/5">{{$season->speaker1_name}}</p><div class="w-1/5"><p>---</p></div></div>
            @else
              <div class="flex justify-center items-center my-2 divide-x divide-gray-400"><p class="w-[10%]">1</p><p class="w-[30%]">--------</p><p class="w-2/5">募集中</p><div class="w-1/5"><a href="/season/create?season_name={{$season->season_name}}&speaker_number=1" class="px-4 py-1 text-base mx-auto rounded bg-gray-300 hover:bg-gray-500 hover:text-gray-100 cursor-pointer">参加</a></div></div>
            @endif
            @if ($season->speaker2_name)
              <div class="flex justify-center items-center my-2 divide-x divide-gray-400"><p class="w-[10%]">2</p><p class="w-[30%]">{{$season->speaker2_class}}</p><p class="w-2/5">{{$season->speaker2_name}}</p><div class="w-1/5"><p>---</p></div></div>
            @else
              <div class="flex justify-center items-center my-2 divide-x divide-gray-400"><p class="w-[10%]">2</p><p class="w-[30%]">--------</p><p class="w-2/5">募集中</p><div class="w-1/5"><a href="/season/create?season_name={{$season->season_name}}&speaker_number=2" class="px-4 py-1 text-base mx-auto rounded bg-gray-300 hover:bg-gray-500 hover:text-gray-100 cursor-pointer">参加</a></div></div>
            @endif
            @if ($season->speaker3_name)
              <div class="flex justify-center items-center my-2 divide-x divide-gray-400"><p class="w-[10%]">3</p><p class="w-[30%]">{{$season->speaker3_class}}</p><p class="w-2/5">{{$season->speaker3_name}}</p><div class="w-1/5"><p>---</p></div></div>
            @else
              <div class="flex justify-center items-center my-2 divide-x divide-gray-400"><p class="w-[10%]">3</p><p class="w-[30%]">--------</p><p class="w-2/5">募集中</p><div class="w-1/5"><a href="/season/create?season_name={{$season->season_name}}&speaker_number=3" class="px-4 py-1 text-base mx-auto rounded bg-gray-300 hover:bg-gray-500 hover:text-gray-100 cursor-pointer">参加</a></div></div>
            @endif
            @if ($season->speaker4_name)
              <div class="flex justify-center items-center my-2 divide-x divide-gray-400"><p class="w-[10%]">4</p><p class="w-[30%]">{{$season->speaker4_class}}</p><p class="w-2/5">{{$season->speaker4_name}}</p><div class="w-1/5"><p>---</p></div></div>
            @else
              <div class="flex justify-center items-center my-2 divide-x divide-gray-400"><p class="w-[10%]">4</p><p class="w-[30%]">--------</p><p class="w-2/5">募集中</p><div class="w-1/5"><a href="/season/create?season_name={{$season->season_name}}&speaker_number=4" class="px-4 py-1 text-base mx-auto rounded bg-gray-300 hover:bg-gray-500 hover:text-gray-100 cursor-pointer">参加</a></div></div>
            @endif
            @if ($season->speaker5_name)
              <div class="flex justify-center items-center my-2 divide-x divide-gray-400"><p class="w-[10%]">5</p><p class="w-[30%]">{{$season->speaker5_class}}</p><p class="w-2/5">{{$season->speaker5_name}}</p><div class="w-1/5"><p>---</p></div></div>
            @else
              <div class="flex justify-center items-center my-2 divide-x divide-gray-400"><p class="w-[10%]">5</p><p class="w-[30%]">--------</p><p class="w-2/5">募集中</p><div class="w-1/5"><a href="/season/create?season_name={{$season->season_name}}&speaker_number=5" class="px-4 py-1 text-base mx-auto rounded bg-gray-300 hover:bg-gray-500 hover:text-gray-100 cursor-pointer">参加</a></div></div>
            @endif
          </div>
        </div>
      @endif
      @endforeach
    </div>
</body>
</html>