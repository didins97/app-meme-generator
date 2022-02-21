<form action="{{ url('/generate') }}" method="POST" enctype="application/x-www-form-urlencoded">
    @csrf
    <div class="mb-3">
        <img src="{{$img}}" class="rounded mx-auto d-block" width="200" alt="...">
        <input type="text" name="template_id" value="{{$id}}" hidden>
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Username</label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" class="form-control" name="password" id="exampleInputPassword1">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Upper Text</label>
      <input type="text" class="form-control" name="text0" id="exampleInputPassword1">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Lower Text</label>
      <input type="text" class="form-control" name="text1" id="exampleInputPassword1">
    </div>
    <button type="submit" class="btn btn-primary float-end">Submit</button>
</form>