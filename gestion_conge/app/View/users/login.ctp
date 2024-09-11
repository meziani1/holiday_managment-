<!-- app/View/Users/login.ctp -->
<div class="users login-container">
    <div class="login-box">
        <h2>Login</h2>
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'login'))); ?>
        <fieldset>
            <legend><?php echo __('Please enter your username and password'); ?></legend>
            <?php
                echo $this->Form->input('name', array('required' => true));
                echo $this->Form->input('password', array('required' => true));
            ?>
        </fieldset>
        <?php echo $this->Form->end(__('Login')); ?>
    </div>
</div>

<style>
    .login-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh; /* Full height */
        background-image: url('/img/images.jpeg'); /* Replace with your background image path */
        background-size: cover; /* Cover the entire viewport */
        background-position: center; /* Center the image */
        background-repeat: no-repeat; /* Prevent repeating the image */
    }
    .login-box {
        width: 300px; /* Smaller width */
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent white background */
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow for better look */
        text-align: center; /* Center the text */
    }
    .login-box h2 {
        margin-bottom: 20px;
        font-size: 24px;
        font-weight: bold;
    }
</style>
