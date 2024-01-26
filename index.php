<?php
include "koneksi.php";
session_start();
if (!isset($_SESSION['username'])) {
  header('location : login.php');
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Animoon Store</title>
  <link rel="stylesheet" href="dinamis.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="fontawesome/css/all.css">
</head>

<body>
  <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
    <symbol id="check2" viewBox="0 0 16 16">
      <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
    </symbol>
    <symbol id="circle-half" viewBox="0 0 16 16">
      <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
    </symbol>
    <symbol id="moon-stars-fill" viewBox="0 0 16 16">
      <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
      <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
    </symbol>
    <symbol id="sun-fill" viewBox="0 0 16 16">
      <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
    </symbol>
  </svg>

  <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
    <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center" id="bd-theme" type="button" aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
      <svg class="bi my-1 theme-icon-active" width="1em" height="1em">
        <use href="#circle-half"></use>
      </svg>
      <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
    </button>
    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
      <li>
        <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
          <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
            <use href="#sun-fill"></use>
          </svg>
          Light
          <svg class="bi ms-auto d-none" width="1em" height="1em">
            <use href="#check2"></use>
          </svg>
        </button>
      </li>
      <li>
        <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
          <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
            <use href="#moon-stars-fill"></use>
          </svg>
          Dark
          <svg class="bi ms-auto d-none" width="1em" height="1em">
            <use href="#check2"></use>
          </svg>
        </button>
      </li>
      <li>
        <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
          <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
            <use href="#circle-half"></use>
          </svg>
          Auto
          <svg class="bi ms-auto d-none" width="1em" height="1em">
            <use href="#check2"></use>
          </svg>
        </button>
      </li>
    </ul>
  </div>

  <div class="b-example-divider"></div>

  <header class="p-3 mb-5 border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="index.php" class="d-flex align-items-center mb-2 me-5 mb-lg-0 link-body-emphasis text-decoration-none">
          <img src="img/Tak berjudul197_20230320085910.png" alt="" width="38px" height="38px" style="border-radius: 28%; background-color:black;">
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="index.php" class="nav-link px-2 link-secondary">Home</a></li>
          <li><a href="#" class="nav-link px-2 link-body-emphasis">About</a></li>
          <li><a href="#" class="nav-link px-2 link-body-emphasis">Product</a></li>
          <li><a href="#" class="nav-link px-2 link-body-emphasis">Contact</a></li>

        </ul>
        <!-- <a href="keranjang.php"><i class="fas fa-light fa-cart-shopping me-4 pt-1 pe-1" href="cart_view.php" style="color: #000000;"></i></a> -->

        <div class="dropdown text-end">
          <i class="fas fa-circle-user d-block link-body-emphasis text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false"></i>
          <ul class="dropdown-menu text-small">
            <li><a class="dropdown-item" href="#">Halo <?= $_SESSION['username'] ?></a></li>
            <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
          </ul>
        </div>
      </div>
    </div>
  </header>


  <br><br><br>

  <div class="container text-center">
    <div class="row mb-5">
      <div class="col">
        <img src="img/luca-bravo-ujhKqutt3f0-unsplash.jpg" alt="" width="680px" height="420px" style="border-radius: 2%;">
      </div>
      <div class="col">
        <h1 class="fw-light mb-5">Animoon Store</h1>
        <br>
        <p class="lead text-body-secondary">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laudantium nam adipisci odit voluptatum totam modi quisquam tenetur quas, aliquid vero dolor inventore aliquam voluptatibus quia iure expedita facere nemo nihil? lore</p>
      </div>
    </div>

    <hr><br><br>
    <div class="barang">
      <form action="cart.php?id=<?=$data["id"] ?>" method="post">
        <div class="row row-cols-1 row-cols-sm-3 g-3">
          <?php
          include "koneksi.php";
          $query = "SELECT * FROM laptop";
          $result = mysqli_query($koneksi, $query);
          while ($data = mysqli_fetch_array($result)) {  ?>
            <div class="col">
              <div class="card" style="width: 20rem;">
                <img src="img_produk/<?=$data['foto']; ?>">
                <div class="card-body">
                  <h5><?=$data["nama_laptop"]; ?></h5>
                  <h3>Rp.<?php echo $data["harga"]; ?></h3>
                  <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores laudantium fugit deleniti? Iste harum distinctio a incidunt perspiciatis necessitatibus soluta facilis earum rem saepe nihil, eum quaerat porro, vitae maiores?</p>
                  <a href="checkout.php?id=<?= $data['kode_laptop'] ?>" class="btn btn-primary">Buy Now!</a>
      </form>
    </div>
  </div>
  </div>
<?php } ?>
</div>
</div>

<!--Contact-->
<hr>
<div class="container-fluid">
  <h2 class="section-title position-relative text-uppercase mx-xl-5 mt-5 mb-5"><span class="pr-3 mb-5">Contact Us</span></h2>
  <div class="row px-xl-5">
    <div class="col-lg-7 mb-5">
      <div class="contact-form bg-light p-30">
        <div id="success"></div>
        <form name="sentMessage" id="contactForm" novalidate="novalidate">
          <div class="control-group">
            <input type="text" class="form-control" id="name" placeholder="Your Name" required="required" data-validation-required-message="Please enter your name" />
            <p class="help-block text-danger"></p>
          </div>
          <div class="control-group">
            <input type="email" class="form-control" id="email" placeholder="Your Email" required="required" data-validation-required-message="Please enter your email" />
            <p class="help-block text-danger"></p>
          </div>
          <div class="control-group">
            <input type="text" class="form-control" id="subject" placeholder="Subject" required="required" data-validation-required-message="Please enter a subject" />
            <p class="help-block text-danger"></p>
          </div>
          <div class="control-group">
            <textarea class="form-control" rows="8" id="message" placeholder="Message" required="required" data-validation-required-message="Please enter your message"></textarea>
            <p class="help-block text-danger"></p>
          </div>
          <div>
            <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">Send
              Message</button>
          </div>
        </form>
      </div>
    </div>
    <div class="col-lg-5 mb-5">
      <div class="bg-light p-30 mb-30">
        <iframe style="width: 100%; height: 250px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
      </div>
      <div class="bg-light p-30 mb-3">
        <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i> Penggung, Kota Cirebon, Indonesia</p>
        <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i> info@example.com</p>
        <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i> +62 1234 5678 910</p>
      </div>
    </div>
  </div>
</div>
<!-- Contact End -->

        <!--Footer-->
        <hr>
        <footer class="container py-5">
          <div class="row">
            <div class="col-12 col-md">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mb-2" role="img" viewBox="0 0 24 24">
                <title>Product</title>
                <circle cx="12" cy="12" r="10" />
                <path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94" />
              </svg>
              <small class="d-block mb-3 text-body-secondary">&copy; 2017–2023</small>
            </div>
            <div class="col-6 col-md">
              <h5>Features</h5>
              <ul class="list-unstyled text-small">
                <li><a class="link-secondary text-decoration-none" href="#">Cool stuff</a></li>
                <li><a class="link-secondary text-decoration-none" href="#">Random feature</a></li>
                <li><a class="link-secondary text-decoration-none" href="#">Team feature</a></li>
                <li><a class="link-secondary text-decoration-none" href="#">Stuff for developers</a></li>
                <li><a class="link-secondary text-decoration-none" href="#">Another one</a></li>
                <li><a class="link-secondary text-decoration-none" href="#">Last time</a></li>
              </ul>
            </div>
            <div class="col-6 col-md">
              <h5>Resources</h5>
              <ul class="list-unstyled text-small">
                <li><a class="link-secondary text-decoration-none" href="#">Resource name</a></li>
                <li><a class="link-secondary text-decoration-none" href="#">Resource</a></li>
                <li><a class="link-secondary text-decoration-none" href="#">Another resource</a></li>
                <li><a class="link-secondary text-decoration-none" href="#">Final resource</a></li>
              </ul>
            </div>
            <div class="col-6 col-md">
              <h5>Resources</h5>
              <ul class="list-unstyled text-small">
                <li><a class="link-secondary text-decoration-none" href="#">Business</a></li>
                <li><a class="link-secondary text-decoration-none" href="#">Education</a></li>
                <li><a class="link-secondary text-decoration-none" href="#">Government</a></li>
                <li><a class="link-secondary text-decoration-none" href="#">Gaming</a></li>
              </ul>
            </div>
            <div class="col-6 col-md">
              <h5>About</h5>
              <ul class="list-unstyled text-small">
                <li><a class="link-secondary text-decoration-none" href="#">Team</a></li>
                <li><a class="link-secondary text-decoration-none" href="#">Locations</a></li>
                <li><a class="link-secondary text-decoration-none" href="#">Privacy</a></li>
                <li><a class="link-secondary text-decoration-none" href="#">Terms</a></li>
              </ul>
            </div>
          </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</body>

</html>
