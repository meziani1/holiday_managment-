<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Details du Certificat</h3>
    </div>
    <!-- /.box-header -->

    <div class="box-body">
        <dl class="dl-horizontal">
            <dt>Nom:</dt>
            <dd><?php echo h($certificat['User']['name']); ?></dd>

            <dt>Nombre de jours octroyé par le médecin:</dt>
            <dd><?php echo h($certificat['Certificat']['nombreJours']); ?></dd>

            <dt>Date Debut:</dt>
            <dd><?php echo h($certificat['Certificat']['date_debut']); ?></dd>

            <dt>Date Fin:</dt>
            <dd><?php echo h($certificat['Certificat']['date_fin']); ?></dd>
        </dl>
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
        <div class="btn-group">
            <?php echo $this->Html->link('Modifier', array('action' => 'edit', $certificat['Certificat']['id']), array('class' => 'btn btn-primary')); ?>
            <?php echo $this->Form->postLink('Supprimer', array('action' => 'delete', $certificat['Certificat']['id']), array('class' => 'btn btn-danger'), __('Are you sure?')); ?>
            <?php echo $this->Html->link('Retour', array('action' => 'index'), array('class' => 'btn btn-default')); ?>
        </div>
    </div>
    <!-- /.box-footer -->
</div>
