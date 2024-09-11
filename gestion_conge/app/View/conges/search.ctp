<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Resultat de recherche</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="table-responsive">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Nombre de jours</th>
                        <th>Date Debut</th>
                        <th>Date Fin</th>
                        <th>Numero Autorisation</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($conges as $conge): ?>
                        <tr>
                            <td><?php echo h($conge['User']['name']); ?></td>
                            <td><?php echo h($conge['Conge']['nombreJours']); ?></td>
                            <td><?php echo h($conge['Conge']['date_debut']); ?></td>
                            <td><?php echo h($conge['Conge']['date_fin']); ?></td>
                            <td><?php echo h($conge['Conge']['numeroAutorisation']); ?></td>
                            <td>
                                <?php echo $this->Html->link('View', array('action' => 'view', $conge['Conge']['id']), array('class' => 'btn btn-primary btn-xs')); ?>
                                <?php echo $this->Html->link('Edit', array('action' => 'edit', $conge['Conge']['id']), array('class' => 'btn btn-warning btn-xs')); ?>
                                <?php echo $this->Form->postLink('Delete', array('action' => 'delete', $conge['Conge']['id']), array('class' => 'btn btn-danger btn-xs'), __('Are you sure?')); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- /.table-responsive -->

        <div class="row">
            <div class="col-sm-5">
                <div class="dataTables_info" id="example2_info" role="status" aria-live="polite"></div>
            </div>
        </div>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
