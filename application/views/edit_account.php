<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <div class="page_link">
                    <a>Home</a>
                    <a>My account</a>
                    <a>Edit</a>
                </div>
                <h2>Edit account</h2>
            </div>
        </div>
    </div>
</section>
<section class="contact_area p_120">
    <div class="container">
	    <?php if(isset($error)): ?>
	        <p><?= $error; ?></p>
	    <?php endif; ?>
	    <?php if($this->session->flashdata('success') != ''):?>
	        <div class="alert alert-success" role="alert">
	            <?= $this->session->flashdata('success'); ?>
	        </div>
	    <?php endif ?>
	    <?php if($this->session->flashdata('error') != ''):?>
	        <div class="alert alert-danger" role="alert">
	            <?= $this->session->flashdata('error'); ?>
	        </div>
	    <?php endif ?>
        <form class="register-form contact_form" action="<?=base_url()?>edit_account/save/<?= isset($id) ? $id : '' ?>" method="post" id="contactForm" novalidate="novalidate">
            <div class="form-group">
                <input value="<?= isset($user['name']) ? $user['name'] : ''; ?>" type="text" name="name" placeholder="Name *" required class="single-input form-control">
            </div>
            <div class="form-group">
                <input value="<?= isset($user['username']) ? $user['username'] : ''; ?>" type="text" name="username" placeholder="Username *" required class="single-input form-control">
            </div>
            <div class="form-group">
                <input value="<?= isset($user['email']) ? $user['email'] : ''; ?>" type="text" name="email" placeholder="Email *" required class="single-input form-control">
            </div>
            <div class="form-group">
                <input value="<?= isset($user['affiliation']) ? $user['affiliation'] : ''; ?>" type="text" name="affiliation" placeholder="Affiliation*" required class="single-input form-control">
            </div>
            <div class="form-group">
                <input value="<?= isset($user['webpage']) ? $user['webpage'] : ''; ?>" type="text" name="webpage" placeholder="Webpage*" required class="single-input form-control">
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" class="single-input form-control">
            </div>
            
            <button type="submit" value="submit" class="btn submit_btn">Submit</button>
        </form>
    </div>
</section>
