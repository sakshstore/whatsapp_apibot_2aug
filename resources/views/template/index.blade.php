@extends('layouts.app')

@section('template_title')
    Template
@endsection

@section('content')
    <div class="container ">
        <div class="row">
            <div class="col-sm-12">
            
                                {{ __('Template') }}
                                
                                <BR />
                          
                                <a href="{{ route('templates.create') }}" class="btn btn-primary btn-sm float-right  mb-5"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              
                  

                    
                                    @foreach ($templates as $template)
                                      	<div class="mb-5">
                                            
											<div ><h3>{{ $template->name }}</h3></div>
											<div>{!! $template->message !!}</div>

                                            <div>
                                                <form action="{{ route('templates.destroy',$template->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('templates.show',$template->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('templates.edit',$template->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                                
                                                <HR />
                                            </div>
                                        </div>
                                    @endforeach
                                
               
                
            </div>
        </div>
    </div>
@endsection
