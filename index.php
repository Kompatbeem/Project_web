<title>Counting system</title>
<!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css"
  rel="stylesheet"
/>
<!-- MDB -->

<style type="text/css">
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
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="admin/dist/img/approve.png"
          class="img-fluid" alt="Sample image" width="100%">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form action="check_login.php" method="post">
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-center">
            <h3 class="lead fw-normal mb-0 me-3">ระบบริหารการตรวจนับวัสดุและครุภัณฑ์ </h3>
            <!-- <a href="https://web.facebook.com/devtai.com2019/"><button type="button"class="btn btn-primary btn-floating mx-1">
              <i class="fab fa-facebook-f"></i>
            </button></a>
            <a href="https://www.youtube.com/channel/UCeJ1ZmVB969fLWqqbwRZ89Q"><button type="button" class="btn btn-primary btn-floating mx-1">
              <i class="fab fa-youtube"></i>
            </button></a>

            <a href="https://devtai.com/"> <button type="button" class="btn btn-primary btn-floating mx-1">
              <i class="fab fa-google"></i>
            </button></a> -->
          </div>

          <div class="divider d-flex align-items-center my-4">
            <p class="text-center fw-bold mx-3 mb-0">Log-in</p>
          </div>

          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="text" id="form3Example3" name="username" required class="form-control form-control-lg"
              placeholder="Enter a valid username" />
            <label class="form-label" for="form3Example3">Username</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-2">
            <input type="password" id="form3Example4" name="password" required class="form-control form-control-lg"
              placeholder="Enter password" />
            <label class="form-label" for="form3Example4">Password</label>
          </div>

          <div class="">
            <!-- Checkbox -->
            <!-- <div class="form-check mb-0">
              <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
              <label class="form-check-label" for="form2Example3">
                Remember me
              </label>
            </div>
            <a href="#!" class="text-body">Forgot password?</a> -->
           
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-block"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
          
          </div>

        </form>
      </div>
    </div>
  </div>
  <div
    class=" text-center text-md-center  py-4 px-4 px-xl-5 bg-primary">
    <!-- Copyright -->
    <div class="text-white mb-3 mb-md-0">
     ระบบริหารการตรวจนับ counting system RMUTT  © DevRmutt 2023. 
    </div>
    <!-- Copyright -->

    <!-- Right -->
    <!-- <div>
      <a href="https://web.facebook.com/devtai.com2019/" class="text-white me-4">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="https://www.youtube.com/channel/UCeJ1ZmVB969fLWqqbwRZ89Q" class="text-white me-4">
        <i class="fab fa-youtube"></i>
      </a>
      <a href="https://devtai.com/" class="text-white me-4">
        <i class="fab fa-google"></i>
      </a>
    </div> -->
    <!-- Right -->
  </div>
</section>
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"
></script>