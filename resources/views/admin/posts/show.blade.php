@extends('layouts.app')

@section('content')
<div class="container">
    {{-- @dd($post) --}}
    <h1>Title: {{$post->title}}</h1>
    <p>Content: {{$post->content}}</p>
    <p>Tags:
        @if ($post->tags)
            @foreach ($post->tags as $tag)
                <span>{{$tag->name}} | </span>
            @endforeach
        @else
            <span>-</span>
        @endif
    </p>
    <a class="btn btn-success" href="{{route('admin.posts.index', $post)}}">Torna indietro</a>
    <a class="btn btn-primary" href="{{ route('admin.posts.edit',$post)}}">Edit</a>
    <form class="d-inline"
        method="POST"
        onsubmit="return confirm('Confirm the action? Oance deleted it can\'t be restored')"
        action="{{route('admin.posts.destroy', $post)}}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">DELETE</button>
    </form>
</div>
@endsection
