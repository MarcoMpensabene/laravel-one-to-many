@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>Deleted Projects Index </h1>
        <div class="container">
            <div class="row">
                <article class="col-12">
                    @if (session("message"))
                        <div class="alert alert-warning">
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
                                <th >
                                    <div class="d-flex">
                                        <form action="{{route("admin.projects.restore" , $project)}}" method="POST" class="me-2">
                                            @method("PATCH")
                                            @csrf
                                            <button type="submit" class="btn btn-success">Restore</button>
                                        </form>
                                        <form action="{{route("admin.projects.permanent-delete" , $project )}}" method="POST" class="delete-form">
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
