<!DOCTYPE html>
<html lang="en">
<head>
    @include('include.head')
    <title>Edit Asset</title>
</head>
<body class="content-wrapper">
    @include('include.nav')
    @include('include.sidebar')
    <main class="container mt-3">
        <div class="content-wrapper">
            <h1 class="jumbotron">Update Asset</h1>
            <form action="/updateAsset" method="post">
                @csrf()

                <!-- Success Message -->
                @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif

                <!-- Hidden Asset id -->
                <input type="hidden" name="id" value="<?php if(isset($asset[0]->id)){echo $asset[0]->id;}?>">

                <!-- Asset Name -->
                <div class="form-group">
                    <label for="">Asset Name</label>
                    <input type="text" name="name" class="form-control" value="<?php if(isset($asset[0]->name)){echo $asset[0]->name;}?>">
                </div>
                @if($errors->has('name'))
                    <div class="alert alert-danger">{{$errors->first('name')}}</div>
                @endif

                <!--Asset Type  -->
                <div class="form-group">
                    <label for="">Asset Type</label>
                    <select name="type" id="" class="form-control">
                        <option  value="">--Select an option--</option>
                        @if(isset($type))
                        @foreach($type as $t)
                        <option value="{{$t['id']}}" <?php if($t['id']==$asset[0]->asset_types_id){echo 'selected';}?> class="">{{$t['asset_type']}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
                @if($errors->has('type'))
                    <div class="alert alert-danger">{{$errors->first('type')}}</div>
                @endif

                <!-- isActive -->
                <div class="form-group">
                    <label for="">Active</label><br>
                    <input type="radio" name="active" value="1" <?php if(isset($asset)){if($asset[0]->active==1){ echo 'checked';}}?>>Active<br>
                    <input type="radio" name="active" value="0" <?php if(isset($asset)){if($asset[0]->active==0){ echo 'checked';}}?>>Inactive
                </div>

                <!-- Update button -->
                <button class=" btn btn-success" type="submit" name="sub">Update</button>
            </form>
        </div>
    </main>
    @include('include.foot')
</body>
</html>