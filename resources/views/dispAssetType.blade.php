<!DOCTYPE html>
<html lang="en">
<head>
    @include('include.head')
    <style>
        .w-5{
            display: none;
        }
    </style>
    <title>Asset Types</title>
</head>
<body class="content-wrapper">
    @include('include.nav')
    @include('include.sidebar')
    <main class="content-wrapper">
        <div class="content">
        <div class="card mt-2">
            <div class="card-header">
            <h3 class="card-title">Asset Types</h3>
            
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th class="col-2">Asset Type</th>
                    <th>Description</th>
                    <th style="width: 40px">Assets</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $n=1
                @endphp
                @foreach($types as $type)
                <tr>
                    <td>{{$n}}.</td>
                    <td>{{$type['asset_type']}}</td>
                    <td>
                    {{$type['asset_desc']}}
                    </td>
                    <!-- <form action="/dispAsset/{{$type['id']}}" method="get">
                        @csrf()
                        <input type="hidden" name="id" value="{{$type['id']}}"> -->
                    <td><a href="/dispAsset/{{$type['id']}}"><button type="submit" class="btn btn-light" name="sub">Show</button></a></td>
                    <!-- </form> -->
                </tr>
                @php
                $n++
                @endphp
                @endforeach
                </tbody>

            </table>
            <span>
                
            </span>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    {{$types->links()}}
                </ul>
            </div>
        </div>
        </div>
    </main>

    @include('include.foot')
</body>
</html>