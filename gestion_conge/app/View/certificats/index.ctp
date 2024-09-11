<div class="box">
    <div class="box-header">
        <h3  id="printableArea" class="box-title">Consultation des certificats</h3>
    </div><!-- /.box-header -->


    <div class="box-body">
        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <!-- Search Form -->
            <div class="row no-print">
                <div class="col-sm-6">
                    <div class="dataTables_length" id="example1_length">

                        <?php echo $this->Form->create('Certificat', array('type' => 'get', 'class' => 'form-inline')); ?>
                      
                            <?php echo $this->Form->label('search_immatriculation', 'Immatriculation de l\'Employé', array('class' => 'control-label')); ?>
                            <?php echo $this->Form->input('search_immatriculation', array(
                                'type' => 'text',
                                'value' => $this->request->query('search_immatriculation'),
                                'class' => 'form-control',
                                'div' => false,
                                'label' => false
                            )); ?>
                        <?php echo $this->Form->button(__('Rechercher'), array('class' => 'btn btn-info')); ?>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
            </div>
            <!-- Search Form End -->

            <!-- Table with Print Button -->
            <div id="printableArea">

                <?php if (empty($certificats)): ?>
                    <p><?php echo __('Aucun certificat trouvé pour ce matricule.'); ?></p>
                <?php else: ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                <thead>
                                    <thead>
                                        <tr role="row">
                                            <th>Nom</th>
                                            <th>Nombre de jours</th>
                                            <th>Date Début</th>
                                            <th>Date Fin</th>
                                            <th>Jours Restants </th>
                                            <th class="print-hide">Actions</th>
                                        </tr>
                                    </thead>
                                <tbody>
                                    <?php foreach ($certificats as $certificat): ?>
                                        <tr role="row" class="odd">
                                            <td><?php echo h($certificat['User']['name']); ?></td>
                                            <td><?php echo h($certificat['Certificat']['nombreJours']); ?></td>
                                            <td><?php echo h($certificat['Certificat']['date_debut']); ?></td>
                                            <td><?php echo h($certificat['Certificat']['date_fin']); ?></td>
                                            <td><?php echo h($certificat['Certificat']['days_remaining']) . ' jours restants'; ?></td>

                                            <td class="print-hide">
                                                <?php echo $this->Html->link('View', array('action' => 'view', $certificat['Certificat']['id']), array('class' => 'btn btn-xs btn-primary')); ?>
                                                <?php echo $this->Html->link('Edit', array('action' => 'edit', $certificat['Certificat']['id']), array('class' => 'btn btn-xs btn-warning')); ?>
                                                <?php echo $this->Form->postLink('Delete', array('action' => 'delete', $certificat['Certificat']['id']), array('class' => 'btn btn-danger btn-xs'), __('Are you sure?')); ?>
                                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                               
                <?php endif; ?>
            </div>
            <!-- Printable Area End -->
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


            <!-- Action Buttons Start -->
            <div class="box-footer">
                <?php echo $this->Html->link('Ajouter un nouveau certificat', array('action' => 'add'), array('class' => 'btn btn-success')); ?>
                <button onclick="printTable()" class="btn btn-info">Imprimer la Liste</button>
                <?php echo $this->Html->link('Retour', array('controller' => 'conges', 'action' => 'home'), array('class' => 'btn btn-default')); ?>
            </div>
            <!-- Action Buttons End -->

        </div>
    </div>
</div>
</section>
</div>

<!-- Print Styles -->
<style>
    @media print {
        body * {
            visibility: hidden;
        }

        #printableArea,
        #printableArea * {
            visibility: visible;
        }

        #printableArea {
            position: static;
            /* Change from absolute to static to avoid clipping */
            top: 0;
            left: 0;
            width: 100%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        table th {
            background-color: #f2f2f2;
        }

        /* Hide the Actions column during printing */
        @media print {
            .print-hide {
                display: none;
            }
        }

        /* Optional: Handle page breaks */
        @page {
            size: auto;
            /* auto is the initial value */
            margin: 1cm;
            /* margin around the page */
        }

        .page-break {
            page-break-before: always;
        }
    }
</style>

<!-- Print Script -->
<script>
    function printTable() {
        window.print();
    }
</script>