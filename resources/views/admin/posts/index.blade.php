@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container">
        <p>Welcome to Index List</p>
        <table class="table">

            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Tags</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>

            <tbody>

                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{$post->id}}</th>
                        <td>{{$post->title}}</td>
                        <td>

                            @forelse ($post->tags as $tag)
                            <span>{{$tag->name}} | </span>
                            @empty
                            <span>-</span>
                            @endforelse
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{ route('admin.posts.show',$post)}}">Show</a>
                            <a class="btn btn-primary" href="{{ route('admin.posts.edit',$post)}}">Edit</a>
                        <form class="d-inline"
                            method="POST"
                            onsubmit="return confirm('Confirm the action? Oance deleted it can\'t be restored')"
                            action="{{route('admin.posts.destroy', $post)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">DELETE</button>
                        </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>

          </table>
    </div>
</div>
@endsection
