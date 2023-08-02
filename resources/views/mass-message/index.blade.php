@extends('layouts.app')

@section('template_title')
    Mass Message
@endsection

@section('content')
    <div class="container ">
        <div class="row">
            <div class="col-sm-12">
              
                     

                            <span id="card_title">
                                {{ __('Mass Message') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('mass-messages.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                   
                  
 
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
									
										<th>Message</th>
										<th>Status</th>	<th>Customer Tags</th>
										<th>Scheduled At</th>
									 

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($massMessages as $massMessage)
                                        <tr>
                                            <td>{{ $massMessage->id }}</td>
                                            
										
											
	 	<td>
	 	    
	 	       
   {{ $massMessage->title }}

 

 	 	                 

	 	</td>
	 		 		 		 		 	
	 		 		 		 		 	
											<td>{{ $massMessage->status }}</td>
												<td>{{ $massMessage->customer_tags }}</td>
											
											<td>{{ $massMessage->scheduled_at }}</td>
									 

                                            <td>
                                                <form action="{{ route('mass-messages.destroy',$massMessage->id) }}" method="POST">
                                                 
                                                    <a class="btn btn-sm btn-success" href="{{ route('mass-messages.edit',$massMessage->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                  
                {!! $massMessages->links() !!}
            </div>
        </div>
    </div>
@endsection
