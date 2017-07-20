 
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>@yield('title')</title>

	

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    <!-- Footer Style -->  
	<link rel="stylesheet" type="text/css" href="{{URL::to('css/footer-distributed.css')}}">

	<!-- Panel Style -->
	<link rel="stylesheet" type="text/css" href="{{ URL::to('css/main.css') }}"> 

	<!-- Animate -->
	<link rel="stylesheet" type="text/css" href="{{ URL::to('css/animate.css') }}">

	 @yield('styles')

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Font Awesome -->
	<script src="https://use.fontawesome.com/b3e68927bc.js"></script>

	<!-- Main  -->
	<script type="text/javascript" src="{{ URL::to('js/main.js') }}"></script>

	@yield('script')

	

</head>

<body>
   
  	 @include('includes.header')
     
  

	<div class="main">

		@yield('content')
		
	</div>

	@include('includes.footer')

</body>

</html>



