@extends ('layout.master')

@section('title')
Message Me
@endsection


@section('styles')
<link rel="stylesheet" type="text/css" href="{{ URL::to('css/contact/main.css') }}">
@endsection

@section('content')

@if(count($errors)>0)
 		    <div class="container">
 		 		<div class="alert alert-danger" role="alert">

 		 			@foreach($errors->all() as $error)
 		 				<ul>
 		 				    <li>
 		 				   		{{ $error }}
 		 				   	</li>												
 		 				</ul>
 		 			@endforeach

 		 		</div>
 		 	</div>
 		@endif

 		@if(Session::has('success'))
 		   <div class="container">
 				<div class="alert alert-success" role="alert">	   		   		 		 
 		            {{ Session::get('success') }}
 		 				   		   		 			 
 		 	    </div>
 		    </div>
 		@endif

<div class="container">
 	<div class="jumbotron">
           
           <div class="hello animated bounceInDown">
		   <h1 >Say Hello</h1>
		   </div>

			<form method="post" action="{{route('sendmessage')}}" class="cf">
				  <div class="half left cf">
				    <input class="name animated bounceInLeft" type="text"   name="name" placeholder="Name">
				    <input class="email animated bounceInLeft" type="email"   name="email" placeholder="Email address">
				    <input class="subject animated bounceInLeft" type="text"  name="subject" placeholder="Subject">
				  </div>
				  <div class="half right cf">
				    <textarea class="message animated bounceInRight" name="message" type="text"  name="message" placeholder="Message"></textarea>
				  </div>  
				  <input type="submit" value="Send" id="submit" class="animated bounceInUp">
				  <input type="hidden" name="_token" value="{{ Session::token()}}">
			</form>
	</div>

</div>



@endsection