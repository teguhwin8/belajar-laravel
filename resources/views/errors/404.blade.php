<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <title>404</title>
</head>

<body>
  <style>
    .center-center {
      display: flex;
      width: 100%;
      height: 100vh;
      justify-content: center;
      align-items: center;
    }

  </style>
  <div class="center-center">
    <div class="text-center">
        <img src="{{ asset('images/404-error.svg') }}" alt="" class="w-50">
      <h1>Oops...</h1>
      <h3>Halaman yang kamu cari belum ada.</h3>
      <a href="{{ url('/') }}" class="btn btn-lg btn-primary rounded rounded-pill mt-3 px-4">Kembali ke Home</a>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>
