<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Order</title>

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
        <h1 class="h2 blog-header-logo text-dark">Request To Get Data</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>
    @if ($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif

    <form method="post" action="{{ route('order') }}">
       @csrf
       <div class="form-group">
           <label for="customer">Customer's Name</label>
           <input type="text" id="customer" name="customer" value="{{ old('customer') }}" class="form-control">
       </div>
        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="phone" id="phone" name="phone" value="{{ old('phone') }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="getdescription">What kind of data do you want to get?</label>
            <textarea class="form-control" id="getdescription" name="getdescription">{{ old('description') }}</textarea>
        </div>

        <br>
        <button type="submit" class="btn btn-success">Send</button>
    </form>
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
