<?php  if (count($errorsAdd) > 0) : ?>
  <div class="error">
  	<?php foreach ($errorsAdd as $error) : ?>
  	  <p class="ta-c"><?php echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>

<?php if($messageAdd) : ?>
    <div class="success <?php echo $messageAdd["class"] ?>">
        <p><?php echo $messageAdd["text"] ?></p>
    </div>
<?php endif ?>