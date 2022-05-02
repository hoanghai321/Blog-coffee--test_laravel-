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
                <div class="card-header">{{ __('Add article categories.') }}
                    <a href="/">Back</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form autocomplete="off" method="POST" action="{{route('category.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Input the title..." />
                            <input class="form-control btn-success mt-2" type="submit" value="Add" />
                        </div>
                    </form>
                </div>
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 0;
                        @endphp
                        @foreach($categoryPost as $a)
                        @php
                        $i++;
                        @endphp
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$a->title}}</td>
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