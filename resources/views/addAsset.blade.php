<!doctype html>
<html lang="en">
  <head>
    @include('include.head')
    <title>Add</title>
  </head>
  <body class="content-wrapper">
    @include('include.nav')
    @include('include.sidebar')
    <main class="container mt-2">
      <div class="content-wrapper">
        <h1 class="jumbotron">Add Asset</h1>
        <form method="post" class="container" enctype="multipart/form-data">
          @csrf()

          @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
          @endif

          <!-- Asset name -->
          <div class="form-group">
            <label>Asset Name</label>
            <input type="text" class="form-control" id="" name="asset">
          </div>
          @if($errors->has('asset'))
            <div class="alert alert-danger">{{$errors->first('asset')}}</div>
          @endif

          <!-- Asset type -->
          <label for="">Asset Type</label>
          <div class="form-group">
              <select name="type" id="" class="form-control">
                  <option disabled selected value="">--Select an option--</option>
                  @foreach($data as $d)
                  <option value="{{$d['id']}}" class="">{{$d['asset_type']}}</option>
                  @endforeach
              </select>
          </div>
          @if($errors->has('type'))
            <div class="alert alert-danger">{{$errors->first('type')}}</div>
          @endif


          <!-- Asset image -->
          <div class="form-group mt-4">
              <label for="exampleFormControlFile1">Upload an image</label>
              <input type="file" class="form-control-file" id="exampleFormControlFile1" name="img[]" multiple='true'>
          </div>
          @if($errors->has('img[]'))
            <div class="alert alert-danger">{{$errors->first('img[]')}}</div>
          @endif


          <!-- isActive -->
          <div class="form-group">
              <label>Is Active?</label><br>
              <input type="radio" name="active" value="1" checked>Active<br>
              <input type="radio" name="active" value="0">Inactive
          </div>
          @if($errors->has('active'))
              <div class="alert alert-danger">{{$errors->first('active')}}</div>
          @endif


          <button type="submit" class="btn btn-primary" name="add">Add</button>
      
        </form>
      </div>
    </main>
    @include('include.foot')
  </body>
</html>