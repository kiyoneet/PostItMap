<link rel="stylesheet" type="text/css" href="<?php echo  $base_url; ?>/lib/account.css" media="all">

<div class="container">
  <div class="login">
    <h2 class="authTitle">新規登録</h2>
    <div class="row row-sm-offset-3">
      <div class="col-xs-12 col-sm-6">
        <form class="" action="<?php echo $base_url; ?>/account/register" autocomplete="off" method="POST">
          <input type="hidden" name="_token" value="<?php echo $this->escape($_token); ?>" />
          <?php if (isset($errors) && count($errors) > 0): ?>
            <div class="alert alert-warning" role="alert">
              <?php echo $this->render('errors', array('errors' => $errors)); ?>
            </div>
            <?php endif; ?>
              <?php echo $this->render('account/inputs', array(
                                        'email_address' => $email_address,
                                        'password' => $password,)); ?>

                <button class="btn btn-lg btn-primary btn-block" type="submit">新規登録</button>
        </form>
      </div>
    </div>
  </div>



</div>