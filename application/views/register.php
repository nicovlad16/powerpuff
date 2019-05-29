<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <div class="page_link">
                    <a>Home</a>
                    <a>Register</a>
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

        <form class="register-form contact_form" action="<?=base_url()?>register/check" method="post" id="contactForm" novalidate="novalidate">
            <div class="form-group">
                <input type="text" name="name" placeholder="Name *" required class="single-input form-control">
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="Email *" required class="single-input form-control">
            </div>
            <div class="form-group">
                <input type="text" name="affiliation" placeholder="Affiliation" class="single-input form-control">
            </div>
            <div class="form-group">
                <input type="text" name="webpage" placeholder="Webpage" class="single-input form-control">
            </div>
            <div class="form-group">
                <input type="text" name="username" placeholder="Username *" required class="single-input form-control">
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password *" required class="single-input form-control">
            </div>
            <div class="form-group">
            	<label> Chair
                	<input type="radio" name="role" required value="1">
	            </label>
            </div>
            <div class="form-group">
            	<label> Co-chair
                	<input type="radio" name="role" required value="2">
	            </label>
            </div>
            <div class="form-group">
            	<label> Committee
                	<input type="radio" name="role" required value="3">
	            </label>
            </div>
            <button type="submit" value="submit" class="btn submit_btn">Submit</button>
        </form>
    </div>
</section>
