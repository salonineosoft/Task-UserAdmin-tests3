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
    <h3 class="text-center text-success"> Update Details</h3>
    <div class="container">
      
    <form method="post" action="{{url('updated')}}" enctype="multipart/form-data">
    @csrf
    @if($errors->has('firstname'))
        <div class="alert alert-danger col-7">{{$errors->first('firstname')}}</div>
        @endif
        <input type="text"  class="form-control col-7" name="firstname" value="{{$user->firstname}}" placeholder="FirstName"><br>
        @if($errors->has('lastname'))
        <div class="alert alert-danger col-7">{{$errors->first('lastname')}}</div>
        @endif
        <input type="text" class="form-control col-7" name="lastname" value="{{$user->lastname}}" placeholder="LastName"><br>
        @if($errors->has('email'))
        <div class="alert alert-danger col-7">{{$errors->first('email')}}</div>
        @endif
        <input type="email" class="form-control col-7" name="email" value="{{$user->email}}" placeholder="Email"><br>
         @if($errors->has('mob'))
        <div class="alert alert-danger col-7">{{$errors->first('mob')}}</div>
        @endif 
        <input type="text"  class="form-control col-7" name="mob" value="{{$user->mobile}}" placeholder="Contact Number"><br>
        @if($errors->has('city'))
        <div class="alert alert-danger col-7">{{$errors->first('city')}}</div>
        @endif
        <input type="text" class="form-control col-7" name="city" value="{{$user->city}}" placeholder="city"><br>
        @if($errors->has('gender'))
        <div class="alert alert-danger col-7">{{$errors->first('gender')}}</div>
        @endif
        Gender<br/>
        <input type="radio" name="gender" id="gen" value="male" {{($user->gender=='male')?'checked':''}} >Male
        <br>
        <input type="radio" name="gender"id="gen2" value="female" {{($user->gender=='female')?'checked':''}}>Female
        <br>
        @if($errors->has('age'))
        <div class="alert alert-danger col-7">{{$errors->first('age')}}</div>
        @endif
        <input type="number" class="form-control col-7" id="age" name="age" value="{{$user->age}}" placeholder="Age"><br>
        @if($errors->has('status'))
        <div class="alert alert-danger col-7">{{$errors->first('status')}}</div>
        @endif
        <input type="text" class="form-control col-7"  name="status" value="{{$user->status}}" placeholder="Status"><br>
        <input type="hidden" name="id" value="{{$user->id}}"/>
        <input type="submit" class="button btn btn-primary" name="sub" value="Update">
    </form>
    </div>
    <script>
        $(document).ready(function(){
        var agee=document.getElementById('age').value;//age value will store 
        $('#age').hide();
       if($("#gen").prop("checked")){ // already clicked on male
      $('#age').show(); 
       }
       else{
        $('#age').hide(); 
       }
       $("#gen2").click(function(){
        $('#age').hide(); 
        $("#age").val('20');
       })
       $("#gen").click(function(){ //for updating male age
        $('#age').show(); 
        //console.log(agee);
        $("#age").val(agee);
       })
        })
        </script>
</body>
</html>