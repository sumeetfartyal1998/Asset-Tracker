<!DOCTYPE html>
<html lang="en">
<head>
    @include('include.head')
    <style>
        .w-5{
            display: none;
        }
    </style>
    <title>Asset Images</title>
</head>
<body class="content-wrapper">
    @include('include.nav')
    @include('include.sidebar')
    <main class="content-wrapper">
        <div class="content">
        <div class="card mt-2">
            <div class="card-header">
            <h3 class="card-title">{{$asset_name}}  Images</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body row">
                @foreach($img as $i)
                <div class="col-2">
                    <img src="{{asset('Uploads/'.$i['img'])}}" alt="" width="100%">
                </div>
                @endforeach
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                
                </ul>
            </div>
        </div>
        </div>
    </main>

    @include('include.foot')
</body>
</html>