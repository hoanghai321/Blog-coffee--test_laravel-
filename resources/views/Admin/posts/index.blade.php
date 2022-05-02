@extends('layouts.app')

@section('content')
@if (Session::has('msg'))
<div class="alert alert-success">
    <ul>
        <li>{{ Session::get('msg') }}</li>
    </ul>
</div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('List of articles') }}
                    <a href="/">Back</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                </div>
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Image</th>
                            <th scope="col">Short Desc</th>
                            <th scope="col">Content</th>
                            <th scope="col">Category</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($post as $a)
                        <tr>
                            <td>{{$a->title}}</td>
                            <td><img width="100px" src="{{$a->image}}"/></td>
                            <td>{{$a->short_desc}}</td>
                            <td>{{$a->desc}}</td>
                            <td>{{$a->category->title}}</td>
                            <td>
                                <form action="{{route('category.show', [$a->id])}}" method="GET">
                                    @method('GET')
                                    @csrf
                                    <input type="submit" class="btn-sm btn-warning" value="Edit" />
                                </form>
                            </td>
                            <td>
                                <form action="{{route('category.destroy', [$a->id])}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" class="btn-sm btn-warning" value="Delete" />
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection