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
    <h1 class="text-5xl text-gray-900 text-center pt-8 pb-4">評価・コメント</h1>
    <p class="text-xl text-gray-900 text-center pb-8">順位へ反映されないものを含む、全ての評価結果となります</p>
    <a id="menu_btn" href="/menu" class="block w-64 py-4 mb-8 mx-auto rounded text-2xl text-center bg-gray-300 text-gray-900 hover:bg-gray-500 hover:text-gray-100">メニューに戻る</a>
    <div class="flex pb-2 w-4/5 mx-auto">
      <p>シーズンを選択：</p>
      <select name="target_season" id="seasons" class="border border-gray-900"><option hidden>選択してください</option></select>
    </div>
    <div class="flex border-b border-gray-400 w-4/5 mx-auto">
      <p>登壇者を選択：</p>
      <select name="target_speaker" id="speakers" class="border border-gray-900"><option hidden>選択してください</option></select>
    </div>

    <div class="w-4/5 mx-auto text-xl">
      <div class="flex justify-center text-center">
        <p class="w-[10%]">声の大きさ<br>トーン</p>
        <p class="w-[10%]">表情</p>
        <p class="w-[10%]">情熱・熱量</p>
        <p class="w-[10%]">スライド構成<br>デザイン</p>
        <p class="w-[10%]">PC操作<br>立ち回り</p>
        <p class="w-[10%]">評価点</p>
        <p class="w-[40%]">コメント</p>
      </div>

      <div id="comments"></div>
    </div>
</body>
<script type="text/javascript">
  const selectSeasonTag = document.getElementById('seasons');
  const seasons = @json($seasons);
  seasons.forEach(season => {
    const option = document.createElement('option');
    option.value = season['season_name'];
    option.textContent = season['season_name'];
    selectSeasonTag.appendChild(option);
  });

  const selectSpeakerTag = document.getElementById('speakers');
  const scoreParts = @json($scoreParts);
  selectSeasonTag.addEventListener('change', () => {
    while (selectSpeakerTag.firstChild) {
      selectSpeakerTag.removeChild(selectSpeakerTag.firstChild);
    }
    scoreParts.forEach(score => {
      if (score['season_name'] === selectSeasonTag.options[selectSeasonTag.selectedIndex].value) {
        const option = document.createElement('option');
        option.value = score['speaker_name'];
        option.textContent = score['speaker_name'];
        selectSpeakerTag.appendChild(option);
      }
    });
  });

  const eachScores = @json($eachScores);
  selectSpeakerTag.addEventListener('change', () => {
    let commentsTags = '';
    eachScores.forEach(score => {
      if (score['season_name'] === selectSeasonTag.options[selectSeasonTag.selectedIndex].value && score['speaker_name'] === selectSpeakerTag.options[selectSpeakerTag.selectedIndex].value) {
        commentsTags += `<div class="w-full flex justify-center text-center odd:bg-gray-200"><p class="w-[10%]">${score['voice_score']}</p><p class="w-[10%]">${score['appearance_score']}</p><p class="w-[10%]">${score['passion_score']}</p><p class="w-[10%]">${score['design_score']}</p><p class="w-[10%]">${score['behavior_score']}</p><p class="w-[10%]">${((score['voice_score'] + score['appearance_score'] + score['passion_score'] + score['design_score'] + score['behavior_score']) / 5).toFixed(3)}</p><p class="w-[40%]">${score['comment']}</p></div>`;
        document.getElementById('comments').innerHTML = commentsTags;
      }
    });
  });
</script>
</html>