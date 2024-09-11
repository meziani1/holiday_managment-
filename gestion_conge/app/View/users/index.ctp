<section class="content-header">
    <h1><?php echo __('Consultations des employés'); ?></h1>
</section>

<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo __('Liste des employés'); ?></h3>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th><?php echo __('ID'); ?></th>
                        <th><?php echo __('Nom'); ?></th>
                        <th><?php echo __('Immatriculation'); ?></th>
                        <th><?php echo __('Affectation'); ?></th>
                        <th><?php echo __('Actions'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><?php echo h($user['User']['id']); ?></td>
                            <td>
                                <?php echo $this->Html->link(
                                    h($user['User']['name']),
                                    array('controller' => 'users', 'action' => 'view', $user['User']['id']),
                                    array('class' => 'btn btn-link')
                                ); ?>
                            </td>
                            <td><?php echo h($user['User']['Immatriculation']); ?></td>
                            <td><?php echo h($user['User']['affectation']); ?></td>
                            <td class="print-hide">
                                        <?php echo $this->Html->link('View', array('action' => 'view', $user['User']['id']), array('class' => 'btn btn-xs btn-primary')); ?>
                                        <?php echo $this->Html->link('Edit', array('action' => 'edit', $user['User']['id']), array('class' => 'btn btn-xs btn-warning')); ?>
                                        <?php echo $this->Form->postLink('Delete', array('action' => 'delete', $user['User']['id']), array('class' => 'btn btn-danger btn-xs'), __('Are you sure?')); ?>
                                    </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

              <!-- Pagination and Other Elements -->
              <div class="row no-print">
                <div class="col-sm-5">
                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite"></div>
                </div>
                <div class="col-sm-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                        <ul class="pagination">
                            <li class="paginate_button previous disabled" id="example1_previous">
                                <?php echo $this->Paginator->prev('Previous', null, null, array('class' => 'disabled')); ?>
                            </li>
                            <li class="paginate_button active">
                                <a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0">1</a>
                            </li>
                            <li class="paginate_button next" id="example1_next">
                                <?php echo $this->Paginator->next('Next', null, null, array('class' => 'disabled')); ?> 
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="box-footer">
            <div class="btn-group">
                <?php echo $this->Html->link(
                    __('Ajouter un employé'),
                    array('controller' => 'users', 'action' => 'add'),
                    array('class' => 'btn btn-success')
                ); ?>
                <?php echo $this->Html->link(
                    __('Retour'),
                    array('controller' => 'conges', 'action' => 'home'),
                    array('class' => 'btn btn-default')
                ); ?>
            </div>
        </div>
    </div>
</section>
