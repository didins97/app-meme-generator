<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input</title>
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <!-- Page Content -->
<div class="container">

    <h1 class="fw-light text-center text-lg-start mt-4 mb-0">Pilih Gambar</h1>
  
    <hr class="mt-2 mb-5">
  
    <div class="row text-center text-lg-start">
        @foreach ($memes as $item)
        <div class="col-lg-3 col-md-4 col-6">
            <a href="#" class="d-block mb-4 h-100 img" data-id="{{$item['id']}}" data-img="{{$item['url']}}">
              <img class="img-fluid img-thumbnail" src="{{$item['url']}}" alt="">
            </a>
          </div>  
        @endforeach
    </div>
  
  </div>

  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
      </div>
    </div>
  </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
    $('.img').on('click', function(){
        var id = $(this).data('id');
        var img = $(this).data('img');
        $.ajax({
            type: "Get",
            url: "/create/",
            data: {
                id: id,
                img: img
            },
            success: function (response) {
                // console.log(response);
                $('.modal').find('.modal-body').html(response);
                $('.modal').modal('show');
            }
        });
    });
</script>

</html>