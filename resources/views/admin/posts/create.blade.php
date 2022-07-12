@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-8 offset-2">
            <h1 class="mb-3">Insert new Post</h1>
            <form action="{{route('admin.posts.store')}}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="title" class="form-label">Post title</label>
                  <input type="text" id="title" name="title" class="form-control
                  @error('title') is-invalid @enderror"
                  placeholder="Title of the post">
                </div>
                <div class="mb-3">
                  <label for="content" class="form-label">Post content</label>
                  <textarea type="text" id="content" name="content" class="form-control
                  @error('content') is-invalid @enderror"
                  rows="10" cols="70"
                  placeholder="Content of the post...">
                  </textarea>
                </div>
                <div class="mb-3">
                    @foreach ($tags as $tag)
                        <input type="checkbox" name="tags[]" id="tag{{$loop->iteration}}" value="{{$tag->id}}"
                        @if (in_array($tag->id, old('tags',[]))) checked @endif>
                        <label class="mr-3" for="tag{{$loop->iteration}}">{{$tag->name}}</label>
                    @endforeach
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <a class="btn btn-success" href="{{route('admin.posts.index')}}">Torna indietro</a>
</div>
@endsection
