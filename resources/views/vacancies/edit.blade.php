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
                                <h1 class="fw-bolder mb-1">Edit a Vacancy</h1>
                            </header>

                            <!-- Post content-->
                            <section class="mb-5">
                                <form action="{{ route('vacancies.update', $vacancy) }}" method="POST">
                                    @method('PATCH')
                                    @csrf
                                    <div class="form-group row">
                                        <label for="title" class="col-sm-4 col-form-label">Title*</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="title" name="title" required
                                                   title="Please enter title" value="{{ $vacancy->title }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="location" class="col-sm-4 col-form-label">Location*</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="location" name="location" required
                                                   title="Please enter location"  value="{{ $vacancy->location }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="salary" class="col-sm-4 col-form-label">Salary*</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" id="salary" name="salary" required
                                                   title="Please enter salary"  value="{{ $vacancy->salary }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="salary" class="col-sm-4 col-form-label">Description*</label>
                                        <div class="col-sm-8">
                                            <textarea name="description" id="description" class="form-control">{{ $vacancy->description }}</textarea>
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
                        @include('layouts.errors')
                    </div>
                    <!-- Side widgets-->
                    <div class="col-lg-4">
                        <!-- Search widget-->
                        @include('layouts.search')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
