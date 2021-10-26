@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Post content-->
                        <article>
                            <!-- Post header-->
                            <header class="mb-4">
                                <!-- Post title-->
                                <h1 class="fw-bolder mb-1">Vacancies</h1>
                            </header>
                            <!-- Preview image figure-->
                            <div class="card mb-4">
                                <div class="card-header">Available Vacancies {{ $vacancies->total() }}</div>
                                <div class="card-body"><a href="{{ route('vacancies.create') }}" class="btn btn-primary">Add new Vacancy</a></div>
                            </div>
                            <!-- Post content-->
                            <section class="mb-5">
                                @foreach($vacancies as $vacancy)
                                <div class="card bg-light mb-3">
                                    <div class="card-body">
                                        <!-- Comment with nested comments-->
                                        <div class="d-flex mb-4">
                                            <!-- Parent comment-->
                                            <h2 class="section-heading">{{ $vacancy->title }}</h2>
                                        </div>
                                        <!-- Single comment-->
                                        <div class="d-flex">
                                            <div class="ms-3">
                                                {{ $vacancy->location }}
                                            </div>
                                            <div class="ms-3 ml-4">
                                                £{{ $vacancy->salary }}
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="ms-3">
                                                {{ $vacancy->description }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </section>
                            <div class="d-flex">
                            {{ $vacancies->links() }}
                            </div>
                        </article>
                    </div>
                    <!-- Side widgets-->
                    <div class="col-lg-4">
                        <!-- Search widget-->
                        <div class="card mb-4">
                            <div class="card-header">Search</div>
                            <div class="card-body">
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                                    <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
