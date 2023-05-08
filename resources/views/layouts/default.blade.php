<!DOCTYPE html>
<html lang="en">
<head>
  <title>Laravel Discografia</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
    <div class="container my-4" style="max-width:700px;">

        <div class="row">
            <div class="col-12"> @yield('content') </div>
        </div>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(".closed").click(function(){$('.alert').fadeOut();});
</script>
</body>

</html>
