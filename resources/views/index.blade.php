@extends('layout')
@section('content')
    
    <div class="push-top">
        @if(session()->get('succcess'))
        <div class="alert alert-success">
            {{session()->get('success')}}
        </div><br>
        @endif

        <table class="table">
            <thead>
                <tr class="table-warning">
                    <td>ID</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Phone</td>
                    <td align="center" colspan="2">Action</td>
                </tr>
            </thead>

            <tbody>
                @foreach($client as $cl)
                <tr>
                    <td>{{$cl->id}}</td>
                    <td>{{$cl->name}}</td>
                    <td>{{$cl->email}}</td>
                    <td>{{$cl->phone}}</td>
                    <td><a href="{{route('clients.edit', $cl->id)}}" class="btn btn-primary btn-sm">Edit</a></td>
                    <td>
                        <form action="{{route('clients.destroy', $cl->id)}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            
        </table>
    </div>
    

@endsection