@extends('layouts.app')

@section('template_title')
    User
@endsection

@section('content')
    <div class="container ">
        <div class="row">
            <div class="col-sm-12">
               
                            <span id="card_title">
                                {{ __('User') }}
                            </span>

                             
                                <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                         
                   

                     
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>User ID</th>
                                        
										<th>Name</th>
									 
										<th>Email</th>

                                        <th>Roles</th>   <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            
                                            		<td>{{ $user->id }}</td>
											<td>{{ $user->name }}</td>
										 	<td>{{ $user->email }}</td>

						  <td>
						      
						      @if(isset($user->roles))
						      
                            @foreach($user->roles as $role)
                                <span class="badge bg-primary">{{ $role->name }}</span>
                            @endforeach
                            
                            @endif
                        </td>		 
									 
										 
										
                                            <td>
                                                <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                                                    
                                                    
                                                    <a class="btn btn-sm btn-success" href="{{ route('users.edit',$user->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                    
                {!! $users->links() !!}
            </div>
        </div>
    </div>
@endsection
