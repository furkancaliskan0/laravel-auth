@extends('layouts.main-layout')

@section('content')
    <div class="container main">
        <h1  class="text-center black my-4">Projects</h1>
        @auth
            <a href="{{ route('admin.project.store') }}">
            </a>
        @endauth
        <div class="form">
            @foreach ($projects as $project)
                <div class="card mb-5 p-3">
                    <a href="{{ route('project.show', $project) }}">
                        <h2>
                            {{ $project -> name }}
                        </h2>
                    </a>
                    <img src="{{ asset('storage/' . $project -> main_image) }}" alt="">
                        <span>Link immagine: {{ $project -> main_image}}</span>
                        <span>Release date: {{ $project -> release_date}}</span>
                        <span>Repo link: {{ $project -> repo_link}}</span>
                
                </div >
            @endforeach
        </div>

    </div>
@endsection