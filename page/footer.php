<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="<?= $action->helper->loadjs('main.js') ?>"></script>
<script>
  const Toast = Swal.mixin({
    toast: true,
    position: 'bottom-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  });
  <?php
  $error = $action->session->get('error');
  $success = $action->session->get('success');
  if ($error) {
  ?>
    Toast.fire({
      icon: 'error',
      title: '<?= $error ?>'
    });
  <?php
    $action->session->delete('error');
  }


  //  For Success Message
  if ($success) {
  ?>
    Toast.fire({
      icon: 'success',
      title: '<?= $success ?>'
    });
  <?php
    $action->session->delete('success');
  }
  ?>
   // function for add skills 
   $("#addskill").click(function() {
    var skill = $("#userskill").val();
    // alert(skill);
    if (!skill) {
      Toast.fire({
        icon: 'error',
        title: 'Please Enter  Atleast 1 Skill'
      });
      return;
    }

    $("#skills").append(`<span class="badge bg-success p-2 m-1"> ${skill}<input type="hidden" name="skill[]" value="${skill}" /> <span class ="removeskill" onclick="removeskill(this)"> x </span></span>`);
    $("#userskill").val("");
  });

  function removeskill(button) {
    $(button).parent().remove();
  }

  // function for add Education 
  $("#addedu").click(function() {
    var course = $("#course").val();
    var collage = $("#collage").val();
    var branch = $("#branch").val();
    var percentage = $("#percentage").val();
    var e_duration = $("#e_duration").val();

    if (!collage) {
      Toast.fire({
        icon: 'error',
        title: 'Please Enter Collage/University Name.'
      });
      return;
    }
    if (!course) {
      Toast.fire({
        icon: 'error',
        title: 'Please Enter Course Name.'
      });
      return;
    }
    if (!e_duration) {
      Toast.fire({
        icon: 'error',
        title: 'Please Enter Collage Duration.'
      });
      return;
    }
    if (!percentage) {
      Toast.fire({
        icon: 'error',
        title: 'Please Enter CGPA/Percentage'
      });
      return;
    }
    if (!branch) {
      Toast.fire({
        icon: 'error',
        title: 'Please Enter Stream name/ branch'
      });
      return;
    }

    $("#education").append(`<div class="d-inline-block border rounded  m-2 p-3">
                            <input type="hidden" name="course[]" value="${course}">
                            <input type="hidden" name="collage[]" value="${collage}">
                            <input type="hidden" name="branch[]" value="${branch}">
                            <input type="hidden" name="e_duration[]" value="${e_duration}">
                            <input type="hidden" name="percentage[]" value="${percentage}">
                            <p>${course} in ${branch}, <span>${e_duration}</span>- with <span>${percentage}</span></p>
            <p>${collage}</p>
                            <button class="btn btn-danger btn-sm" onclick="removeedu(this)" type="button">Remove</button>
                          </div>`);
    $("#course").val("");
    $("#collage").val("");
    $("#branch").val("");
    $("#e_duration").val("");
    $("#percentage").val("");
  });
  // function for remove education field
  function removeedu(button) {
    $(button).parent().remove();
  }

    // function for add Experience
    $("#addexps").click(function() {
    var company = $("#company").val();
    var jobrole = $("#jobrole").val();
    var w_duration = $("#w_duration").val();
    var work_desc = $("#work_desc").val();

    if (!company) {
      Toast.fire({
        icon: 'error',
        title: 'Please Enter Company Name.'
      });
      return;
    }
    if (!jobrole) {
      Toast.fire({
        icon: 'error',
        title: 'Please Enter Jobrole.'
      });
      return;
    }
    if (!w_duration) {
      Toast.fire({
        icon: 'error',
        title: 'Please Enter work duration.'
      });
      return;
    }
    if (!work_desc) {
      Toast.fire({
        icon: 'error',
        title: 'Please Enter work description.'
      });
      return;
    }

    $("#exps").append(`<div class="d-inline-block border rounded  m-2 p-3">
                            <input type="hidden" name="company[]" value="${company}">
                            <input type="hidden" name="jobrole[]" value="${jobrole}">
                            <input type="hidden" name="w_duration[]" value="${w_duration}">
                            <textarea name="work_desc[]" class="d-none">${work_desc}</textarea>
                            <h4>${company}</h4>
                            <p>${jobrole} - (${w_duration})</p>
                            <p>${work_desc}</p>
                            <button class="btn btn-danger btn-sm" onclick="removeexps(this)" type="button">Remove</button>
                          </div>`);
    $("#company").val("");
    $("#jobrole").val("");
    $("#w_duration").val("");
    $("#work_desc").val("");
  });
  // function for remove experience field
  function removeexps(button) {
    $(button).parent().remove();
  }
 window.addEventListener('keydown',(e)=>{
  if(e.keyCode == 13) {
      e.preventDefault();
  }
 });

  function copyurl(url){
    navigator.clipboard.writeText(url);
    Toast.fire({
        icon: 'success',
        title: 'Copied! Share'
      });
    }

</script>


</body>

</html>
