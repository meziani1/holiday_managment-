<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Details du Congé</h3>
    </div>
    
    <!-- /.box-header -->
    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                <dl class="dl-horizontal">
                    <dt>Nom:</dt>
                    <dd><?php echo h($conge['User']['name']); ?></dd>

                    <dt>Nombre Jours:</dt>
                    <dd><?php echo h($conge['Conge']['nombreJours']); ?></dd>

                    <dt>Date Debut:</dt>
                    <dd><?php echo h($conge['Conge']['date_debut']); ?></dd>

                    <dt>Date Fin:</dt>
                    <dd><?php echo h($conge['Conge']['date_fin']); ?></dd>

                    <dt>Autorisation:</dt>
                    <dd><?php echo h($conge['Conge']['numeroAutorisation']); ?></dd>
                </dl>
            </div>
        </div>
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
        <?php echo $this->Html->link('Modifier', array('action' => 'edit', $conge['Conge']['id']), array('class' => 'btn btn-primary')); ?>
        <?php echo $this->Form->postLink('Supprimer', array('action' => 'delete', $conge['Conge']['id']), array('class' => 'btn btn-danger'), __('Are you sure?')); ?>
        <?php echo $this->Html->link('Retour', array('action' => 'index'), array('class' => 'btn btn-default')); ?>
    </div>
    <!-- /.box-footer -->
</div>
