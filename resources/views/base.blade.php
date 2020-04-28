<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proteção do Bem</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.62/jquery.inputmask.bundle.js"></script>
    <script src="{{ asset('js/app.js') }}" type="text/js"></script>

</head>
<body>
<div class="container">
    @guest()
    @else
        <a href="/home" class="btn">Home</a>
    @endguest
    @yield('main')
</div>
<script>
    $(window).load(function(){
        var phones = [{ "mask": "(###) # ####-####"}, { "mask": "(###) # ####-####"}];
        $('#phone').inputmask({
            mask: phones,
            greedy: false,
            definitions: { '#': { validator: "[0-9]", cardinality: 1}} });
    });
</script>
</body>
</html>
