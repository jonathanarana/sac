    <title>Welcome to SAC</title>
  </head>
  <body class="logout">
    <div class="container white-fore">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 text-center">
          <h1>Check Your exit</h1>
          <form method="post" action="" id="form">
            <label for="matricula">Enrollment:</label>
            <input type="text" name="matricula" class="form-control" minlength="8" maxlength="9" required 
            autofocus id="matricula">
          </form>
        </div>
      </div>
    </div>
     <script type="text/javascript">
      $("#form").submit(function(e){
        e.preventDefault();
        $.ajax({
          method: "POST",
          url: "<?php echo base_url();?>index.php/Access/logout",
          data: { matricula: $('#matricula').val() }
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