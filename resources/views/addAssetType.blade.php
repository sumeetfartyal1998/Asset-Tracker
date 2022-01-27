<!doctype html>
<html lang="en">
  <head>
    @include('include.head')
    <title>Add</title>
  </head>
  <body class="content-wrapper">
    @include('include.nav')
    @include('include.sidebar')
    <main class="container mt-3">
      <div class="content-wrapper">
        <h1 class="jumbotron">Add Asset Type</h1>
        <form method="post" class="container">
          @csrf()

          @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
          @endif
          <div class="form-group">
            <label>Asset Type</label>
            <input type="text" class="form-control" id="" name="type">
          </div>
          @if($errors->has('type'))
            <div class="alert alert-danger">{{$errors->first('type')}}</div>
          @endif
          <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" id="" name="desc"></textarea>
          </div>
          @if($errors->has('desc'))
            <div class="alert alert-danger">{{$errors->first('desc')}}</div>
          @endif
          <button type="submit" class="btn btn-primary" name="add">Add</button>
      
        </form>
      </div>
    </main>
    @include('include.foot')
  </body>
</html>