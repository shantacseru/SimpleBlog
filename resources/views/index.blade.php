@extends ('layout.master')

@php
function br2nl($text){
	$breaks = array("<br />","<br>","<br/>"); 
	$text = str_ireplace($breaks, "\r\n", $text);
	return $text;
}

@endphp

@section('title')
Shamima's Blog
@endsection


@section('styles')
	
@endsection



@section('content')
		@if(!empty(Request::segment(1)))
		    <div class="container">
		 		<div class="alert alert-info" role="alert">
  					<span>A filter is set <a class="label label-info" href="{{route('home')}}">Show all blog</a> </span>
		 		</div>
		 	</div>
		@endif

 	 
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
	   <div class="row">
	   		 <div class="col-md-8" > 
	   			
	   			
	   				 <div class="jumbotron"> 


	   					<center> 
	   					    <h3 class="latest_blog_label "> Latest Blog</h3>
	   					</center>

	   					  
	   					  @foreach($quotes as $quote)

	   					     <div class="panel panel-default">
	   					         <div class="panel-heading">
	   					             <a href="{{route('home', ['author'=>$quote->author->name])}}" class="MakaleYazariAdi">{{ $quote->author->name }}</a>
	   					             <span>at {{$quote->created_at}}</span>
	   					             <div class="btn-group" style="float:right;">
	   					             	<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	   					             		<span class="glyphicon glyphicon-cog"></span>
	   					             		<span class="sr-only">Toggle Dropdown</span>
	   					             	</button>
	   					             	<ul class="dropdown-menu">
	   					             		<li><button class="btn btn-default btn-block" data-toggle="modal" data-target="#{{$quote->id}}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</button></li>
	   					             		<li role="separator" class="divider"></li>
	   					             		<li><a class="delete_anchor" href="{{route('delete', ['quote_id'=>$quote->id] ) }}"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> Delete</a></li>
	   					             	</ul>
	   					             </div>


										<!-- Modal -->
										  <div class="modal fade" id="{{$quote->id}}" role="dialog">
										    <div class="modal-dialog">
										    
										      <!-- Modal content-->
										      <div class="modal-content">
										        <div class="modal-header">
										         
										          <button type="button" class="close" data-dismiss="modal">&times;</button>
										          <h4 class="modal-title">Edit Blog</h4>
										        </div>
										        <div class="modal-body">
										           <form method="post" action="{{route('update')}}">
                                                     <input type="hidden" name="blog_id" value="{{$quote->id}}">
										           	<textarea class="form-control" name="udpost" rows="5">{{ br2nl($quote->quote) }}</textarea>
										           	<button type="submit" class="btn btn-primary">Done</button>  
										           	<input type="hidden" name="_token" value="{{ Session::token()}}">
										           </form>
										           
										        </div>
										        <div class="modal-footer"> 
										          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										        </div>
										      </div>
										      
										    </div>
										  </div>



	   					             <div class="clearfix"></div>

	   					         </div>
	   					         <div class="panel-body">
	   					             <div class="media">
	   					                 
	   					                 <div class="media-body">
	   					                 <h4 class="media-heading">{{$quote->title}}</h4>
	   					                  
	   					                 <div class="clearfix">{{ br2nl(substr($quote->quote, 0, 1000)) }}</div>
                                          
                                         <div>
                                         <a class="btn btn-default" href="{{route('blog', ['id'=>$quote->id])}}">Read More</a>
		   					                 <div class="btn-group" role="group" id="BegeniButonlari">

		   					                     <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-thumbs-up"></span></button>
		   					                     <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-thumbs-down"></span></button>
		   					                 </div>  
	   					                 </div>

	   					                </div>
	   					             </div>
	   					         </div>
	   					     </div>
	   					 @endforeach


                        <!-- Pagination Start -->
                        <center>
		 						<div class="pagination">

		 						<label class="label label-info">More</label>
		 							@if( $quotes->currentPage() !== 1)

		 								<a href="{{ $quotes->previousPageUrl() }}"><span class="fa fa-caret-left fa-lg"></span></a>
		 							@endif

		 							@if(($quotes->currentPage() !== $quotes->lastPage()) && ($quotes->hasPages()) )
										<a href="{{ $quotes->nextPageUrl() }}"><span class="fa fa-caret-right fa-lg"></span></a>
										
		 							@endif

		 						</div>

 						</center>

 						<!-- Pagination end -->


	   				 </div> 
	   			 
                
	   		 </div> 

	   		 <div class="col-md-4">
	   		
	   		    
	   				   		   	<div class="jumbotron">
	   			
	   		
	   				   		   		<section class="add_blog">
	   				   		   		  
	   									<h3>Add Blog</h3>
	   									<form action="{{route('create')}}" method="post">
	   										<label for="name" class="label label-info">Your Name</label>
	   										<input type="text" name="author" class="form-control" id="name" placeholder="Name">
	   		 								<label for="blog_title" class="label label-info">Title</label>
	   		 								<input type="text" name="title" class="form-control" id="blog_title" placeholder="Title of the blog">
	   		
	   										<label for="blog" class="label label-info">Blog</label>
	   										<textarea name="blog" class="blog_text form-control" rows="5" placeholder="Quote" ></textarea>
	   										<button type="submit" class="btn btn-primary">Submit</button><br>  
	   										<input type="hidden" name="_token" value="{{ Session::token()}}"> 
	   									</form>
	   				   		   		</section>
	   				   		   	</div>
	   		    
	   			
	   		</div> 

	   </div>
   </div>


@endsection


 