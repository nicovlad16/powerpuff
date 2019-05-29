<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <div class="page_link">
                    <a>Home</a>
                    <a>Submitter</a>
                    <a>Submit</a>
                </div>
                <h2><?= isset($id) ? 'Edit paper' : 'Submit paper' ?></h2>
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
        <form class="register-form contact_form" action="<?=base_url()?>submitter/save/<?= isset($id) ? $id : '' ?>" method="post" id="contactForm" novalidate="novalidate" enctype="multipart/form-data">
            <div class="form-group">
                <input value="<?= isset($paper['title']) ? $paper['title'] : ''; ?>" type="text" name="title" placeholder="Name of the proposal *" required class="single-input form-control">
            </div>
            <div class="form-group">
                <input value="<?= isset($paper['keywords']) ? $paper['keywords'] : ''; ?>" type="text" name="keywords" placeholder="Keywords *" required class="single-input form-control">
            </div>
            <div class="form-group">
                <input value="<?= isset($paper['topics']) ? $paper['topics'] : ''; ?>" type="text" name="topics" placeholder="Topics *" required class="single-input form-control">
            </div>
            <div class="form-group">
                <input value="<?= isset($paper['meta_info']) ? $paper['meta_info'] : ''; ?>" type="text" name="meta_info" placeholder="Meta info *" required class="single-input form-control">
            </div>
            <div class="form-group">
                <textarea type="text" name="abstract" placeholder="Abstract *" required class="single-input form-control"><?= isset($paper['abstract']) ? $paper['abstract'] : ''; ?></textarea>
            </div>
            <div class="form-group">
                <textarea type="text" name="paper" placeholder="Paper " required class="single-input form-control"><?= isset($paper['paper']) ? $paper['paper'] : ''; ?></textarea>
            </div>
            <?= isset($paper['file']) ? 'File in db: '.$paper['file'] : '' ?>
            <div class="form-group">
                <input type="file" name="pdf" id="pdf">
            </div>

            <input type="hidden" name="conference_id" value="<?=$id_conference?>">
            <button type="submit" value="submit" class="btn submit_btn"><?= isset($id) ? 'Edit paper' : 'Submit paper' ?></button>
        </form>
    </div>
</section>
