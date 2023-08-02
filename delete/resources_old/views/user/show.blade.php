@extends('layouts.app')

@section('template_title')
    {{ $user->name ?? "{{ __('Show') User" }}
@endsection

@section('content')
    <section class="content container ">
        <div class="row">
            <div class="col-md-12">
               
                            <span class="card-title">{{ __('Show') }} User</span>
                      
                            <a class="btn btn-primary" href="{{ route('users.index') }}"> {{ __('Back') }}</a>
                        
 
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $user->name }}
                        </div>
                        
                        
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $user->email }}
                        </div>
 
              
            </div>
        </div>
    </section>
@endsection
