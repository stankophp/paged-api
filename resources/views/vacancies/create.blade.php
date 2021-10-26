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
                                <h1 class="fw-bolder mb-1">Add new Vacancy</h1>
                            </header>

                            <!-- Post content-->
                            <section class="mb-5">
{{--                                <create-vacancy-form></create-vacancy-form>--}}
                                <form action="{{ route('vacancies.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="title" class="col-sm-4 col-form-label">Title*</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="title" name="title" required
                                                   title="Please enter title" value="{{ old('title') }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="location" class="col-sm-4 col-form-label">Location*</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="location" name="location" required
                                                   title="Please enter location"  value="{{ old('location') }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="salary" class="col-sm-4 col-form-label">Salary*</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" id="salary" name="salary" required
                                                   title="Please enter salary"  value="{{ old('salary') }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="salary" class="col-sm-4 col-form-label">Description*</label>
                                        <div class="col-sm-8">
                                            <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 text-right">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </section>
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
