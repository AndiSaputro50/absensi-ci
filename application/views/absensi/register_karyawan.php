<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="index.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
</head>
<style>
.divider:after,
.divider:before {
content: "";
flex: 1;
height: 1px;
background: #eee;
}
.h-custom {
height: calc(100% - 73px);
}
@media (max-width: 450px) {
.h-custom {
height: 100%;
}
}
</style>
<body>
    
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="https://img.freepik.com/free-vector/shrug-concept-illustration_114360-9375.jpg?w=740&t=st=1697188279~exp=1697188879~hmac=fb8a4b1cc948debcc2e8c9b271756a4c6dacb4de4f43dc9575a7244d627b0c47" class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form class="content " action="<?php echo base_url('Auth/aksi_register') ?>" method="post">
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
          </div>
          
          <!-- Inputan Nama Depan -->
          <div class="form-outline mb-3">
              <i class="fa-solid fa-user fa-lg me-3 fa-fw"></i>
              <input type="text" name="nama_depan" id="form3Example3" placeholder="Nama Depan" />
          </div>
          <!-- Inputan Nama Belakang -->
          <div class="form-outline mb-3">
              <i class="fa-solid fa-user fa-lg me-3 fa-fw"></i>
              <input type="text" name="nama_belakang" id="form3Example3" placeholder="Nama Belakang" />
          </div>
          <!-- Inputan Username -->
          <div class="form-outline mb-3">
              <i class="fa-solid fa-user-tie fa-lg me-3 fa-fw"></i>
              <input type="text" name="username" id="form3Example3" placeholder="Username" />
          </div>

          <!-- Inputan Email -->
          <div class="form-outline mb-3">
              <i class="fa-solid fa-envelope fa-lg me-3 fa-fw"></i>
              <input type="text" name="email" id="form3Example4" placeholder="Email" />
          </div>

          <!-- Inputan Password -->
          <div class="form-outline mb-3">
              <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
              <input type="text" name="password" id="form3Example4" placeholder="Password" />
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            <div class="form-check mb-0">
              <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
              <label class="form-check-label" for="form2Example3">Remember me</label>
            </div>
          </div>


          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary">Register</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Belum Punya Akun? 
                <a href="<?php echo base_url('absensi/login')?>"
                class="link-primary">Login</a></p>
                <a href="<?php echo base_url('absensi/register')?>"
                class="link-primary">Register</a>
          </div>

        </form>
      </div>
    </div>
  </div>
</section>
</body>
</html>