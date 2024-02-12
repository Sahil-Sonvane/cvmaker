<?php
$resume['contact'] = str_replace("\\", "", $resume['contact']);
$resume['skills'] = str_replace("\\", "", $resume['skills']);
$resume['education'] = str_replace("\\", "", $resume['education']);
$resume['experience'] = str_replace("\\", "", $resume['experience']);
$contact = json_decode($resume['contact']);
$skills = json_decode($resume['skills']);
$edu = json_decode($resume['education']);
$exps = json_decode($resume['experience']);


?>
<div class="container bg-white w-55 rounded p-4 my-4">
    <h2 class="my-3">Update Your Details</h2>
    <form method="POST" enctype="multipart/form-data" action="<?= $action->helper->url('action/updateresume') ?>" class="border border-2 rounded-2 p-3">
        <div class="row justify-content-between">
            <p class="fs-4"><i class="bi bi-person-circle"></i> Personal Details</p>
            <div class="col-md-6 my-2">
                <label for="inputEmail4" class="form-label">Name</label>
                <input type="hidden" name ="uid" value="<?=$resume['id']?>">
                <input type="text" name="name" value="<?= @$resume['name'] ?>" placeholder="Your Name" class="form-control" required>
            </div>
            <div class="col-md-6 my-2">
                <label for="inputPassword4" class="form-label">Cv Headline</label>
                <input type="text" name="headline" value="<?= @$resume['headline'] ?>" placeholder="PHP Developer" class="form-control" required>
            </div>
            <div class="col-md-12 my-2">
                <label for="inputtextarea4" class="form-label">Objective</label>
                <textarea name="objective" class="form-control"><?= @$resume['objective'] ?></textarea>
            </div>
            <div class="col-md-12 my-2">
            <p class="fs-4"><i class="bi bi-person-circle"></i> Profile Picture</p>

        <label for="inputtextarea4" class="form-label">Upload Picture</label>
        <input type="file" class="form-control" name="profilepic">
      </div>

            <hr>
            <p class="fs-4"><i class="bi bi-person-lines-fill"></i> Contact Details</p>
            <div class="col-md-6 my-2">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" name="email" value="<?= $contact->email ?>" placeholder="Email@email.com" class="form-control" required>
            </div>
            <div class="col-md-6 my-2">
                <label for="inputPassword4" class="form-label">Phone</label>
                <input type="mobile" name="mobile" value="<?= $contact->mobile ?>" placeholder="8967455678" class="form-control" required>
            </div>
            <div class="col-md-6 my-2">
                <label for="inputEmail4" class="form-label">Address</label>
                <input type="text" name="address" value="<?= $contact->address ?>" placeholder="Nagpur,India" class="form-control" required>
            </div>
            <div class="col-md-6 my-2">
        <label for="linkedin" class="form-label">Linkedin Profile</label>
        <input type="text" name="linkedin-url" value="<?= $contact->linkedin ?>" placeholder="www.linkedin.com/in/user-name" class="form-control">
      </div>
            <hr>
            <div class="col-md-12 my-2">
                <label for="inputPassword4" class="form-label fs-3"><i class="bi bi-tools"></i> Skills</label>
                <div id="skills">
                    <?php
                    foreach ($skills as $skill) {
                    ?> <span class="badge bg-success p-2 m-1"> <?= $skill ?><input type="hidden" name="skill[]" value="<?= $skill ?>" /> <span class="removeskill" onclick="removeskill(this)"> x </span></span>
                    <?php
                    }
                    ?>
                </div>
                <div class="d-flex gap-2 mb-3">
                    <input type="text" id="userskill" placeholder="html,css,php" class="form-control">
                    <button class="btn btn-primary btn-sm" type="button" id="addskill">Add</button>
                </div>
            </div>
            <hr>
            <div class=" my-2">
                <label for="inputPassword4" class="form-label fs-3"><i class="bi bi-mortarboard-fill"></i> Education</label>
                <div id="education">
                    <?php
                    foreach($edu as $educ){ ?>
                   
                          <div class="d-inline-block border rounded  m-2 p-3">
                            <input type="hidden" name="course[]" value="<?=$educ->course?>">
                            <input type="hidden" name="collage[]" value="<?=$educ->collage?>">
                            <input type="hidden" name="branch[]" value="<?=$educ->branch?>">
                            <input type="hidden" name="e_duration[]" value="<?=$educ->e_duration?>">
                            <input type="hidden" name="percentage[]" value="<?=$educ->percentage?>">
                            <p><?=$educ->course?> in <?=$educ->branch?>, <span><?=$educ->e_duration?></span> - with <span><?=$educ->e_duration?></span></p>
                            <p><?=$educ->collage?></p>
                            <button class="btn btn-danger btn-sm" onclick="removeedu(this)" type="button">Remove</button>
                          </div> <?php }?>
                </div>
                <div class="d-flex gap-2">
                <input type="text" placeholder="Diploma/Digree" name="" id="course" class="form-control" aria-describedby="course">
                <input type="text" placeholder="University/institute name" name="" id="collage" class="form-control" aria-describedby="collage">
                <input type="text" placeholder="CSE"  name="" id="branch" class="form-control">
                <input type="text" placeholder="2020-22" name="" id="e_duration" class="form-control" aria-describedby="e_duration">
                <input type="text" placeholder="8.5 CGPA / %" name="" id="percentage" class="form-control" aria-describedby="percentage">
                <button class="btn btn-primary btn-sm" type="button" id="addedu"> Add</button>

                </div>
            </div>

            <hr>
            <div class="my-2">
                <label for="inputPassword4" class="form-label fs-3"><i class="bi bi-briefcase-fill"></i> Experience</label>
                <div id="exps">
                        <?php
                       
                        foreach($exps as $exp){
                            ?>
                            <div class="d-inline-block border rounded  me-2 my-2 p-3">
                            <input type="hidden" name="company[]" value="<?=$exp->company?>">
                            <input type="hidden" name="jobrole[]" value="<?=$exp->jobrole?>">
                            <input type="hidden" name="w_duration[]" value="<?=$exp->w_duration?>">
                            <textarea name="work_desc[]" class="d-none"><?=$exp->work_desc?></textarea>
                            <h4><?=$exp->company?></h4>
                            <p><?=$exp->jobrole?> - (<?=$exp->w_duration?>)</p>
                            <p><?=$exp->work_desc?></p>
                            <button class="btn btn-danger btn-sm" onclick="removeexps(this)" type="button">Remove</button>
                          </div>
                            <?php 
                        } ?>
                </div>
                <div class="d-flex gap-2">
                    <input type="text" id="company" placeholder="Google" name="" class="form-control">
                    <input type="text" id="jobrole" placeholder="UI Designer" name="" class="form-control">
                    <input type="text" id="w_duration" placeholder="2020-2022" name="" class="form-control">
                </div>
                <span class="d-block my-2">About Your Work</span>
                <textarea name=" " id="work_desc" class="form-control mb-2 col-md-12"> </textarea>

                <div class="form-floating">
                    <button class="btn btn-primary float-end btn-sm" type="button" id="addexps"> Add</button>
                </div>


            </div>

            <div class="text-center">
                <button type="submit" id="submit" class="btn btn-warning"><i class="bi bi-layout-text-window-reverse"></i> Update Resume</button>

            </div>

        </div>

    </form>
</div>