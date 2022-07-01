<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
     <!-- Fonts -->
     <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


</head>
<body class=" bg-dark container-fluid">
    <div class="row fixed-top p-4 mb-5">
        <div class="col-12">
            <div class="d-flex justify-content-end">
                @if (Route::has('login'))
                    <div class="">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-muted">Dashboard</a>
                         
                        @else
                            <a href="{{ route('login') }}" class="text-muted">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ms-4 text-muted">Register</a>
                            @endif
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
   <div class="row cl mt-5 ">
     <a type="button" class="btn btn-light col-5 fs-1" href="{{route('phones.create')}}"  >Add new phone</a>
     <a type="button" class="btn btn-light  col-5  ms-2  fs-1" href="{{route('user.index')}}"  >User Profile</a>
   </div>


<table  class="table table-dark
mt-5 " >
  <tr>
    <th scope="col">User ID</th>
    <th scope="col">user name</th>
    <th scope="col">Mobile Phone</th>
    <th scope="col">Created At</th>
    <th scope="col">Updated At</th>
    <th scope="col"></th>
    <th scope="col"></th>
</tr>
@foreach ($phones as $phone )
<tr>
    <td>{{$phone->users_id}}</td>
    <td>{{Auth::user()->name}}</td>
    <td>{{$phone->phone}}</td>
    <td>{{$phone->created_at}}</td>
<td>{{$phone->updated_at}}</td>
<td><a type="button" class="btn btn-warning  " href="{{route("phones.edit",$phone->phone)}}"  >Update</a> </td>
<td>
<form action="{{route("phones.destroy",$phone->phone)}}" method="post">
    @method('delete')
        @csrf
        <button type="submit" class="btn btn-danger "  >Delete</button>

</form >    </td>


</tr>


@endforeach
</table>

</body>
</html>





