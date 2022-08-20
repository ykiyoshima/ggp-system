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
  <form action="/result" method="POST">
    @csrf
    <button class="block w-[70%] p-16 my-16 mx-auto rounded text-6xl text-center bg-gray-300 text-gray-900 hover:bg-gray-500 hover:text-gray-100">結果発表！</button>
    <p class="text-center text-2xl">シーズン選択：<select name="season" id="season" class="border border-gray-900"></select></p>
  </form>
</body>
<script type="text/javascript">
  const selectTag = document.getElementById('season');
  const seasons = @json($seasons);

  function formatDate(dt) {
    const y = dt.getFullYear();
    const m = ('00' + (dt.getMonth()+1)).slice(-2);
    const d = ('00' + dt.getDate()).slice(-2);
    return (y + '-' + m + '-' + d);
  }

  seasons.forEach(season => {
    console.log(season['season_date'] >= formatDate(new Date()));
    if (season['season_date'] >= formatDate(new Date()) && season['speaker1_name']) {
      const option = document.createElement('option');
      option.value = season['season_name'];
      option.textContent = season['season_name'];
      selectTag.appendChild(option);
    }
  });
</script>
</html>