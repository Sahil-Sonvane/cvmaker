<div class="container">
    <h2 class="my-2"> Select cv Template</h2>
    <div class="d-flex flex-wrap gap-3">

   
<div class="card my-3 mb-3" style="max-width: 400px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="<?=$action->helper->loadimage('cv-temp-1.png')?>" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Default CV Template</h5>
        <p class="card-text">This is a Free and Simple cv Template.</p>
        <a href="<?=$action->helper->url("resume/1/".$url)?>" class = "btn btn-sm btn-primary"><i class="bi bi-file-earmark-plus"></i> Use Template</a>        
      </div>
    </div>
  </div>
</div>

<div class="card my-3 mb-3" style="max-width: 400px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="<?=$action->helper->loadimage('cv-temp-2.png')?>" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Modern CV Template</h5>
        <p class="card-text">This is a two coloumn modern cv format which includes profile photo.</p>
        <a href="<?=$action->helper->url("resume/2/".$url)?>" class = "btn btn-sm btn-success"><i class="bi bi-file-earmark-plus"></i> Use Template</a>        
      </div>
    </div>
  </div>
</div>
</div>
</div>