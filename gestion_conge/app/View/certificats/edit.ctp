<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Modifier le Certificat</h3>
    </div>
    <!-- /.box-header -->

    <div class="box-body">
        <?php
        echo $this->Form->create('Certificat', array('class' => 'form-horizontal'));
        ?>

        <div class="form-group">
            <?php
            echo $this->Form->label('user_id', 'User', array('class' => 'col-sm-2 control-label'));
            ?>
            <div class="col-sm-10">
                <?php
                echo $this->Form->input('user_id', array(
                    'type' => 'select',
                    'options' => $users,
                    'class' => 'form-control',
                    'label' => false
                ));
                ?>
            </div>
        </div>

        <div class="form-group">
            <?php
            echo $this->Form->label('nombreJours', 'Nombre Jours', array('class' => 'col-sm-2 control-label'));
            ?>
            <div class="col-sm-10">
                <?php
                echo $this->Form->input('nombreJours', array('class' => 'form-control', 'label' => false));
                ?>
            </div>
        </div>

        <div class="form-group">
            <?php
            echo $this->Form->label('date_debut', 'Date Debut', array('class' => 'col-sm-2 control-label'));
            ?>
            <div class="col-sm-10">
                <?php
                echo $this->Form->input('date_debut', array('class' => 'form-control', 'label' => false));
                ?>
            </div>
        </div>

        <div class="form-group">
            <?php
            echo $this->Form->label('date_fin', 'Date Fin', array('class' => 'col-sm-2 control-label'));
            ?>
            <div class="col-sm-10">
                <?php
                echo $this->Form->input('date_fin', array('class' => 'form-control', 'label' => false));
                ?>
            </div>
        </div>

        <div class="form-group">
            <?php
            echo $this->Form->label('numeroCertificat', 'Numero Certificat', array('class' => 'col-sm-2 control-label'));
            ?>
            <div class="col-sm-10">
                <?php
                echo $this->Form->input('numeroCertificat', array('class' => 'form-control', 'label' => false));
                ?>
            </div>
        </div>
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
        <?php
        echo $this->Form->end(array('label' => 'Modifier le certificat', 'class' => 'btn btn-primary'));
        ?>
        <?php
        echo $this->Html->link('Retour', array('action' => 'index'), array('class' => 'btn btn-default'));
        ?>
    </div>
    <!-- /.box-footer -->
</div>
