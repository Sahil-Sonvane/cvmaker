

    
    <!-- Custom styles for this template -->
    
 
 
<div class="divbody">  
<main class="form-signin text-center">
  <form method ="POST" action = "<?=$action->helper->url('action/login')?>">
    <img class="mb-4" src="<?=$action->helper->loadimage('logo.png')?>" alt="" width="72" >
    <h1 class="h3 mb-3 fw-normal">Login</h1>

    
    <div class="form-floating ">
      <input type="email" name= "email_id" class="form-control int" id="floatingInput" placeholder="name@example.com" required>
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating mb-3">
      <input type="password" name="password" class="form-control inb" id="floatingPassword" placeholder="Password" required>
      <label for="floatingPassword">Password</label>
    </div>
<!-- later we use this div -->
    <!-- <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div> -->
    <button class="w-100 btn btn-lg btn-primary" type="submit">Login </button>
    <a href="<?=$action->helper->url('signup')?>" class="d-block mt-3  text-decoration-none ">Create New Account !</a>
  </form>
</main>
</div> 


    

