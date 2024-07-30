@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
            <h1>Project  Index </h1>
            <div class="container">
                <div class="row">
                    <article class="col-12">
                        @if (session("message"))
                            <div class="alert alert-danger">
                                {{session("message")}}
                            </div>
                        @endif
                        <table class="table align-middle table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Projecttitle</th>
                                    <th scope="col">Desciption</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">Image_url</th>
                                    <th scope="col">stack</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                            @foreach ($projects as $project)
                                <tr>
                                    <th >{{$project->id}}</th>
                                    <th >{{$project->title}}</th>
                                    <th >{{$project->description}}</th>
                                    <th >{{$project->author}}</th>
                                    <th >{{$project->image_url}}</th>
                                    <th >{{$project->stack}}</th>
                                    <th>
                                        <div class="d-flex">
                                                <a class="btn btn-primary btn-sm me-1" href="{{route('admin.projects.show' , $project)}}">View</a>
                                                <a class="btn btn-warning btn-sm me-1" href="{{route('admin.projects.edit' , $project)}}">Edit</a>

                                                <form action="{{route('admin.projects.destroy' , $project)}}" method="POST" class="delete-form">
                                                    @method("DELETE")
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                        </div>
                                    </th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                </article>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-scripts')
    @vite('resources/js/delete-confirm.js')
@endsection
