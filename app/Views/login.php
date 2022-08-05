<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Signin Template · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('css/bootstrap.min.css') ?>" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="<?= base_url('sign-in/signin.css') ?>" rel="stylesheet">
  </head>
  <body class="text-center">

  
    <main class="form-signin">

        <?php
            if(isset($pesan)){
                ?>
                     <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo $pesan;?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
            }
        ?>

        <form action="<?= base_url('Neccimanggis/ceklogin') ?>" method="post">
            <img class="mb-4" src="<?= base_url('assets/brand/nec.jfif') ?>" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
            <label for="inputUsername" class="visually-hidden">Username</label>
            <input type="text" id="inputUsername" name="inputUsername" class="form-control" placeholder="Masukkan Username" required autofocus>
            <label for="inputPassword" class="visually-hidden">Password</label>
            <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Masukkan Password" required>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
        </form>
    </main>

    <!-- Bootstrap JS -->
    <script src="<?= base_url('js/bootstrap.min.js') ?>"></script>
    
  </body>
</html>
