<?php if(isset($message) && $message != ''){ ?>  
<div class="container" style="width:500px; height:200px; background-color: #FCFCFC">

    <div class="alert alert-success" style="margin:50px auto; padding-left: 25%; "><br/>
        <?php echo $message; ?><br/><br/>
    </div>
</div>
<?php }
?>

<div class="subnav" style="margin-bottom: 10px;">
   <ul class="nav nav-pills">
      <li <? if(is_active()): ?>class="active"<? endif; ?>><a href="<?= site_url() ?>">Home</a></li>
      <li><a href="<?= site_url().'auth/login' ?>">Loguearse</a></li>
      <li><a href="<?= site_url().'auth/logout' ?>">Despedirse</a></li>
      <?php if($user = $this->session->userdata('username')){?>
      <li class="dropdown">
         <a class="dropdown-toggle" data-toggle="dropdown">Perfil <b class="caret"></b></a>
         <ul class="dropdown-menu">
               <li><a href="<?= site_url()."auth/change/email"?>">Cambiar email</a></li>
               <li><a href="<?= site_url()."auth/change/pass"?>">Cambiar contraseña</a></li>
         </ul>
      </li> 
       
      <?php }?>
      <ul class="nav nav-pills pull-right">
        <?php if($user = $this->session->userdata('username')){?>
        <li><a>Hola <? echo $user; ?></a></li>
        <? }?>
       <?php if($this->session->userdata('admin') == 1){?>
        <li><a>ADMIN</a></li>
        <? }?>
      <?php if($this->session->userdata('admin') == 1){?>
        <li><a href="<?= site_url()."books/admin/list" ?>">Ver libros</a></li>
        <? }?>
      <?php if($this->session->userdata('admin') == 1){?>
        <li><a href="<?= site_url()."books/create" ?>">Crear libro</a></li>
        <? }?>
   
        <li><a href="<?= site_url()."cart/view" ?>">Ver mi carrito</a></li>
      </ul>
   </ul>
</div>
 <!---print_r($this->session->all_userdata());--->
      

