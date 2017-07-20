@extends('layout.master')

@section('title')
Blogs
@endsection

@section('styles')
<link rel="stylesheet" type="text/css" href="{{URL::to('css/blog/main.css')}}">
@endsection

@section('content')
 
 <div class="container">
	   <div class="row">
	   		<div class="col-md-8" >
	   			
	   			
	   				<div class="jumbotron">


	   					 
	   					     <div class="panel panel-default">
	   					         <div class="panel-heading">

	   					             <div>

	   					             	<span class="MakaleYazariAdi">{{$show->title}}</span>

	   					             </div>
	   					             <div>
	   					             	<span> 
		   					             	<span class="auname">
		   					             		{{$show->author->name}}
		   					             	</span>
	   					             		<span> ( </span>
	   					             		{{$show->created_at}} 
	   					             		<span> )</span>
	   					             	</span>

	   					             </div>

	   					         </div>

	   					         <div class="panel-body">
	   					             <div class="media">
	   					                 
	   					                 <div class="media-body">

	   					                 <div class="clearfix">{{ $show->quote }}</div>
                                          
                                          
		   					                 <div class="btn-group" role="group" id="BegeniButonlari">

		   					                     <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-thumbs-up"></span></button>
		   					                     <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-thumbs-down"></span></button>
		   					                 </div>  
	   					                  

	   					                </div>
	   					             </div>
	   					         </div>

	   					     </div>

 						 
	   				</div>
	   			 
                
	   		</div>

	   		<div class="col-md-4">

	   		    
		   		   	<div class="jumbotron">
	

		   		   		<section class="add_blog">

							 <table class="table table-hover">

								   <thead class="thead">
									   	<td>
									   		<h3>All Blogs</h3>
									   	</td>
								   </thead>

								   <tbody>
								 	@foreach($quotes as $quote)

										<tr>
											<td>
												<a href="{{route('blog', ['id'=>$quote->id])}}">{{$quote->title}}</a>
											</td>

										</tr>
								    @endforeach
								   </tbody>
							 </table>
							 
		   		   		</section>
		   		   	</div>
	   		    
	   			
	   		</div>

	   </div>
   </div>

@endsection