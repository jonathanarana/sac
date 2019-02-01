    <title>Welcome to SAC</title>
  </head>
  <body class="welcome">
    <div class="container">
      <div class="row text-center white-fore bajar">
        
        <h1>Welcome to  Self Access Center</h1>

        <div class="col-md-3 col-md-offset-1 col-lg-3 col-md-offset-1 pad">
          <br><br>
          <div class="inpad">
            <h2>Access</h2>
            <p>Register a new access.</p>
            <br><br><br><br><br><br>
            <a href="<?php echo base_url();?>index.php/Access/in" class="btn btn-success">Go!</a>
            <br><br>
          </div>
        </div>
        <div class="col-md-4 col-lg-4 pad">
          <div class="inpad">
            <h2>Admin</h2>
            <p>Section for administrators.</p>
            <br><br><br><br><br><br>
            <a href="<?php echo base_url();?>index.php/Access/adm" class="btn btn-primary">Go!</a>
            <br><br> 
          </div>
        </div>
        <div class="col-md-3 col-lg-3 pad">
          <br><br>
          <div class="inpad">
            <h2>Out</h2>
            <p>Register the exit.</p>
            <br><br><br><br><br><br>
            <a href="<?php echo base_url();?>index.php/Access/out" class="btn btn-danger">Go!</a>
            <br><br>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>