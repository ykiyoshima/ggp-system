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
    <h1 class="text-6xl text-gray-900 font-bold text-center py-32">管理者MENU</h1>

    <div class="w-4/5 mx-auto flex justify-center">
      <div>
        <a id="result_btn" href="/result" class="block w-64 py-4 mb-8 mx-auto rounded text-2xl text-center bg-gray-300 text-gray-900 hover:bg-gray-500 hover:text-gray-100">結果発表</a>
        <a id="season_manage_btn" href="/season_manage" class="block w-64 py-4 mb-8 mx-auto rounded text-2xl text-center bg-gray-300 text-gray-900 hover:bg-gray-500 hover:text-gray-100">シーズン管理</a>
      </div>
      <div class="ml-16">
        <a id="reserve_btn" href="/season" class="block w-64 py-4 mb-8 mx-auto rounded text-2xl text-center bg-gray-300 text-gray-900 hover:bg-gray-500 hover:text-gray-100">登壇予約</a>
        <a id="rank_btn" href="/rank" class="block w-64 py-4 mb-8 mx-auto rounded text-2xl text-center bg-gray-300 text-gray-900 hover:bg-gray-500 hover:text-gray-100">過去の順位</a>
        <a id="comment_btn" href="/comment" class="block w-64 py-4 mb-8 mx-auto rounded text-2xl text-center bg-gray-300 text-gray-900 hover:bg-gray-500 hover:text-gray-100">評価・コメント</a>
      </div>
    </div>
</body>
</html>