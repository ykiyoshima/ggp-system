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
  <h1 class="text-6xl text-center py-16">管理者</h1>
  <form action="/ggp_admin_login" method="POST">
    @csrf
    <p class="text-2xl text-center pb-16">Password: <input type="password" name="password" class="border border-gray-900"></p>
    <p class="text-2xl text-center pb-16">{{$message}}</p>
    <button class="block w-64 py-4 mb-8 mx-auto rounded text-2xl text-center bg-gray-300 text-gray-900 hover:bg-gray-500 hover:text-gray-100">ログイン</button>
  </form>

</body>
</html>