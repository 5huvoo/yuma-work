

<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
          <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.jqueryui.min.css"/>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> </script>
        <script src=" //cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"> </script>

      </head>

<body>
<!-- style -->
<style type="text/css">
  
#register_form h1 {
  text-align: center;
}
#register_form {
  width: 37%;
  margin: 100px auto;
  padding-bottom: 30px;
  border: 1px solid #918274;
  border-radius: 5px;
  background: white;
}
#register_form input {
  width: 80%;
  height: 35px;
  margin: 5px 10%;
  font-size: 1.1em;
  padding: 4px;
  font-size: .9em;
}
#reg_btn {
  height: 35px;
  width: 80%;
  margin: 5px 10%;
  color: white;
  background: #3B5998;
  border: none;
  border-radius: 5px;
}
/*Styling for errors on form*/
.form_error span {
  width: 80%;
  height: 35px;
  margin: 3px 10%;
  font-size: 1.1em;
  color: #D83D5A;
}
.form_error input {
  border: 1px solid #D83D5A;
}

/*Styling in case no errors on form*/
.form_success span {
  width: 80%;
  height: 35px;
  margin: 3px 10%;
  font-size: 1.1em;
  color: green;
}
.form_success input {
  border: 1px solid green;
}
#error_msg {
  color: red;
  text-align: center;
  margin: 10px auto;
}

</style>


<div class="container">
  <div class="content">
    <div  class= "title"> <h1>Laravel 5.6 Php Project</h1> </div>
</div>

  			<!-- data showing -->
<div style="background-color:lightgreen">
      	<table border="1" id="dt" bgcolor="#00FF00">
<thead>
          <th colspan="5">Users</th>
  				<tr>
  					<td>Id</td>
  					<td>Name</td>
  					<td>Email</td>
  					<td>Phone</td>
  				</tr>
</thead>
   <tbody>
  				@foreach($user as $value)
  				<tr>
  					<td>{{$value->id}}</td>
  					<td>{{$value->name}}</td>
  					<td>{{$value->email}}</td>
  					<td>{{$value->phone}}</td>
  				</tr>
  				@endforeach
           </tbody>
  			</table> 
<script>
          $(document).ready(function() {

            $('#dt').DataTable();
        } );
         </script>
</div>
         <!-- insertdata 
<div style="background-color:lightblue"> 

           			<table border="1" width:400px bgcolor="#00FF00">
           				<th colspan="2"> Insert </th>
           				<tr>
           					<td>Name :</td>
           					<td><input type="text" name="name" /></td>
           				</tr>
           				<tr>

           					<td>Email</td>
           					<td><input type="email" name="email"   /></td>


           				</tr>
           				<tr>
           					<td>Phone</td>
           					<td><input type="text" name="phone" /></td>
           				</tr>
           				<tr>
           					<td colspan="2"><button type="submit" id="insert"> Insert </button> </td>
           				</tr>


   </table>


{{ csrf_field() }}
</div>                            -->


     <!-- insertdata -->
<div style="background-color:lightblue"> 
  <form action="action" method="post">

    <label for ="name" > Name</label>
    <input type="text" name="name" > </br>

    <label for ="email" > Email</label>
    <input type="text" name="email" > </br>
    <span></span>

    <label for ="phone" > Phone</label>
    <input type="Phone" name="phone" > </br>

    <input type="hidden" name="_token" value="{{csrf_token() }}" >


    <label for ="" ></label>
    <input type="submit" name="insert"  value="Insert" id="insert" > 

  </form>


</div>
<script type="text/javascript">
  
 $(#email).on('blur',function(event) {   
event.preventDefault();
var url =('validation-email');
var email= $(this).val();

$.ajax({
 type: 'post',
 url: url,
 data: {'email':email },
 success: function(data){

          if(data) {
          Materialize.toast(data,4000,'red');
          $("$email_error").html(data);
          $('#insert').prop('disabled',true);
         
          $('#email').siblings("span").text('Sorry... Email already taken');
                  }
                                 
          else{
            alert("email not available");
            $('#insert').prop('disabled',false);
               }         
                    }



})







 });


</script>


           			<!-- Updatedata-->
<div style="background-color:lightgreen">
           			<table border="1" bgcolor="#00FFFF">
           				<th colspan="2">Update</th>
           				<tr>
           					<td>Select Id:</td>
           					<td>
           						<select name="upid" id="upid">
           							@foreach($user as $value)
           								<option value="{{ $value->id}}"> {{ $value->id }} </option>
           							@endforeach
           						</select>
           					</td>
           				</tr>
           				<tr>
           					<td>Name :</td>
           					<td><input type="text" name="upname" /></td>
           				</tr>
           				<tr>
           					<td>Email</td>
           					<td><input type="email" name="upemail" /></td>
           				</tr>
           				<tr>
           					<td>Phone</td>
           					<td><input type="text" name="upphone" /></td>
           				</tr>
           				<tr>
           					<td colspan="2"><button type="submit" id="update"> Update </button> </td>
           				</tr>
           			</table>
</div>
           			<!-- Delete Data -->
<div style="background-color:lightblue">
           			<table border="1" bgcolor="#FFFF00" >
           				<th colspan="2"> Delete </th>
           				<tr>
           					<td>Select Id:</td>
           					<td>
           						<select name="upid" id="delid">
           							@foreach($user as $value)
           								<option value="{{ $value->id}}"> {{ $value->id }} </option>
           							@endforeach
           						</select>
           					</td>
           				</tr>
           				<tr>
           					<td colspan="2"><button type="submit" id="delete"> Delete </button> </td>
           				</tr>
           			</table>
</div>
  			<!-- AJAX SECTION -->
        <script type="text/javascript">

                 // for Insert Ajax
                 $('#insert').click(function(){
                   $.ajax({
                     type:'post',
                     url: 'insertdata',
                     data:{
                        '_token':$('input[name=_token').val(),
                        'name':$('input[name=name').val(),
                        'email':$('input[name=email').val(),
                        'phone':$('input[name=phone').val()
                     },
                     success:function(data){
                       
                       window.location.reload();
                     },
                   });
                 });

                 // for Update Ajax
                 $('#update').click(function(){
                   $.ajax({
                     type:'post',
                     url: 'updatedata',
                     data:{
                       '_token':$('input[name=_token').val(),
                        'id':$('#upid').val(),
                       'name':$('input[name=upname').val(),
                       'email':$('input[name=upemail').val(),
                       'phone':$('input[name=upphone').val(),
                     },
                     success:function(data){
                       alert("Data will be updated now");
                       window.location.reload();
                     },
                   });
                 });
                 // for Delete Ajax
                 $('#delete').click(function(){
                   $.ajax({
                     type:'post',
                     url: 'deletedata',
                     data:{
                       '_token':$('input[name=_token').val(),
                       'id':$('#delid').val(),
                     },
                     success:function(data){
                       alert("Data will be deleted now");
                       window.location.reload();
                     },
                   });
                 });
         			</script>


</div>
</body>
</html>
