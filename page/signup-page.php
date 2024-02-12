

    
    <!-- Custom styles for this template -->
    
 
 
<div class="divbody">
<main class="form-signin w-100 m-auto text-center">
  <form method ="POST" action = "<?=$action->helper->url('action/signup')?>">
    <img class="mb-4" src="<?=$action->helper->loadimage('logo.png')?>" alt="" width="72" >
    <h1 class="h3 mb-3 fw-normal">Create New Account</h1>

    <div class="form-floating">
      <input type="text" name = "full_name" class="form-control sint" id="floatingInput" placeholder="your full name ">
      <label for="floatingInput">Full Name</label>
    </div>
    <div class="form-floating">
      <input type="email" name= "email_id" class="form-control sinm" id="floatingInput" placeholder="name@example.com" required>
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating mb-3">
      <input type="password" name="password" class="form-control sinb" id="floatingPassword" placeholder="Password" required>
      <label for="floatingPassword">Password</label>
    </div>
<!-- later we use this div -->
    <!-- <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div> -->
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign Up</button>
    <a href="<?=$action->helper->url('login')?>" class="d-block mt-3 text-decoration-none  ">Already have an Account! Login </a>
  </form>
</main>
</div>


    

