<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Feedback</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="{{ asset('assets/css/blog.css') }}" rel="stylesheet">
</head>

<body>
    <x-header></x-header>
<div class="container">

    <br>
    <br>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2 blog-header-logo text-dark">Send Feedback</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>
    <div>
        @if ($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif
        <form method="post" action="{{ route('feedback') }}">
        @csrf
        <div class="form-group">
            <label for="name">Your Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control">
        </div>
            <div class="form-group">
                <label for="comment">Your Comment</label>
                <textarea class="form-control" id="comment" name="comment">{{ old('comment') }}</textarea>
            </div>

            <br>
            <button type="submit" class="btn btn-success">Send</button>
        </form>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/holder.min.js') }}"></script>
<script>
    Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
    });
</script>

@stack('js')
</body>
</html>
