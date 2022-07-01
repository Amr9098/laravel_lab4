<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>user index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>
<body class="bg-dark">

      <div class="col-lg-4 col-md-4 col-sm-4 container justify-content-center mt-5">

        <h1 class="page-header mb-5 fw-bold text-white bg-dark">User Profile</h1>
        <div class="card bg-black text-white" style="width: 25rem;">
            <img class="w-25 mb-1 col-5" src="https://upload.wikimedia.org/wikipedia/commons/f/f4/User_Avatar_2.png" class="card-img-top" alt="..." >
            <div class="card-body">
                <h5 class=" text-center ">  Hello     ::  {{Auth::user()->name}}</h5>
                <h5 class="mt-3 text-danger"> Address --> {{Auth::user()->address}}</h5>
               <div class="card-footer mt-3">
                 <button type="button" class="btn btn-light " data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                     Update address
                 </button>
                   <a type="btn" class="btn btn-warning  w-50  " href="{{route("phones.index")}}">Mobile Phones</a>

               </div>
                  </div>
          </div>
    </div>
    <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Update Address</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

        </div>
        <div class="modal-body">

                <form action="{{route("user.update",Auth::user()->address)}}" method="Post" autocomplete="off" >
                    @method("PUT")
                    @csrf
                    <div class="form-group ">
                      <label class="fw-bold">new address</label>
                      <input type="text" class="form-control"  name="address"  value="{{Auth::user()->address}}" required>

                    </div>
                    <button type="submit" class="btn btn-warning mt-4 w-25  ">Update</button>
                    <button type="button" class="btn btn-secondary mt-4 w-25" data-bs-dismiss="modal">Close</button>
                  </form>


        </div>

      </div>
    </div>
  </div>
</body>
</html>







