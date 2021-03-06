
<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ORERAUM</title>
   <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{asset('css/app.css')}}">


</head>

<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper" id="app">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>U</b>M</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">ORERAUM</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('images/397340650.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name}}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i>{{Auth::user()->user_type}}</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Dashboard</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="{{url('home')}}"><i class="fa fa-home "></i> <span>Home</span></a></li>
        <li><a href="{{'/bulletin'}}"><i class="fa fa-feed "></i> <span>Bulletin Board</span></a></li>
        
        @can('isAdmin') 
        <li><a href="{{'/compose'}}"><i class="fa fa-bell"></i> <span>Compose</span></a></li>
        @endcan
          @can('isUser')
         <li><a href="{{'submission'}}"><i class="fa fa-file"></i> <span>Submit Manuscript</span></a></li>
         @endcan
         @can('isAdmin')
         <li><a href="{{'/submitted'}}"><i class="fa fa-file"></i> <span>Submitted Manuscripts</span></a></li>
         @endcan
         <li><a href="" class="fa fa-microchip" data-toggle="modal" data-target="#myModal"></i> <span> Code Requests</span></a></li>
         <li><a href="{{'#'}}"><i class="fa fa-book "></i> <span>Inbox</span></a></li>

        @can('isAdmin') 
        <li><a href="{{'/users'}}"><i class="fa fa-users"></i> <span>Manage User</span></a></li>
        @endcan 
        <li><a href="#"><i class="fa fa-gears"></i> <span>Settings</span></a></li>
        
        <li class="">

           <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
             <i class="fa fa-power-off text-red"></i>   <span>Logout</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>

      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   

    <!-- Main content -->
    <section class="content container-fluid">
        @yield('content')
    
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
    --------------------
    </div>
    <!-- Default to the left -->
    <strong>University Of Mindanao &copy; 2019<a href="#">ORERAUM</a>.</strong> All rights reserved.
  </footer>
  <!-- requestcode -->


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
        <h4 class="modal-title" id="myModalLabel">Request Code to connect to Adviser</h4>
      </div>
      <form action="{{route('category.store')}}" method="post">
      	
	      <div class="modal-body">
				<input type="text"name="requestcode" placeholder="Enter Code" required>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Connect</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<!-- ASSIGN CHECKER MODAL -->
<div class="modal fade" id="checker" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
        <h4 class="modal-title" id="myModalLabel">Assign Checker</h4>
      </div>
      <form action="{{route('category.store')}}" method="post">
      	
	      <div class="modal-body">
        <div class="media border p-5">
    
            <div class="col-md-12 ">
            <table class="table">
                <thead class="thead-dark">
						<tr>            
						              	<th>Name</th>
                            <th><center>Number Paper Assign </center></th>
                            <th>Action</th>
						</tr>
						
			  		</thead>

					      <tbody>
						      	<tr> 
                         <td>Barbosa</td>
                         <td><center>2</center></td>
					        			<td>
								      	<button class="btn btn-info" id="" >Assign</button>
		
							      	</td>
		    	  	</tbody>
  			  	</table>				
	     
	      </div>
      </form>
    </div>
  </div>
</div>


<script src="{{asset('js/app.js')}}"></script>
<script src="https://cdnjs.com/libraries/pdf.js"></script>

<script>

  
  $('#edit').on('show.bs.modal', function (event) {
   
      var button = $(event.relatedTarget) 
      var name = button.data('name') 
      var email = button.data('email') 
      var access_id = button.data('access_id') 
      var id_number = button.data('id_number') 
      var id = button.data('id') 
      var modal = $(this)
       
      modal.find('.modal-body #name').val(name);
      modal.find('.modal-body #email').val(email);
      modal.find('.modal-body #access_id').val(access_id);
      modal.find('.modal-body #id_number').val(id_number);
      modal.find('.modal-body #id').val(button.data('id') );
      
})

  $('#submitedit').on('click',function(event){
    event.preventDefault();
    console.log($('#updateform').serialize());
    $.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					url:"{{'user_update'}}",
					method: 'POST',
					dataType:'text',
					data: $('#updateform').serialize(),
					success:function(data){
            var obj = JSON.parse(data);
            console.log(obj);
            $('#edit').modal('toggle');
            alert("Success!");
            location.reload();
					},
					error: function(data){
					
					}
				})
  })

  $('#delete').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 

      var id = button.data('id') 
      var modal = $(this)
      console.log(id);  
      modal.find('.modal-body #user_id').val(id);
    
})

$('#deleteuser').on('click',function(event){
    event.preventDefault();
    console.log($('#deleteform').serialize());
    $.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					url:"{{'delete_user'}}",
					method: 'POST',
					dataType:'text',
					data: $('#deleteform').serialize(),
					success:function(data){
            $('#delete').modal('toggle');
            location.reload();
					},
					error: function(data){
					
					}
				})
  })

    $('form').submit(function(event) {
    event.preventDefault();
    var formData = new FormData($("#manupload")[0]);
    console.log(formData);
    $.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
          processData: false,
          contentType: false,
          url:"{{'upload'}}",
					method: 'POST',
					data: formData,	
      beforeSend:function(){
        $('#success').empty();
      },
      uploadProgress:function(event, position, total, percentComplete)
      {
        $('.progress-bar').text(percentComplete + '%');
        $('.progress-bar').css('width', percentComplete + '%');
      },
      
      success:function(data)
      {
        if(data.errors)
        {
          $('.progress-bar').text('0%');
          $('.progress-bar').css('width', '0%');
          $('#success').html('<span class="text-danger"><b>'+data.errors+'</b></span>');
        }
        if(data.success)
        {
          $('.progress-bar').text('Uploaded');
          $('.progress-bar').css('width', '100%');
          $('#success').html('<span class="text-success"><b>'+data.success+'</b></span><br /><br />');
          $('#success').append(data.image);
          location.reload();
        }
      }
    });
  });


  $('.openPdf').on('click',function(event){
    event.preventDefault();
  window.location.href = "openPdf?id="+this.id;
    // alert(this.id);
    // console.log($('#updateform').serialize());
    // $.ajax({
		// 			headers: {
		// 				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		// 			},
		// 			url:"{{'openPdf'}}",
		// 			method: 'GET',
    //       dataType:'text',
		// 			data: {id:this.id},
		// 			success:function(data){
    //         // var obj = JSON.parse(data);
    //         // console.log(obj);
    //         // $('#edit').modal('toggle');
    //         // alert("Success!");
    //         // window.location.href = "openPdf";
		// 			},
		// 			error: function(data){
					
		// 			}
		// 		})
  })

  $('#submit_compose').on('click',function(event){
    event.preventDefault();
    console.log($('#message').val());
   var message= $('#message').val();
    $.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					url:"{{'compose_message'}}",
					method: 'POST',
					dataType:'text',
					data: {message:message},
					success:function(data){
          window.location="/bulletin"
        
					},
					error: function(data){
					
					}
				})
  })

  $("#checker").on("shown.bs.modal", function(e){
    $.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					url:"{{''}}",
					method: 'GET',
					dataType:'text',
					success:function(data){
            $('#checker').modal('toggle');
            location.reload();
					},
					error: function(data){
					
					}
          
				})
});

</script>

</body>
</html>