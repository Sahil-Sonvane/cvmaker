<nav class="navbar navbar-expand-lg navbar-dark bg-primary ">
  <div class="container">
  <a class="navbar-brand" href="<?=$action->helper->url('home')?>">
      <img src="<?=$action->helper->loadimage('logo.png')?>" alt=""  height="24" class="d-inline-block align-text-top">
      CV Builder
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <?php 
      if($action->user_id()){
        ?>
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?=@$myresume?>" aria-current="page" href="<?=$action->helper->url('home')?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?=@$profile?>" href="#">Profile</a>
        </li> 
      
      <li class="nav-item">
          <a class="nav-link" href ="<?=$action->helper->url('action/logout')?>"><i class="bi bi-box-arrow-left"></i> Logout</a>
      </li>
      </ul>
      
      <?php
      
      }else{
?>
<!-- <div class = "navbar-collapse collapse "> -->
      <ul class ="navbar-nav ms-auto">
      <li class="nav-item">
        <a class="nav-link <?=@$login?>" href ="<?=$action->helper->url('login')?>"><i class="bi bi-box-arrow-in-right"></i> Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?=@$signup?>" href ="<?=$action->helper->url('signup')?>"><i class="bi bi-person-plus-fill"></i> Signup</a>
      </li>
      </ul>
      <!-- </div> -->
<?php
      }
      
      ?>
      
      <!-- <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
    </div>
  </div>
</nav>



