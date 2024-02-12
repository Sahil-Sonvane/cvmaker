<?php
$resume['contact'] = str_replace("\\", "", $resume['contact']);
$resume['skills'] = str_replace("\\", "", $resume['skills']);
$resume['education'] = str_replace("\\", "", $resume['education']);
$resume['experience'] = str_replace("\\", "", $resume['experience']);
$contact = json_decode($resume['contact']);
$skills = json_decode($resume['skills']);
$edu = json_decode($resume['education']);
$exps = json_decode($resume['experience']);
?><!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet"  href="<?= $action->helper->loadcss('cv-css-2.css') ?>">
  <link rel = "icon" href = "<?=$action->helper->loadimage('logo.png')?>">
  <script src="https://kit.fontawesome.com/33cebb3b10.js" crossorigin="anonymous"></script>
  <!-- Include html2pdf library via CDN -->
  <script src="https://rawgit.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>

  <title><?= @$title ?></title>
</head>

<body>

  <div class="controls">
  <?php 
  if($resume['url'] == 1){
    ?>
<button class="btn" id="homebtn" type="button"><a href="<?=$action->helper->url('home')?>">Home</a></button>
    <button class="btn" id="changetempbtn" type="button"><a href="<?=$action->helper->url("select-template/".$resume['url'])?>">Change Template</a></button>
    <button class="btn" id="sharebtn" type="button" onclick="copyurl('<?=$action->helper->url("resume/2/1")?>')"><i class="bi bi-clipboard"></i> Copy Url</button> 
    <button class="btn" id="printbtn" type="button" onclick="window.print()">Print</button>
    <button class="btn" id="downloadbtn" type="button">Download Pdf</button>
<?php
  }else if($action->user_id() == @$resume['user_id'] 
      ){
        ?>
    <button class="btn" id="homebtn" type="button"><a href="<?=$action->helper->url('home')?>">Home</a></button>
    <button class="btn" id="changetempbtn" type="button"><a href="<?=$action->helper->url("select-template/".$resume['url'])?>">Change Template</a></button>
    <button class="btn" id="sharebtn" type="button" onclick="copyurl('<?=$action->helper->url("resume/2/".$resume['url'])?>')"><i class="bi bi-clipboard"></i> Copy Url</button> 
    <button class="btn" id="printbtn" type="button" onclick="window.print()">Print</button>
    <button class="btn" id="downloadbtn" type="button">Download Pdf</button>
   <?php
    }else{
      ?>
       <button class="btn" id="printbtn" type="button" onclick="window.print()">Print</button>
       <button class="btn" id="downloadbtn" type="button">Download Pdf</button>
      <?php
    }

    
   
    ?>
   
  </div>
    <div class="resume" id="resume">
      <div class="leftpanel">
        <img src="<?=empty($resume['profilepic']) ? ASSET_URL . 'profilepics/profile.png' : ASSET_URL . 'profilepics/' . $resume['profilepic'] ?>" class="profile" />
        <div class="contact-detail">
          <h2 class="heading">Contact</h2>
          <p><i class="fa-solid fa-envelope"></i> <?= @$contact->email ?></p>
          <p><i class="fa-solid fa-phone"></i> 91+ <?= @$contact->mobile ?></p>
          <p><i class="fa-solid fa-location-dot"></i> <?= @$contact->address ?></p>
          <p><i class="fa-brands fa-linkedin"></i> <?= @$contact->linkedin ?></p>
        </div>
        <div class="skills">
          <h2 class="heading">Skills</h2>
          <ul class="skill-list">
         <?php
          foreach ($skills as $skill) {
          ?>
            <li><i class="fa-solid fa-code"></i> <?= @$skill ?></li>

          <?php } ?>
          </ul>
        </div>
      </div>
      <div class="rightpanel">
        <section class="header">          
            <h1><?= @$resume['name'] ?></h1>
            <h2><?= @$resume['headline'] ?></h2>
          </section>
          <div class="divider"></div>

        <section class="objective">
          <h2 class="heading">Objective</h2>
          <p><?= @$resume['objective'] ?></p>
        </section>
      
      <section class="edu" >
        <h2 class="heading">Education</h2>
        
        <?php
        foreach ($edu as $edus) {
        ?>
          <div class="education">
            <h3>
              <?= $edus->course ?> in <?= $edus->branch ?>, <span><?= $edus->e_duration ?></span>- with <span><?= $edus->percentage ?></span>
            </h3>
            <p><?= $edus->collage ?></p>
          </div>
        <?php
        }
        ?>
        
      </section>
      

      <section class="experience-box">
        <h2 class="heading">Experience</h2>
        <?php
        if (count($exps) < 1) {
          echo "<h3> Fresher</h3>";
        }
        foreach ($exps as $exp) {
        ?>
          <div class="experience">
            <h3><?= $exp->company ?>, <span><?= $exp->w_duration ?></span></h3>
            <h4><?= $exp->jobrole ?></h4>
            <p><?= $exp->work_desc ?></p>
          </div>
        <?php } ?>
      </section>
      </div>
    </div>

    <script>
    const downloadBtn = document.getElementById('downloadbtn')
    downloadBtn.addEventListener('click', function() {
    let resume = document.getElementById('resume'); 
    let opt = {
        filename:     '<?= @$resume['name'] ?>.pdf',
        image:        { type: 'jpeg', quality: 0.98 },
        jsPDF:        { unit: 'cm', format: [21.7, 31], orientation: 'portrait' }
          };

      html2pdf(resume, opt);
    });

 
    function copyurl(url){
    navigator.clipboard.writeText(url);
    }


</script>

  </body>
</html>
