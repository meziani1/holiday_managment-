<!DOCTYPE html>
<html>

<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        <?php echo $title_for_layout; ?>
    </title>
    <?php
    echo $this->Html->meta('icon');
    echo $this->Html->css(array(
        '/bootstrap/css/bootstrap.min',
        '/dist/css/AdminLTE.min',
        '/dist/css/skins/_all-skins.min'
    ));
    echo $this->Html->script(array(
        '/plugins/jQuery/jQuery-2.1.4.min.js',
        '/bootstrap/js/bootstrap.min.js',
        '/dist/js/app.min.js'
    ));
    ?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <!-- Main Header -->
        <header class="main-header">
            <!-- Logo -->
            <a href="#" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>A</b>LT</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Gestion</b>CONGES</span>
            </a>
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                       
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <?php echo $this->Html->image('dist/img/user.jpg', ['class' => 'img-circle']); ?>
                                <span class="hidden-xs"> <?php echo h($authUser['name']); ?> </span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="dist/img/user.jpg" class="img-circle" >
                                    <p>
                                    <?php echo h($authUser['name']); ?>
                                        <small>Member since <?php echo h($authUser['created']); ?></small>
                                    </p>
                                </li>
                              
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'view',$authUser['id'])); ?>" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'logout')); ?>" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li>
                    </ul>
                </div>


            </nav>
        </header>

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?php echo $this->Html->url('/dist/img/user.jpg'); ?>" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?php echo h($authUser['name']); ?></p>
                        <!-- Status -->
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>

                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="treeview">
                        <a href="<?php echo $this->Html->url(array('controller' => 'conges', 'action' => 'home')); ?>">
                            <i class=" fa fa-dashboard"> </i> <span>Dashboard</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                    </li>
                    <li class="treeview active">
                        <a href="#">
                            <i class="fa fa-edit"></i> <span>CONGES</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu menu-open" style="display: block;">
                            <li> <?php echo $this->Html->link('Afficher les conges ', array('controller' => 'conges', 'action' => 'index'), array('class' => 'button')); ?></li>
                            <li> <?php echo $this->Html->link('Ajouter un conge ', array('controller' => 'conges', 'action' => 'add'), array('class' => 'button')); ?></li>
                        </ul>
                    </li>
                    <li class="treeview active">
                        <a href="#">
                            <i class="fa fa-edit"></i> <span>CERTIFICATS MEDICAUX</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu menu-open" style="display: block;">
                            <li> <?php echo $this->Html->link('Afficher les certificats ', array('controller' => 'certificats', 'action' => 'index'), array('class' => 'button')); ?></li>
                            <li> <?php echo $this->Html->link('Ajouter un certificat medical ', array('controller' => 'certificats', 'action' => 'add'), array('class' => 'button')); ?></li>
                        </ul>
                    </li>
                    <!-- Add more menu items here -->
                    <?php if ($this->Session->read('Auth.User.role') === 'Admin'): ?>
                    <li class="treeview active">
                        <a href="#">
                            <i class="fa fa-edit"></i> <span>Gestions des comptes</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu menu-open" style="display: block;">
                            <li> <?php echo $this->Html->link('Afficher les utilisateurs ', array('controller' => 'users', 'action' => 'index'), array('class' => 'button')); ?></li>
                            <li> <?php echo $this->Html->link('Ajouter un utilisateur ', array('controller' => 'users', 'action' => 'add'), array('class' => 'button')); ?></li>
                        </ul>
                    </li>
                    <?php endif; ?>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    <?php echo $title_for_layout; ?>
                    <small><?php echo $this->fetch('subtitle'); ?></small>
                </h1>
                <?php echo $this->element('breadcrumb'); ?>
            </section>

            <!-- Main content -->
            <section class="content">
                <?php echo $this->fetch('content'); ?>
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="pull-right hidden-xs">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2024 <a href="#">Company</a>.</strong> All rights reserved.
        </footer>
    </div><!-- ./wrapper -->
</body>

</html>