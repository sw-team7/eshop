<?php $this->load->view('templates/header'); ?>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php foreach ($comments as $comment):?>
          <div class="media">
            <img class="mr-3" src="" alt="image">
            <div class="media-body">
              <h5 class="mt-0"><?php echo $comment['username'] ?></h5>
              <small><?php echo $comment['created_at'] ?></small>
              <br>
              <?php echo $comment['comment'] ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php echo form_open('comments/save', 'post') ?> //It will be changed
        <div class="form-group">
          <?php
          echo form_label('Name', 'username');
          echo form_input('username', '', array('class' => 'form-control', 'placeholder' => 'Enter your Name'))
          ?>
        </div>
        <div class="form-group">
          <?php
          echo form_label('Comment', 'comment');
          echo form_textarea('comment', '', array('class' => 'form-control', 'placeholder' => 'Enter your review'))
          ?>
        </div>
        <?php echo form_submit('submit', 'Submit', array('class' => 'btn btn-primary')) ?>
        <?php echo form_close() ?>
      </div>
    </div>
  </div>
<?php $this->load->view('templates/footer'); ?>