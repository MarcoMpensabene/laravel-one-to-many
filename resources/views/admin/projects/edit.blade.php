@extends('layouts.admin')

@section('content')
<main>
    <div class="container">
        <div class="row justify-content-center">
            <h1>CREATE PROJECT </h1>
            <form action="{{route('admin.projects.update' , $project)}}" method="POST" id="add-form">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="title">Project title</label>
                    <input class="form-control form-control-sm" type="text" placeholder="Project title" aria-label="Project title" title="title" id="title"  value={{old('title' ,$project->title)}} required>
                </div>

                <div class="mb-3">
                    <label for="description">Description</label>
                    <textarea class="form-control form-control-sm" type="text" placeholder="Description" aria-label="Description" title="description" id="description" required>{{old('description' ,$project->description)}}</textarea>
                </div>

                <div class="mb-3">
                    <label for="author">Author</label>
                    <input class="form-control form-control-sm" type="text" placeholder="Author" aria-label="Author" title="author" id="author" value={{old('author' ,$project->author)}}>
                </div>

                <div class="mb-3">
                    <label for="image_url">URL Immagine</label>
                    <input class="form-control form-control-sm" type="text" placeholder="URL" aria-label="URL" title="image_url" id="image_url" value={{old('imamge_url' ,$project->image_url)}}>
                </div>

                <div class="mb-3">
                    <label for="stack">Stack</label>
                    <input class="form-control form-control-sm" type="text" placeholder="stack" aria-label="Stack " title="stack" id="stack" value={{old('stack' ,$project->stack)}}>
                </div>

                <div class="mb-3 d-flex justify-content-between p-2">
                    <input type="submit" value="Edit Project" class="btn btn-primary" >
                    <input type="reset" value="Reset" class="btn btn-danger">
                </div>
                </div>
            </form>
        </div>
    </div>
</div>
</main>

@endsection
