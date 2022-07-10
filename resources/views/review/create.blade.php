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
  <main class="w-4/5 mx-auto">
    @include('common.errors')
    @if ($speaker_number == 1)
      <h1 class="text-5xl text-gray-900 pt-8 pb-16">登壇者　　{{$season->speaker1_name}}</h1>
    @elseif ($speaker_number == 2)
      <h1 class="text-5xl text-gray-900 pt-8 pb-16">登壇者　　{{$season->speaker2_name}}</h1>
    @elseif ($speaker_number == 3)
      <h1 class="text-5xl text-gray-900 pt-8 pb-16">登壇者　　{{$season->speaker3_name}}</h1>
    @elseif ($speaker_number == 4)
      <h1 class="text-5xl text-gray-900 pt-8 pb-16">登壇者　　{{$season->speaker4_name}}</h1>
    @elseif ($speaker_number == 5)
      <h1 class="text-5xl text-gray-900 pt-8 pb-16">登壇者　　{{$season->speaker5_name}}</h1>
    @endif
    <form action="/btn_check" method="POST">
      @csrf
      <input type="text" name="speaker_number" value="{{$speaker_number}}" hidden>
      <input type="text" name="reviewer_name" value="{{$reviewer_name}}" hidden>
      <div class="flex flex-col">
        <div class="flex justify-center mb-4">
          <div class="flex w-1/3 justify-end">
            <p class="text-3xl pt-3">評価</p>
            <p class="text-md pt-6">/得点</p>
          </div>
          <div class="flex w-2/3 justify-between">
            <div class="flex w-1/5 justify-center">
              <p class="text-5xl">S</p>
              <p class="text-md pt-6">/1</p>
            </div>
            <div class="flex w-1/5 justify-center">
              <p class="text-5xl">A</p>
              <p class="text-md pt-6">/2</p>
            </div>
            <div class="flex w-1/5 justify-center">
              <p class="text-5xl">B</p>
              <p class="text-md pt-6">/3</p>
            </div>
            <div class="flex w-1/5 justify-center">
              <p class="text-5xl">C</p>
              <p class="text-md pt-6">/4</p>
            </div>
            <div class="flex w-1/5 justify-center">
              <p class="text-5xl">D</p>
              <p class="text-md pt-6">/5</p>
            </div>
          </div>
        </div>
        <div class="flex justify-center bg-gray-200 py-2">
          <div class="flex w-1/3 justify-end">
            <p class="text-3xl">声の大きさ・トーン</p>
          </div>
          <div class="flex w-2/3 justify-between">
            <div class="flex w-1/5 justify-center">
              <input type="radio" name="voice_score" value=1 class="scale-150">
            </div>
            <div class="flex w-1/5 justify-center">
              <input type="radio" name="voice_score" value=2 class="scale-150">
            </div>
            <div class="flex w-1/5 justify-center">
              <input type="radio" name="voice_score" value=3 class="scale-150">
            </div>
            <div class="flex w-1/5 justify-center">
              <input type="radio" name="voice_score" value=4 class="scale-150">
            </div>
            <div class="flex w-1/5 justify-center">
              <input type="radio" name="voice_score" value=5 class="scale-150">
            </div>
          </div>
        </div>
        <div class="flex justify-center py-2">
          <div class="flex w-1/3 justify-end">
            <p class="text-3xl">表情</p>
          </div>
          <div class="flex w-2/3 justify-between">
            <div class="flex w-1/5 justify-center">
              <input type="radio" name="appearance_score" value=1 class="scale-150">
            </div>
            <div class="flex w-1/5 justify-center">
              <input type="radio" name="appearance_score" value=2 class="scale-150">
            </div>
            <div class="flex w-1/5 justify-center">
              <input type="radio" name="appearance_score" value=3 class="scale-150">
            </div>
            <div class="flex w-1/5 justify-center">
              <input type="radio" name="appearance_score" value=4 class="scale-150">
            </div>
            <div class="flex w-1/5 justify-center">
              <input type="radio" name="appearance_score" value=5 class="scale-150">
            </div>
          </div>
        </div>
        <div class="flex justify-center bg-gray-200 py-2">
          <div class="flex w-1/3 justify-end">
            <p class="text-3xl">情熱・熱量</p>
          </div>
          <div class="flex w-2/3 justify-between">
            <div class="flex w-1/5 justify-center">
              <input type="radio" name="passion_score" value=1 class="scale-150">
            </div>
            <div class="flex w-1/5 justify-center">
              <input type="radio" name="passion_score" value=2 class="scale-150">
            </div>
            <div class="flex w-1/5 justify-center">
              <input type="radio" name="passion_score" value=3 class="scale-150">
            </div>
            <div class="flex w-1/5 justify-center">
              <input type="radio" name="passion_score" value=4 class="scale-150">
            </div>
            <div class="flex w-1/5 justify-center">
              <input type="radio" name="passion_score" value=5 class="scale-150">
            </div>
          </div>
        </div>
        <div class="flex justify-center py-2">
          <div class="flex w-1/3 justify-end">
            <p class="text-3xl">スライド構成・デザイン</p>
          </div>
          <div class="flex w-2/3 justify-between">
            <div class="flex w-1/5 justify-center">
              <input type="radio" name="design_score" value=1 class="scale-150">
            </div>
            <div class="flex w-1/5 justify-center">
              <input type="radio" name="design_score" value=2 class="scale-150">
            </div>
            <div class="flex w-1/5 justify-center">
              <input type="radio" name="design_score" value=3 class="scale-150">
            </div>
            <div class="flex w-1/5 justify-center">
              <input type="radio" name="design_score" value=4 class="scale-150">
            </div>
            <div class="flex w-1/5 justify-center">
              <input type="radio" name="design_score" value=5 class="scale-150">
            </div>
          </div>
        </div>
        <div class="flex justify-center bg-gray-200 py-2">
          <div class="flex w-1/3 justify-end">
            <p class="text-3xl">PC操作・立ち回り</p>
          </div>
          <div class="flex w-2/3 justify-between">
            <div class="flex w-1/5 justify-center">
              <input type="radio" name="behavior_score" value=1 class="scale-150">
            </div>
            <div class="flex w-1/5 justify-center">
              <input type="radio" name="behavior_score" value=2 class="scale-150">
            </div>
            <div class="flex w-1/5 justify-center">
              <input type="radio" name="behavior_score" value=3 class="scale-150">
            </div>
            <div class="flex w-1/5 justify-center">
              <input type="radio" name="behavior_score" value=4 class="scale-150">
            </div>
            <div class="flex w-1/5 justify-center">
              <input type="radio" name="behavior_score" value=5 class="scale-150">
            </div>
          </div>
        </div>
      </div>

      <div class="mt-16">
        <p class="text-2xl mb-4">登壇者へコメント</p>
        <textarea name="comment" id="comment" class="w-full text-2xl p-2 border border-gray-900 h-24" placeholder="500文字以内"></textarea>
      </div>

      <div class="flex justify-end mt-8">
        <button name="skip_btn" class="block w-64 py-4 rounded text-2xl text-center text-gray-100 bg-gray-300 text-gray-900 hover:bg-gray-500">SKIP</button>
        <button name="done_btn" class="block w-64 py-4 ml-8 rounded text-2xl text-center text-gray-100 bg-gs text-gray-900 hover:bg-hover-gs">DONE</button>
      </div>
    </form>
  </main>

</body>
</html>