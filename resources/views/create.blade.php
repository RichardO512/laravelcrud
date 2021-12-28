{{-- 
    the reason why we dont write the html boier plate because
    we already did or write it inside the layout.blade.php file
    that's why i use the @extends to extends or 
    import the code of the layout.blade.php

    the @section to make the code that we write inside it
    have the logic or code of the
    content from the file layout
    so the section is like the section tag from the html

 --}}
@extends('layout'){{-- layout file?--}}
@section('content'){{-- content are inside the @yield()--}}
<style>
    .container{
        max-width: 408px;
    }
    .push-top{
        margin-top: 50px;
    }
</style>
    <div class="card push-top">
        <div class="card-header">
            Add User
          </div>

          <div class="card-body">
    {{-- for detecting and displaying error --}}
              @if($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach($errors->all() as $error)
                            <li>{{error}}</li>
                      @endforeach
                  </ul>
              </div><br>
              @endif

{{-- {{route(clients.store)}} for routing --}}
            <form action="{{route('clients.store')}}" method="post">
                <div class="form-group">
                    @csrf
                    <label for="name">Name</label>
                    <input class="form-control" type="text" name="name" id="name">
                </div>
        
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="text" name="email" id="email">
                </div>
   
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input class="form-control" type="text" name="phone" id="phone">
                </div>
        
                <div class="form-group">
                    {{-- @csrf --}}
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <button class="btn btn-block btn-danger" type="submit" onsubmit="">Create User</button>
            </form>

            {{-- <button class="btn btn-block btn-danger" type="" onsubmit="">Back</button> --}}
            {{-- <h5 class="card-title"></h5>
            <p class="card-text"></p>
            <a href="#" class="btn btn-primary"></a> --}}
          </div>

    </div>
@endsection{{--no need to write ;  @section() ned a @endsection--}}