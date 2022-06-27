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
  <main>
    <h1 class="text-5xl text-gray-900 text-center pt-8 pb-4">順位</h1>
    <p class="text-xl text-gray-900 text-center pb-8">開催時間外、もしくは登壇者の一部をSKIPされた審査員の評価点は反映されません</p>
    <a id="menu_btn" href="/menu" class="block w-64 py-4 mb-8 mx-auto rounded text-2xl text-center bg-gray-300 text-gray-900 hover:bg-gray-500 hover:text-gray-100">メニューに戻る</a>
    <div class="flex border-b border-gray-400 w-4/5 mx-auto">
      <button id="total_btn" class="block w-64 py-4 rounded text-2xl text-center bg-gray-300 text-gray-900 hover:bg-gray-500 hover:text-gray-100">歴代</button>
      <button id="seasonal_btn" class="block w-64 py-4 rounded text-2xl text-center bg-gray-300 text-gray-900 hover:bg-gray-500 hover:text-gray-100">シーズン別</button>
      <button id="today_btn" class="block w-64 py-4 rounded text-2xl text-center bg-gray-300 text-gray-900 hover:bg-gray-500 hover:text-gray-100">本日</button>
    </div>
    <div id="total_rank" class="text-center w-4/5 mx-auto mt-4">
      <div class="flex justify-center">
        <p class="w-[5%]">順位</p>
        <p class="w-[10%]">シーズン</p>
        <p class="w-[30%]">テーマ</p>
        <p class="w-[15%]">評価点</p>
        <p class="w-[20%]">登壇者</p>
        <p class="w-[20%]">クラス</p>
      </div>
      @foreach($scores as $index => $score)
      <div class="flex justify-center even:bg-gray-200 py-2">
        <p class="w-[5%] text-2xl">{{$index + 1}}位</p>
        <p class="w-[10%] text-2xl">{{$score->season_name}}</p>
        <p class="w-[30%] text-2xl">企画・リサーチ・趣味</p>
        <p class="w-[15%] text-2xl">{{sprintf('%.3f', ($score->total_score) / 5)}}</p>
        <p class="w-[20%] text-2xl">{{$score->speaker_name}}</p>
        <p class="w-[20%] text-2xl">{{$score->speaker_class}}</p>
      </div>
      @endforeach
    </div>
    <div id="seasonal_rank" class="text-center w-4/5 mx-auto mt-4 hidden">
      <div class="flex justify-center">
        <p class="w-[10%]">シーズン</p>
        <p class="w-[30%]">テーマ</p>
        <p class="w-[6%]">順位</p>
        <p class="w-[12%]">評価点</p>
        <p class="w-[21%]">登壇者</p>
        <p class="w-[21%]">クラス</p>
      </div>
      @foreach($seasons as $season)
        @if ($season->season_date <= date('Y-m-d') && $season->speaker1_name)
          <div class="flex justify-center py-2">
            <p class="w-[10%] text-2xl flex justify-center items-center border border-gray-900">{{$season->season_name}}</p>
            <p class="w-[30%] text-2xl flex justify-center items-center border-y border-r border-gray-900">企画・リサーチ・趣味</p>
            <?php $rank = 1; ?>
            <div class="w-[60%] border-y border-r border-gray-900">
              @foreach($scores as $score)
                @if($score->season_name === $season->season_name)
                  <div class="my-2 flex justify-center">
                    <p class="w-[10%] text-2xl border-r border-gray-900">{{$rank}}位</p>
                    <p class="w-[20%] text-2xl border-r border-gray-900">{{sprintf('%.3f', ($score->total_score) / 5)}}</p>
                    <p class="w-[35%] text-2xl border-r border-gray-900">{{$score->speaker_name}}</p>
                    <p class="w-[35%] text-2xl">{{$score->speaker_class}}</p>
                    <?php $rank++; ?>
                  </div>
                @endif
              @endforeach
            </div>
          </div>
        @endif
      @endforeach
    </div>

    <div id="today_rank" class="text-center w-4/5 mx-auto mt-4 hidden">
      <div class="flex justify-center">
        <p class="w-[10%]">シーズン</p>
        <p class="w-[30%]">テーマ</p>
        <p class="w-[6%]">順位</p>
        <p class="w-[12%]">評価点</p>
        <p class="w-[21%]">登壇者</p>
        <p class="w-[21%]">クラス</p>
      </div>
      @foreach($seasons as $season)
        @if ($season->season_date === date('Y-m-d') && $season->speaker1_name)
          <div class="flex justify-center py-2">
            <p class="w-[10%] text-2xl flex justify-center items-center border border-gray-900">{{$season->season_name}}</p>
            <p class="w-[30%] text-2xl flex justify-center items-center border-y border-r border-gray-900">企画・リサーチ・趣味</p>
            <?php $rank = 1; ?>
            <div class="w-[60%] border-y border-r border-gray-900">
              @foreach($scores as $score)
                @if($score->season_name === $season->season_name)
                  <div class="my-2 flex justify-center">
                    <p class="w-[10%] text-2xl border-r border-gray-900">{{$rank}}位</p>
                    <p class="w-[20%] text-2xl border-r border-gray-900">{{sprintf('%.3f', ($score->total_score) / 5)}}</p>
                    <p class="w-[35%] text-2xl border-r border-gray-900">{{$score->speaker_name}}</p>
                    <p class="w-[35%] text-2xl">{{$score->speaker_class}}</p>
                    <?php $rank++; ?>
                  </div>
                @endif
              @endforeach
            </div>
          </div>
        @endif
      @endforeach
    </div>
  </main>
  <script type="text/javascript">
    document.getElementById('total_btn').addEventListener('click', () => {
      if (document.getElementById('total_rank').classList.contains('hidden')) {
        document.getElementById('total_rank').classList.remove('hidden');
        document.getElementById('seasonal_rank').classList.add('hidden');
        document.getElementById('today_rank').classList.add('hidden');
      }
    });
    document.getElementById('seasonal_btn').addEventListener('click', () => {
      if (document.getElementById('seasonal_rank').classList.contains('hidden')) {
        document.getElementById('total_rank').classList.add('hidden');
        document.getElementById('seasonal_rank').classList.remove('hidden');
        document.getElementById('today_rank').classList.add('hidden');
      }
    });
    document.getElementById('today_btn').addEventListener('click', () => {
      if (document.getElementById('today_rank').classList.contains('hidden')) {
        document.getElementById('total_rank').classList.add('hidden');
        document.getElementById('seasonal_rank').classList.add('hidden');
        document.getElementById('today_rank').classList.remove('hidden');
      }
    });
  </script>
</body>
</html>