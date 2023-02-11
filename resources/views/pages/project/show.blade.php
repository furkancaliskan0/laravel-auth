@extends('layouts.main-layout')

@section('content')
    
    <div class="text-center">
        <div class="text-center">
            <h2>Progetto: {{$project -> name}}</h2>
            <img  src="{{ asset('storage/' . $project -> main_image) }}" alt="">
            <div>{{ $project -> description }}</div>
            <span>Release date: {{ $project -> release_date}}</span>
            <div>Link: <a href="{{ $project -> repo_link }}" class="btn btn-primary my-3">GitHub</a></div>
            <a href="#">Go somewhere</a>
                <a href="{{ route('admin.project.edit', $project) }}" class="btn btn-primary my-3">EDIT</a> 
                - 
                <a href="{{ route('admin.project.delete', $project) }}" class="btn btn-primary  my-3 ">DELETE</a>            
        </div>
    </div>



@endsection