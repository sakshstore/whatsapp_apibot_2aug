@extends('layouts.app')

@section('template_title')
    {{ $template->name ?? "{{ __('Show') Template" }}
@endsection

@section('content')
    <div class="  container ">
        <div class="row">
            <div class="col-md-12">
                 
                            <span class="card-title">{{ __('Show') }} Template</span>
                               <br/>   <br/>
                            <a class="btn btn-primary" href="{{ route('templates.index') }}"> {{ __('Back') }}</a>
                             <br/>
                               <br/>
                            {{ $template->name }}
                        
                        
                      
                        <br/>
                        <br/>
                        
                           
                            {{ $template->message }}
                            
                              <hr />
                       
                </div>
            </div>
        </div>
    
@endsection
