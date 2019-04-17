<div class="container-login">
<h1>nibiru<span class="logo_meeting">CRM</span></h1>
<h2>Never miss a lead</h2>
<?php echo $this->Session->flash(); ?>
<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User' , array('url' => array('controller' => 'users', 'action' => 'login'))); ?>
        <div class="form-group">
            <?php echo $this->Form->input('email',array('type'=>'text','class'=>'form-control','div'=>false,'label'=>false,'placeholder'=>'Email/Username'));?>
            
        </div>
        <div class="form-group">
          <?php echo $this->Form->input('password',array('class'=>'form-control','div'=>false,'label'=>false,'placeholder'=>'Password')); ?>
          
        </div>
        
           
        <?php 
          $options = array(
            'label' => 'Login',
            'class' => 'btn btn-primary',
        );
        ?>
    <?php echo $this->Form->end($options); ?>
   </div>
  
</div>

<div class="login_deatil">
  <div class="container-image-bottom">

</div>
</div>