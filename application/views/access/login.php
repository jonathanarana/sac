    <title>Welcome to SAC</title>
  </head>
  <body class="login">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 text-center white-fore">
          <h1>Welcome to the Self Access Center</h1>
          <form method="post" action="" id="form">
            <label>Please fill the form</label>
            <br>
            <label for="accion">Action:</label>
            <select class="form-control" name="accion" required id="accion">
              <option></option>
              <?php 
                foreach ($actividades as $key) {
                  echo '<option value="'.$key['idActividad'].'">'.$key['Nombre'].'</option>';
                }
               ?>
            </select>
            <br>
            <label for="matricula">Enrollment:</label>
            <input type="text" name="matricula" class="form-control" minlength="8" maxlength="9" required id="matricula">
          </form>
        </div>
      </div>
    </div> <!-- fin container -->
    <script type="text/javascript">
      $("#form").submit(function(e){
        e.preventDefault();
        $.ajax({
          method: "POST",
          url: "<?php echo base_url();?>index.php/Access/new_access",
          data: { accion: $('#accion').val(), matricula: $('#matricula').val() }
        })
        .done(function( msg ) {
          var icono='error';
          var txt=msg;
          if (msg == 'ok') {
            icono='success';
            txt='success';
          }
          swal({
              title:'Alert',
              text:txt,
              icon:icono,
              timer:5000
            }).then((value)=>{
              $('#matricula').val('');    
            });
        });
      });
    </script>
  </body>
</html>