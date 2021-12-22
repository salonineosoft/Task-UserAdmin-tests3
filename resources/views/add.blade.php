@include('includes.head')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
       .container{
           margin-left:220px;
       }
       body{
           background-image:url("white7.jpg");
           box-shadow: 10;
       }
       .button{
           margin-left:230px;
       }
    </style>
</head>
<body>
<div>
 @if(Session::has('success'))
<label class="alert alert-success">{{Session::get('success')}}</label>
 @endif 
</div>
    <h3 class="text-center text-success"> Add Details</h3>
    <div class="container">
      
    <form method="post" action="{{url('insert')}}" enctype="multipart/form-data">
    @csrf
    @if($errors->has('firstname'))
        <div class="alert alert-danger col-7">{{$errors->first('firstname')}}</div>
        @endif
        <input type="text"  class="form-control col-7" name="firstname" placeholder="FirstName"><br>
        @if($errors->has('lastname'))
        <div class="alert alert-danger col-7">{{$errors->first('lastname')}}</div>
        @endif
        <input type="text" class="form-control col-7" name="lastname" placeholder="LastName"><br>
        @if($errors->has('email'))
        <div class="alert alert-danger col-7">{{$errors->first('email')}}</div>
        @endif
        <input type="email" class="form-control col-7" name="email" placeholder="Email"><br>
         @if($errors->has('mob'))
        <div class="alert alert-danger col-7">{{$errors->first('mob')}}</div>
        @endif 
        <input type="text"  class="form-control col-7" name="mob" placeholder="Contact Number"><br>
        @if($errors->has('city'))
        <div class="alert alert-danger col-7">{{$errors->first('city')}}</div>
        @endif
        <input type="text" class="form-control col-7" name="city"  placeholder="city"><br>
        @if($errors->has('gender'))
        <div class="alert alert-danger col-7">{{$errors->first('gender')}}</div>
        @endif
        <input type="radio" name="gender" value="male" id="gen">Male
        <br>
        <input type="radio" name="gender" value="female" id="gen2">Female
        <br>
        @if($errors->has('age'))
        <div class="alert alert-danger col-7">{{$errors->first('age')}}</div>
        @endif
        <input type="number" class="form-control col-7"  name="age" placeholder="Age" id="age"><br>
        @if($errors->has('status'))
        <div class="alert alert-danger col-7">{{$errors->first('status')}}</div>
        @endif
        <input type="text" class="form-control col-7"  name="status" placeholder="Status"><br>
        @if($errors->has('image'))
        <div class="alert alert-danger col-7">{{$errors->first('image')}}</div>
        @endif
        <input type="file" name="image"><br><br>
        <input type="submit" class="button btn btn-primary" name="sub" value="ADD">
    </form>
    </div>
    <script>
        $(document).ready(function(){
        $('#age').hide();
        $("#gen").click(function(){
            $('#age').show(); 
            $("#age").val('');
        })
        $("#gen2").click(function(){
            $('#age').hide(); 
            $("#age").val('20');
        })
        })
        </script>
</body>
</html>