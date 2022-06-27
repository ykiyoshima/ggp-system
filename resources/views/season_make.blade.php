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
  <main class="w-4/5 m-auto">
    <h1 class="text-6xl text-center py-16">シーズン作成</h1>
    <form action="/season_make" method="POST">
      @csrf
      <p class="text-3xl text-center py-4">シーズン名：<input type="text" placeholder="必須" name="season_name" class="border border-gray-900"></p>
      <p class="text-3xl text-center py-4">テーマ：<input type="text" placeholder="必須" name="season_theme" class="border border-gray-900"></p>
      <p class="text-3xl text-center py-4">開催日：<input type="date" name="season_date" class="border border-gray-900"></p>
      <button class="block w-64 py-4 mt-4 mx-auto rounded text-2xl text-center bg-gray-300 text-gray-900 hover:bg-gray-500 hover:text-gray-100">作成</button>
    </form>
  </main>
</body>
</html>