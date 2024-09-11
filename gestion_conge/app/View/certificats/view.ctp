<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Détails de l'Utilisateur</h3>
    </div>

    <!-- /.box-header -->
    <div class="box-body">
        <dl class="dl-horizontal">
            <dt>Nom:</dt>
            <dd><?php echo h($certificat['User']['name']); ?></dd>
        </dl>

        <!-- Liste des Certificats -->
        <h4>Liste des Certificats Médicaux</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre de jours</th>
                    <th>Date Début</th>
                    <th>Date Fin</th>
                    <th class="print-hide">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($certificats as $c): ?>
                    <tr>
                        <td><?php echo h($c['Certificat']['nombreJours']); ?></td>
                        <td><?php echo h($c['Certificat']['date_debut']); ?></td>
                        <td><?php echo h($c['Certificat']['date_fin']); ?></td>
                        <td class="print-hide">
                         <?php echo $this->Html->link('View', array('action' => 'viewLast', $c['Certificat']['id']), array('class' => 'btn btn-xs btn-primary')); ?>
                         </td>  
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- /.box-body -->
    <div class="box-footer">
        <div class="btn-group">
            <?php echo $this->Html->link('Retour', array('action' => 'index'), array('class' => 'btn btn-default')); ?>
        </div>
    </div>
    <!-- /.box-footer -->
</div>
