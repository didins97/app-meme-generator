<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="d-flex">
        @foreach ($memes as $item)
            <img class="meme_image" id="{{$item['id']}}" src="{{$item['url']}}">
        @endforeach
    </div>
    <form action="{{ url('/generate') }}" method="POST" enctype="application/x-www-form-urlencoded">
        @csrf
        <div class="input-container">
            <label for="">ID</label>
            <input id="template_id" required name="template_id" type="text">
        </div>
        <div class="input-container">
            <label for="">Username</label>
            <input required name="username" type="text">
        </div>
        <div class="input-container">
            <label for="">Password</label>
            <input required name="password" type="password">
        </div>
        <div class="input-container">
            <label for="">Upper text</label>
            <input required name="text0" type="text">
        </div>
        <div class="input-container">
            <label for="">Lower Text</label>
            <input required name="text1" type="text">
        </div>
        <button type="submit" class="btn-primary">
            Send
        </button>
    </form>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    var images = document.getElementsByClassName('meme_image');
    var templateInput = document.getElementById('template_id');
    for(const i of images){
        i.addEventListener('click', (e) => {
            templateInput.value = i.id;
            console.log(i.id);
        });
    }
</script>

</html>