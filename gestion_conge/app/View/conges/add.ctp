<div class="content-wrapper">
    <section class="content-header">
    
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Formulaire de Congé</h3>
                    </div>

                    <!-- Form Start -->
                    <div class="box-body">
                        <?php
                        echo $this->Form->create('Conge', array('class' => 'form-horizontal'));
                        ?>

                        <div class="form-group">
                            <?php
                            echo $this->Form->label('user_id', 'Nom', array('class' => 'col-sm-2 control-label'));
                            ?>
                            <div class="col-sm-10">
                                <?php
                                echo $this->Form->input('user_id', array(
                                    'type' => 'select',
                                    'options' => $users,
                                    'class' => 'form-control',
                                    'div' => false,
                                    'label' => false
                                ));
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php
                            echo $this->Form->label('nombreJours', 'Nombre de Jours', array('class' => 'col-sm-2 control-label'));
                            ?>
                            <div class="col-sm-10">
                                <?php
                                echo $this->Form->input('nombreJours', array(
                                    'class' => 'form-control',
                                    'div' => false,
                                    'label' => false
                                ));
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php
                            echo $this->Form->label('date_debut', 'Date Début', array('class' => 'col-sm-2 control-label'));
                            ?>
                            <div class="col-sm-10">
                                <?php
                                echo $this->Form->input('date_debut', array(
                                    'class' => 'form-control datepicker',
                                    'div' => false,
                                    'label' => false
                                ));
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php
                            echo $this->Form->label('date_fin', 'Date Fin', array('class' => 'col-sm-2 control-label'));
                            ?>
                            <div class="col-sm-10">
                                <?php
                                echo $this->Form->input('date_fin', array(
                                    'class' => 'form-control datepicker',
                                    'div' => false,
                                    'label' => false
                                ));
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php
                            echo $this->Form->label('numeroAutorisation', 'Numéro d\'Autorisation', array('class' => 'col-sm-2 control-label'));
                            ?>
                            <div class="col-sm-10">
                                <?php
                                echo $this->Form->input('numeroAutorisation', array(
                                    'class' => 'form-control',
                                    'div' => false,
                                    'label' => false
                                ));
                                ?>
                            </div>
                        </div>

                    </div>

                    <!-- Form End -->
                    <div class="box-footer">
                        <?php echo $this->Form->end(array('label' => 'Enregistrer le Congé', 'class' => 'btn btn-primary')); ?>
                        <?php echo $this->Html->link('Retour', array('action' => 'index'), array('class' => 'btn btn-default')); ?>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
