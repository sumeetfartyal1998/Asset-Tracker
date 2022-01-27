<!DOCTYPE html>
<html lang="en">
<head>
    @include('include.head')
    <style>
        .w-5{
            display: none;
        }
    </style>
    <title>Asset</title>
</head>
<body class="content-wrapper">
    @include('include.nav')
    @include('include.sidebar')
    <main class="content-wrapper">
        <div class="content">
        <div class="card mt-2">
            <div class="card-header">
            <h3 class="card-title"><?php if(isset($type_name)){ echo $type_name;}?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body" id="resultarea">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th class="">Asset Name</th>
                    <th>Active</th>
                    <th>Images</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $n=(($assets->currentPage()*$assets->perPage())-$assets->perPage())+1;
                @endphp
                @foreach($assets as $asset)
                <tr>
                    <td>{{$n}}.</td>
                    <td>{{$asset['name']}}</td>
                    <td>
                        @if($asset['active'])
                        Yes
                        @else
                        No
                        @endif
                    </td>
                    <td><a href="/dispImg/{{$asset['id']}}"><button class="btn btn-light" name="sub">Show</button></a>
                    </td>
                    <td><a href="/editAsset/{{$asset['id']}}"><button class="btn btn-info" name="sub" type="submit">Edit</button></a>
                        &nbsp;
                        <a href="javascript:void(0)" aid="{{$asset['id']}}" class="btn btn-danger delbtn">Delete</a>
                    </td>
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
                {{$assets->links()}}
                <!-- <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li> -->
            </ul> 
            </div>
        </div>
        </div>
    </main>

    @include('include.foot')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".delbtn").click(function(){
                if(confirm('Are you sure you want to delete this asset?')){
                    var id = $(this).attr("aid");
                    console.log('hello')
                    $.ajax({
                        url:"{{url('delAsset')}}",
                        type:'delete',
                        
                        data:{_token:'{{csrf_token()}}',id:id},
                        success:function(response){
                            $("#resultarea").load(document.URL +' #resultarea')
                            console.log(response)
                        }
                    })
                }
            })
        })
    </script>
</body>
</html>