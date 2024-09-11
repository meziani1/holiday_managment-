<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Détails de l'Utilisateur</h3>
    </div>
    
    <!-- /.box-header -->
    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                <dl class="dl-horizontal">
                    <dt>Nom:</dt>
                    <dd><?php echo h($conge['User']['name']); ?></dd>
                </dl>
            </div>
        </div>

        <!-- Liste des Congés -->
        <h4>Liste des Congés</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre Jours</th>
                    <th>Date Debut</th>
                    <th>Date Fin</th>
                    <th>Autorisation</th>
                    <th class="print-hide">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($conges as $c): ?>
                    <tr>
                        <td><?php echo h($c['Conge']['nombreJours']); ?></td>
                        <td><?php echo h($c['Conge']['date_debut']); ?></td>
                        <td><?php echo h($c['Conge']['date_fin']); ?></td>
                        <td><?php echo h($c['Conge']['numeroAutorisation']); ?></td>
                        <td class="print-hide">
                                                <?php echo $this->Html->link('View', array('action' => 'viewLast', $c['Conge']['id']), array('class' => 'btn btn-xs btn-primary')); ?>
                                            </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- /.box-body -->
    <div class="box-footer">
        <?php echo $this->Html->link('Retour', array('action' => 'index'), array('class' => 'btn btn-default')); ?>
    </div>
    <!-- /.box-footer -->
</div>
