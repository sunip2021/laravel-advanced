<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    @if(session('successmsg'))
      <div class="alert alert-success">{{ session('successmsg')}}</div>
      @endif
   <div class="card w-60 mx-auto">
    <div class="card-header">
      
        Employee List
    </div>
    <div class="card-body">
        <table class="table table-bordered">
          <thead>

            <tr>

                <th>Name</th>
                <th>Email</th>
                  <th>Salary</th>
                <th>DOB</th>
                <th>Action</th>
            </tr>
          </thead>
          <tbody>

            @foreach($employees as $employee) 
          <tr>
            
              <td>{{$employee->name}}</td>
              <td>{{$employee->email}}</td>
              <td>{{$employee->salary}}</td>
              <td>{{$employee->dob}}</td>
              <td>
            
                <form action="{{route('employee.destroy',$employee->id)}}" method="post">
                  <a href="{{route('employee.edit',$employee->id)}}" class="btn btn-primary">Edit</a>
                  <a href="{{route('employee.show',$employee->id)}}" class="btn btn-info">Show</a>
                    @method('delete')
                    <button class="btn btn-danger">Delete</button>
                  </form>
           
              </td>
           
          </tr>
             @endforeach
          </tbody>
        </table>
    </div>
   </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>