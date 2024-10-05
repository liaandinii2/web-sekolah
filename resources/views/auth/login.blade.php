<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Galeri Sekolah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      body, html {
          margin: 0;
          padding: 0;
          height: 100%;
          overflow: hidden;
      }
      video {
          position: fixed;
          top: 0;
          left: 0;
          width: 100vw; /* Mengisi 100% lebar viewport */
          height: 100vh; /* Mengisi 100% tinggi viewport */
          object-fit: cover; /* Menjaga proporsi video saat mengisi layar */
          z-index: -1;
      }
      .card {
          background: rgba(255, 255, 255, 0.8); /* Transparansi pada card */
          z-index: 1; /* Pastikan form muncul di atas video */
      }
      .container {
          position: relative;
          z-index: 1; /* Pastikan form muncul di atas video */
      }
    </style>
  </head>

  <body>
    <!-- Video Background -->
    <video autoplay muted loop>
      <source src="{{ asset('/assets/images/background/bg.mp4') }}" type="video/mp4">
      Your browser does not support the video tag.
    </video>

    <div class="container mt-5">
      <div class="w-50 d-block mx-auto">
        <div class="card">
          <div class="card-body px-4 my-4">
            <h3 class="text-center mb-4">Login</h3>
            @if (session('status'))
              <div class="alert alert-success">
                {{ session('status') }}
              </div>
            @endif
            <form action="/login" method="post">
              @csrf
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
              </div>
              <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Remember</label>
              </div>
              <button type="submit" class="btn btn-primary d-block mx-auto mt-4">Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
