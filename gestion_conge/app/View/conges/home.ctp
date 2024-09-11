<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?php echo h($userCount); ?></h3>
                <p>Nombre des employés</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
              
            </div> 
            <?php if ($this->Session->read('Auth.User.role') === 'Admin'): ?>
            <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'index')); ?>"
                class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
            <?php endif; ?>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3><?php echo h($congesCount); ?><sup style="font-size: 20px"></sup></h3>
                <p>Employes en Conges </p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <?php if ($this->Session->read('Auth.User.role') === 'Admin'): ?>
            <a href="<?php echo $this->Html->url(array('controller' => 'conges', 'action' => 'index')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            <?php endif; ?>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3> <?php echo h($certificatsCount); ?> </h3>
                <p>Certificats medicaux</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <?php if ($this->Session->read('Auth.User.role') === 'Admin'): ?>
            <a href="<?php echo $this->Html->url(array('controller' => 'certificats', 'action' => 'index')); ?>" class="small-box-footer">More info
                 <i class="fa fa-arrow-circle-right"></i>
                </a>
                <?php endif; ?>
        </div>
    </div><!-- ./col -->
   
</div>