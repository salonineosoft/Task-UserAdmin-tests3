@include('includes.head')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="text-center">
    @if(Session::has('msg'))
    <div class="alert alert-success">{{Session::get('msg')}}</div>
    @endif
    <a href="add" class="btn btn-primary m-3">ADD</a>
    <table class="table">
        <thead>
        <tr> 
            <th scope="col" >UserName</th>
            <th scope="col">LastName</th>
            <th scope="col">Email</th>
            <th scope="col">Mobile_Number</th>
            <th scope="col">City</th>
            <th scope="col">Gender</th>
            <th scope="col">Age</th>
            <th scope="col">Status</th>
            <th>Image</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        @foreach($show as $i)
        <tr>
            <td>{{$i->firstname}}</td>
            <td>{{$i->lastname}}</td>
            <td>{{$i->email}}</td>
            <td>{{$i->mobile}}</td>
            <td>{{$i->city}}</td>
            <td>{{$i->gender}}</td>
            <td>{{$i->age}}</td>
            <td>{{$i->status}}</td>
            <td>
                <img src='{{url("/uploads/$i->image")}}' height="50px" width="50px"/>
            </td>
            <td>
                <a href="edit/{{$i->id}}">Edit</a>
                <a href="delete/{{$i->id}}">Delete</a>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>