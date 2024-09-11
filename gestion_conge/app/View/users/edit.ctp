<section class="content-header">
    <h1><?php echo __('Modifier les informations de l\'employé'); ?></h1>
</section>

<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo __('Formulaire d\'édition'); ?></h3>
        </div>
        <div class="box-body">
            <?php echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'edit', $user['User']['id']), 'class' => 'form-horizontal')); ?>
            
            <!-- Form Group for Name -->
            <div class="form-group">
                <?php echo $this->Form->label('name', __('Nom'), array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10">
                    <?php echo $this->Form->input('name', array('class' => 'form-control', 'label' => false)); ?>
                </div>
            </div>

            <!-- Form Group for Immatriculation -->
            <div class="form-group">
                <?php echo $this->Form->label('Immatriculation', __('Immatriculation'), array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10">
                    <?php echo $this->Form->input('Immatriculation', array('class' => 'form-control', 'label' => false)); ?>
                </div>
            </div>

            <!-- Form Group for Affectation -->
            <div class="form-group">
                <?php echo $this->Form->label('affectation', __('Affectation'), array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10">
                    <?php echo $this->Form->input('affectation', array('class' => 'form-control', 'label' => false)); ?>
                </div>
            </div>

            <!-- Form Group for Role -->
            <div class="form-group">
                <?php echo $this->Form->label('role', __('Rôle'), array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10">
                    <?php 
                    // Define role options
                    $roleOptions = array(
                        1 => 'Admin',
                        2 => 'User',
                        3 => 'Manager'
                    );
                    echo $this->Form->input('role', array(
                        'type' => 'select', 
                        'options' => $roleOptions, 
                        'class' => 'form-control', 
                        'label' => false,
                        'default' => $user['User']['role'] // Ensures the current role is selected
                    )); 
                    ?>
                </div>
            </div>

            <!-- Hidden Field for ID -->
            <?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
            
            <!-- Form Actions -->
            <div class="box-footer">
                <?php echo $this->Form->button(__('Modifier les informations de l\'employé'), array('class' => 'btn btn-primary')); ?>
            </div>
            
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</section>
