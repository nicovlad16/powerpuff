<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <div class="page_link">
                    <a>Home</a>
                    <a>Conferences</a>
                    <a><?= isset($id) ? 'Edit' : 'Add' ?></a>
                </div>
                <h2><?= isset($id) ? 'Edit conference' : 'Add conference' ?></h2>
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
        <form class="register-form contact_form" action="<?=base_url()?>conferences/save/<?= isset($id) ? $id : '' ?>" method="post" id="contactForm" novalidate="novalidate">
            <div class="form-group">
                <input value="<?= isset($conf['name']) ? $conf['name'] : ''; ?>" type="text" name="name" placeholder="Name *" required class="single-input form-control">
            </div>
            <div class="form-group">
                <input value="<?= isset($conf['date_start']) ? $conf['date_start'] : ''; ?>" type="text" name="date_start" placeholder="Date start *" required class="single-input form-control">
            </div>
            <div class="form-group">
                <input value="<?= isset($conf['date_end']) ? $conf['date_end'] : ''; ?>" type="text" name="date_end" placeholder="Date end *" required class="single-input form-control">
            </div>
            <div class="form-group">
                <input value="<?= isset($conf['location']) ? $conf['location'] : ''; ?>" type="text" name="location" placeholder="Location *" required class="single-input form-control">
            </div>
            <div class="form-group">
                <input value="<?= isset($conf['abstract_deadline']) ? $conf['abstract_deadline'] : ''; ?>" type="text" name="abstract_deadline" placeholder="Abstract deadline *" required class="single-input form-control">
            </div>
            <div class="form-group">
                <input value="<?= isset($conf['paper_deadline']) ? $conf['paper_deadline'] : ''; ?>" type="text" name="paper_deadline" placeholder="Paper deadline" required class="single-input form-control">
            </div>
            
            <button type="submit" value="submit" class="btn submit_btn">Submit</button>
        </form>
    </div>
</section>
