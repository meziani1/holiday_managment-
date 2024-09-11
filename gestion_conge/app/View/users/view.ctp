<section class="content-header">
    <h1><?php echo __('Détails de l\'employé'); ?></h1>
</section>

<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo h($user["User"]["name"]); ?></h3>
        </div>
        <!-- /.box-header -->

        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <dl class="dl-horizontal">
                        <dt><?php echo __('Nom'); ?>:</dt>
                        <dd><?php echo h($user["User"]["name"]); ?></dd>

                        <dt><?php echo __('Immatriculation'); ?>:</dt>
                        <dd><?php echo h($user["User"]["Immatriculation"]); ?></dd>

                        <dt><?php echo __('Créé le'); ?>:</dt>
                        <dd><?php echo h($user["User"]["created"]); ?></dd>

                        <dt><?php echo __('Dernière modification'); ?>:</dt>
                        <dd><?php echo h($user["User"]["modified"]); ?></dd>
                    </dl>
                </div>
            </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            <!-- Button Group -->
            <?php echo $this->Html->link(
                __('Retour'),
                array('action' => 'index'),
                array('class' => 'btn btn-default')
            ); ?>
            <?php echo $this->Html->link(
                __('Edit'),
                array('controller' => 'users', 'action' => 'edit', $user["User"]["id"]),
                array('class' => 'btn btn-primary')
            ); ?>
            <?php echo $this->Html->link(
                __('Delete'),
                array('controller' => 'users', 'action' => 'delete', $user["User"]["id"]),
                array(
                    'class' => 'btn btn-danger',
                    'confirm' => __('Are you sure you want to delete this user?'),
                    'escape' => false
                )
            ); ?>
        </div>
        <!-- /.box-footer -->
    </div>
</section>
