<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <div class="page_link">
                    <a href="index.html">Home</a>
                    <a href="contact.html">Register</a>
                </div>
                <h2>Register PC member</h2>
            </div>
        </div>
    </div>
</section>
<section class="contact_area p_120">
    <div class="container">
    <?php if(isset($error)): ?>
                <p><?= $error; ?></p>
            <?php endif; ?>

            <?php if($this->session->flashdata('success_logout') != ''):?>
                <div class="alert alert-warning" role="alert">
                    <?= $this->session->flashdata('success_logout'); ?>
                </div>
            <?php endif ?>

            <?php if($this->session->flashdata('error_pass') != ''):?>
                <div class="alert alert-danger" role="alert">
                    <?= $this->session->flashdata('error_pass'); ?>
                </div>
            <?php endif ?>

            <?php if($this->session->flashdata('error_status') != ''):?>
                <div class="alert alert-danger" role="alert">
                    <?= $this->session->flashdata('error_status'); ?>
                </div>
            <?php endif ?>

            <?php if($this->session->flashdata('error_email') != ''):?>
                <div class="alert alert-danger" role="alert">
                    <?= $this->session->flashdata('error_email'); ?>
                </div>
            <?php endif ?>

            <?php if($this->session->flashdata('error_date') != ''):?>
                <div class="alert alert-danger" role="alert">
                    <?= $this->session->flashdata('error_date'); ?>
                </div>
            <?php endif ?>
        <div class="row">
                <form class="row contact_form" action="<?=base_url()?>login/check" method="post" id="contactForm" novalidate="novalidate">
                    <div class="col-md-offset-4 col-md-8">
                        <div class="form-group">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" value="submit" class="btn submit_btn">Login</button>
                    </div>
                </form>
        </div>
    </div>
</section>