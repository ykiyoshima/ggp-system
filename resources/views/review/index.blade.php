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
    <h1 class="text-5xl text-gray-900 text-center pt-32 pb-16">〜公平な審査にご協力ください〜</h1>
    <p class="text-2xl text-gray-900 text-center pb-32">順位へ反映される得点は、登壇者全員を評価して下さった方を対象とし、<br>その他の方は、得点・コメントの記録のみとなります。</p>
    <p class="text-3xl text-gray-900 text-center pb-8">審査するシーズン：{{$season ? $season->season_name.'（' : '本日はGGPお休みです'}}{{$season ? $season->season_date.'）' : ''}}</p>
    @if ($season)
        <form action="/prepare" method="POST">
            @csrf
            <p class="text-3xl text-gray-900 text-center pb-8">審査員氏名：<input type="text" name="reviewer_name" placeholder="必須" class="border border-gray-900"></p>
            <input type="text" name="speaker_number" value="0" hidden>
            <button id="start_review_btn" class="block w-64 py-4 mb-16 mx-auto rounded text-2xl text-center bg-gray-300 text-gray-900 hover:bg-gray-500 hover:text-gray-100">審査を開始</button>
        </form>
    @endif
    <a id="menu_btn" href="/menu" class="block w-64 py-4 mx-auto rounded text-2xl text-center bg-gray-300 text-gray-900 hover:bg-gray-500 hover:text-gray-100">メニューへ戻る</a>
</body>
</html>