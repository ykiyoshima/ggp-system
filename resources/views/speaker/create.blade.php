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
  <h1 class="text-6xl text-gray-900 font-bold text-center pt-16 pb-8">GGPに登壇</h1>
  <p class="text-xl text-gray-900 text-center pb-16">エントリー受付順が登壇する順番となります</p>

  <div>
    <form action="{{route('season.store')}}" method="POST">
      @csrf
      <input type="text" name="season_name" value="{{$season->season_name}}" hidden>
      <input type="text" name="season_date" value="{{$season->season_date}}" hidden>
      <input type="text" name="season_theme" value="{{$season->season_theme}}" hidden>
      <input type="text" name="speaker_number" value="{{$speaker_number}}" hidden>
      <p class="text-2xl text-gray-900 text-center pb-8">登壇するシーズン：{{$season->season_name}}（{{$season->season_date}}）, {{$speaker_number}}番目</p>
      <p class="text-2xl text-gray-900 text-center pb-8">所属クラス：<select name="speaker{{$speaker_number}}_class" id="speaker_class" class="border border-gray-900"><option value="F_LAB_07">F_LAB_07</option><option value="F_DEV_11">F_DEV_11</option><option value="Y_DEV_02">Y_DEV_02</option><option value="T_LAB_13">T_LAB_13</option><option value="T_DEV_23">T_DEV_23</option><option value="S_DEV_5">S_DEV_5</option></select></p>
      <p class="text-2xl text-gray-900 text-center pb-16">登壇者氏名：<input type="text" class="border border-gray-900" name="speaker{{$speaker_number}}_name" placeholder="必須"></p>
      <button class="block w-64 mx-auto py-4 rounded text-2xl text-center bg-gray-300 text-gray-900 hover:bg-gray-500 hover:text-gray-100">確定</button>
    </form>
  </div>
</body>
</html>