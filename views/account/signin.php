<?php echo $base_url;?>
<link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>/lib/account.css" media="all">


<div class="container">


  <div class="login">
    <h2 class="authTitle">Post It Map</h2>
    <div class="row row-sm-offset-3 socialButtons">
      <div class="col-xs-4 col-sm-2">
        <a href="#" class="btn btn-lg btn-block btn-facebook">

          <span class="hidden-xs">Facebook</span>
        </a>
      </div>
      <div class="col-xs-4 col-sm-2">
        <a href="#" class="btn btn-lg btn-block btn-twitter">

          <span class="hidden-xs">Twitter</span>
        </a>
      </div>
      <div class="col-xs-4 col-sm-2">
        <a href="#" class="btn btn-lg btn-block btn-google">

          <span class="hidden-xs">Google+</span>
        </a>
      </div>
    </div>

    <div class="row row-sm-offset-3 loginOr">
      <div class="col-xs-12 col-sm-6">
        <hr class="hrOr">
        <span class="spanOr">or</span>
      </div>
    </div>

    <div class="row row-sm-offset-3">
      <div class="col-xs-12 col-sm-6">
        <form class="" action="<?php echo $base_url; ?>/account/authenticate" autocomplete="off" method="POST">
          <input type="hidden" name="_token" value="<?php echo $this->escape($_token); ?>" />
          <?php if (isset($errors) && count($errors) > 0): ?>
            <div class="alert alert-warning" role="alert">
              <?php echo $this->render('errors', array('errors' => $errors)); ?>
            </div>
            <?php endif; ?>
			<?php echo $this->render('account/inputs', array(
										'email_address' => $email_address, 'password' => $password,)); ?>

              <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>

        </form>
      </div>
    </div>
    <div class="row row-sm-offset-3">
      <div class="col-xs-12 col-sm-3">
          <a href="<?php echo $base_url; ?>/account/signup">新規登録</a>

      </div>
    </div>
  </div>



</div>
<script type="text/javascript">
</script>
</body>

</html>