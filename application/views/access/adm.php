    <title>Welcome to SAC</title>
  </head>
  <body class="welcome">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 text-center white-fore">
          <h1>Welcome to the Self Access Center</h1>
          <form method="post" action="<?php echo base_url();?>index.php/Access/go">
            <label>Please fill the form</label>
            <br>
            <label for="user">User:</label>
            <input type="text" name="user" class="form-control" required autofocus>
            <br>
            <label for="password">Password:</label>
            <input type="password" name="password" class="form-control" required >
            <br>
            <input type="submit" name="submit" value="Submit" class="form-control btn btn-primary">
          </form>
        </div>
      </div>
    </div> <!-- fin container -->
  </body>
</html>