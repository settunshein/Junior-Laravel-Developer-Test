<!doctype html>
<html lang="en">
@include('layouts.partials.head')
<body>
    @include('layouts.partials.nav')

    <main>
        <div class="container-fluid">
            <div class="row">
                @include('layouts.partials.sidebar')

                @yield('content')
            </div><!-- /.row -->
        </div><!-- /.container -->
    </main>

    @include('layouts.partials.scripts')
</body>
</html>
