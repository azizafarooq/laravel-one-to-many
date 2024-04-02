@extends('layouts.app')

@section('content')
    <section>
        <div class="container mt-5">
            <h1>My Projects</h1>
            @dump($projects)
        </div>
    </section>
@endsection
