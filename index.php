<?php

echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>
<body>
<section class="login-page vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center text-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
            
            
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p id="sign" class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
                <div id="succes" class="d-none text-success align-items-center ">Registration successful</div>
                <div id="error" class="d-none text-warning align-items-center mb-4"></div>
                <form class="mx-1 mx-md-4" id="form">

                  <div class="d-flex flex-column align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <label class="form-label" for="firstName">First Name</label>
                    <input class="form-control" type="text" id="firstName" name="firstName" placeholder="Enter First Name" />
                     
                    </div>
                  

                    <div class="d-flex flex-column align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    
                    <label class="form-label" for="lastName">Last Name</label>
                    <input class="form-control" type="text" id="lastName" name="lastName" placeholder="Enter Last Name"  />
                    
                     
                    </div>
                    <div class="d-flex flex-column align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <label class="form-label" for="email">Email</label>
                    <input class="form-control"  type="email" id="email" name="email"  placeholder="Enter email" />
                  
                     
                    </div>
                    <div class="d-flex flex-column align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <label class="form-label" for="password">Password</label>
                    <input class="form-control" type="password"   id="password" name="password" placeholder="Enter Password"/>
                    
                     
                    </div>
                    <div class="d-flex flex-column align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    
                    <label class="form-label" for="repeatPassword">Repeat Password</label>
                    <input class="form-control" type="password" placeholder="repeatPassword"  id="repeatPassword" name="repeatPassword"  placeholder="Repeat Password<"/>
                 
                      
                    </div>
                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                  <input type="submit" class="btn btn-primary btn-lg" value="Submit">
                 
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                  class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



      <script>
          document.getElementById("form").addEventListener("submit", function(event){
          event.preventDefault()
          let xhr = new XMLHttpRequest();
          let formData = new FormData(this);
          xhr.open("POST", "process.php");
          xhr.send(formData);
          xhr.onload = function() {
              if (xhr.status != 200) {
                  alert(`Error ${xhr.status}: ${xhr.statusText}`);
              } else {
                const errorElement = document.getElementById("error");
                const formElement = document.getElementById("form");
                const successElement = document.getElementById("succes");
                const signElement = document.getElementById("sign");
        
                errorElement.innerHTML = xhr.response;
                errorElement.classList.toggle("d-none", xhr.response === "Registration successful");
                formElement.classList.toggle("d-none", xhr.response === "Registration successful");
                successElement.classList.toggle("d-none", xhr.response !== "Registration successful");
                signElement.classList.toggle("d-none", xhr.response !== "Registration successful");
              }
          };
      });
      </script>
</body>
</html>
';
?>