<?php $this->setLayoutVar('title', $status['email_address']) ?>

<?php echo $this->render('status/status', array('status' => $status)); ?>
