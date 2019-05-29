<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <div class="page_link">
                    <a>Home</a>
                    <a>Conferences</a>
                    <a>Sections</a>
                    <a><?= isset($id) ? 'Edit' : 'Add' ?></a>
                </div>
                <h2><?= isset($id) ? 'Edit section' : 'Add section' ?></h2>
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
        <form class="register-form contact_form" action="<?=base_url()?>sections/save/<?= isset($id) ? $id : '' ?>" method="post" id="contactForm" novalidate="novalidate">
            <div class="form-group">
                <select name="conference" class="form-control" required="">
	            	<option value=""> - Select conference - </option>
	            	<?php foreach ($conferences as $conf): 
	            		$selected = $conf['id'] == $section['cid'] ? "selected" : ""; ?>
						<option value="<?=$conf['id']?>" <?=$selected?>><?=$conf['name']?></option>
	            	<?php endforeach; ?>
	            </select>
            </div>
            <div class="form-group">
                <input value="<?= isset($section['hour_start']) ? $section['hour_start'] : ''; ?>" type="text" name="hour_start" placeholder="Hour start *" required class="single-input form-control">
            </div>
            <div class="form-group">
                <input value="<?= isset($section['hour_end']) ? $section['hour_end'] : ''; ?>" type="text" name="hour_end" placeholder="Hour end *" required class="single-input form-control">
            </div>
            <div class="form-group">
                <input value="<?= isset($section['room']) ? $section['room'] : ''; ?>" type="text" name="room" placeholder="Room *" required class="single-input form-control">
            </div>
            <button type="submit" value="submit" class="btn submit_btn">Submit</button>
        </form>
    </div>
</section>
