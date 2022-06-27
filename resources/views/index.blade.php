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
    <br>
    <a href="/ggp_admin" class="ml-[320px] cursor-pointer">　　</a>
    <img src="/img/ggp_logo.png" class="mx-auto pt-8 pb-16" width="1200px" alt="GGPロゴ">
    <br>
    <h1 class="text-6xl text-gray-900 font-bold text-center pb-16">G's Geek Pitch</h1>
    <a id="start_btn" href="/menu" class="block w-64 py-4 mx-auto rounded text-2xl text-center bg-gray-300 text-gray-900 hover:bg-gray-500 hover:text-gray-100">参加する</a>
</body>
</html>