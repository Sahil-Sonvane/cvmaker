<div class="container mt-1">

  <div class="card my-2">
    <div class="card-header">
      <a href="<?= $action->helper->url('cv-form') ?>" class="btn btn-sm btn-primary"><i class="bi bi-file-earmark-plus"></i> Create New Resume</a>
    </div>
  </div>
  <?php
   foreach($demo as $Rdemo){
?>
  <div class="card my-3 position-relative">
    <p class="text-secondry dc">Demo Cv</p>
    <div class="card-body">
      <h4 class="card-title"><?=$Rdemo['name']?></h4>
      <h6 class="card-title"><?=$Rdemo['headline']?></h6>
      <p class="card-text"><?=$Rdemo['objective']?></p>
      <a href="<?=$action->helper->url("select-template/".$Rdemo['id'])?>" class="btn btn-sm btn-primary mx-auto my-2"><i class="bi bi-eye-fill"></i> View</a>
  </div>
  </div>
  <?php }?>
  <?php
   
   foreach($resumes as $resume){
?>
  <div class="card my-3">
    <div class="card-body">
      <h4 class="card-title"><?=$resume['name']?></h4>
      <h6 class="card-title"><?=$resume['headline']?></h6>
      <p class="card-text"><?=$resume['objective']?></p>
      <a href="<?=$action->helper->url("select-template/".$resume['url'])?>" class="btn btn-sm btn-primary my-2 mx-2"><i class="bi bi-eye-fill"></i> View</a>
      <a href="<?=$action->helper->url("update/".$resume['url'])?>" class="btn btn-sm btn-primary my-2 mx-2"><i class="bi bi-pencil-square"></i> Update</a>
      <a href="<?=$action->helper->url("action/deleteresume/".$resume['url'])?>" class="btn btn-sm btn-danger my-2 mx-2"><i class="bi bi-trash3-fill"></i> Delete</a>
      
    </div>
  </div>


<?php
   }
   if(count($resumes)<1){
     ?>
    <div class="card my-3">
    <div class="card-body">
      <h1 class="text-center text-muted"><i class="bi bi-cloud-drizzle"></i> No Resume Available</h1>
    </div>
  </div>
   
 <?php } ?>




</div>