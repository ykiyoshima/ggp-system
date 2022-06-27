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
  <h1 class="text-6xl text-gray-900 font-bold text-center pt-16 pb-8">GGPに登壇</h1>
  <p class="text-xl text-gray-900 text-center pb-16">エントリー受付順が登壇する順番となります</p>

  <div>
    <p>登壇するシーズン：{{$season->season_name}}（{{$season->season_date}}）</p>
    <p>所属クラス：<select name="class" id="class"><option value="F_LAB_07">F_LAB_07</option><option value="F_DEV_11">F_DEV_11</option><option value="Y_DEV_02">Y_DEV_02</option><option value="T_LAB_13">T_LAB_13</option><option value="T_DEV_23">T_DEV_23</option><option value="S_DEV_5">S_DEV_5</option></select></p>
  </div>
</body>
</html>