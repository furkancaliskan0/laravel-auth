@extends('layouts.main-layout')

@section('content')
    <div class="container">
        <div class="card mb-5 p-3">
            <h2>Progetto: {{$project -> name}}</h2>
            <p>Description: {{$project -> description 
                            ? $project -> description 
                            : " no description "}}
            </p>
            <span>Link immagine: {{ $project -> main_image}}</span>
            <span>Release date: {{ $project -> release_date}}</span>
            <span>Repo link: {{ $project -> repo_link}}</span>
        </div> 
    </div>
@endsection