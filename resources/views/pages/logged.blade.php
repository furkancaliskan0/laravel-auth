@extends('layouts.main-layout')

@section('content')
        <div class="container">
            <h1>Logged</h1>
            <h1>Elenco progetti</h1>

            @foreach ($projects as $project)
                <div class="card mb-5 p-3">
                    <a href="{{route('projectShow', $project)}}">
                        <h2>Progetto: {{$project -> name}}</h2>
                    </a>
                    <p>Description: {{$project -> description 
                                    ? $project -> description 
                                    : " no description "}}
                    </p>
                    <span>Link immagine: {{ $project -> main_image}}</span>
                    <span>Release date: {{ $project -> release_date}}</span>
                    <span>Repo link: {{ $project -> repo_link}}</span>
    
                    <a href="{{route('projectDelete', $project)}}">ELIMINA</a>
                </div> 
            @endforeach
    
@endsection