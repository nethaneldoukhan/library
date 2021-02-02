<?php  if (count($errorsDelete) > 0) : ?>
  <div class="error">
  	<?php foreach ($errorsDelete as $error) : ?>
  	  <p class="ta-c"><?php echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>

<?php if($messageDelete) : ?>
  <div class="success <?php echo $messageDelete["class"] ?>">
        <p><?php echo $messageDelete["text"] ?></p>
    </div>
<?php endif ?>