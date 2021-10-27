@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Post content-->
                        <article>
                            <!-- Post content-->
                            <section class="mb-5">
                                <div class="card bg-light mb-3">
                                    <div class="card-body">
                                        <!-- Comment with nested comments-->
                                        <div class="d-flex mb-4">
                                            <!-- Parent comment-->
                                            <h2 class="section-heading">
                                                {{ $vacancy->title }}
                                            </h2>
                                        </div>
                                        <!-- Single comment-->
                                        <div class="d-flex">
                                            <div class="ms-3">
                                                <b>Location</b>
                                            </div>
                                            <div class="ms-3 ml-4">
                                                {{ $vacancy->location }}
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="ms-3">
                                                <b>Salary</b>
                                            </div>
                                            <div class="ms-3 ml-4">
                                                £{{ $vacancy->salary }}
                                            </div>
                                        </div>
                                        <div class="d-flex mt-2">
                                            <div class="ms-3">
                                                {{ $vacancy->description }}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </section>
                        </article>
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
