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

                    <form autocomplete="off" method="POST" action="{{route('post.store')}}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control mb-3" placeholder="Input the title..." />

                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control mb-3" />

                            <label for="short_desc">Short description</label>
                            <textarea  type="text" name="short_desc" class="form-control mb-3" placeholder="Input the short_desc..."></textarea>

                            <label for="desc">Content</label>
                            <textarea type="text" name="desc" class="form-control mb-3" placeholder="Input the Content..."></textarea>

                            <select name="post_category_id" class="form-control mb-3">
                                @foreach($categoryPost as $a)
                                <option value="{{$a->id}}">{{$a->title}}</option>
                                @endforeach
                            </select>
                            <input class="form-control btn-success mt-2" type="submit" value="Add" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection