@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-8 offset-2">
            <h1 class="mb-3">Insert new Post</h1>
            <form action="{{route('admin.posts.update', $post)}}" method="POST">

                @method('PUT')
                @csrf
                <div class="mb-3">
                  <label for="title" class="form-label">Post title</label>
                  <input type="text" id="title" name="title" class="form-control"
                  placeholder="Title of the post"
                  value="{{$post->title}}">
                </div>
                <div class="mb-3">
                  <label for="content" class="form-label">Post content</label>
                  <textarea type="text" id="content" name="content" class="form-control"
                  rows="10" cols="70"
                  placeholder="Content of the post...">
                  {{$post->content}}
                  </textarea>
                </div>
                <div class="mb-3">
                    @foreach ($tags as $tag)
                        <input type="checkbox" name="tags[]" id="tag{{$loop->iteration}}" value="{{$tag->id}}"
                        @if (!$errors->any() && $post->tags->contains($tag->id))
                            checked
                        @elseif ($errors->any() && in_array($tag->id, old('tags', []) ) )
                            checked
                        @endif
                        value="{{$tag->id}}">
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
