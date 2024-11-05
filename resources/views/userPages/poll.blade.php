@extends('layouts.user_main')

@section('title', 'Poll')

@section('content')
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

            <a href="#" class="logo d-flex align-items-center">
                <h1 class="sitename">Polls</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero" active>Polls</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </header>

    <main class="main">


        <div class="page-title dark-background">
            <div class="container position-relative">
                <h1>Polls</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ route('user.poll.index') }}">Home</a></li>
                    </ol>
                </nav>
            </div>
        </div>

        <section id="blog-posts" class="blog-posts section">
            <div class="container">
                <div class="row">
                    <div class="col-6 offset-3 mb-3">
                        <h3>
                            {{ $models->title }}
                        </h3>
                        <form action="{{ route('poll.submit', $models->id) }}" method="POST">
                            @csrf
                            @foreach ($models->option as $option)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="select_option"
                                        id="option{{ $option->id }}" value="{{ $option->id }}">
                                    <label class="form-check-label" for="option{{ $option->id }}">
                                        <h5>
                                            {{ $option->body }}
                                        </h5>
                                    </label>
                                </div>
                            @endforeach
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
                    </div>
                    @if (session('status') & session('message'))
                        <div class="alert alert-{{ session('status') }} alert-dismissible fade show" role="alert">
                            <strong>{{ session('message') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                </div>
            </div>

        </section>
    </main>

    <footer id="footer" class="footer dark-background">
        <div class="container">
            <div class="copyright">
                <span>Copyright</span> <strong class="px-1 sitename">Selecao</strong> <span>All Rights
                    Reserved</span>
            </div>
        </div>
    </footer>
@endsection
