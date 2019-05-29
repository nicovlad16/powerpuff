<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <div class="page_link">
                    <a href="index.html">Home</a>
                    <a>Conferences</a>
                    <a>Bid proposals</a>
                    <a>View abstract</a>
                </div>
                <h2>View abstract</h2>
            </div>
        </div>
    </div>
</section>
<section class="contact_area p_60">
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
        <section class="welcome_area p_60">
        	<div class="container">
        		<div class="welcome_inner row">
        			<div class="col-lg-12">
        				<div class="welcome_text">
        					<h3><?= $abs['title'] ?></h3>
        					<?php if(!empty($abs['paper'])): ?>
	        					<h4>Paper:</h4>
	        					<p><?= $abs['paper'] ?></p>
	        				<?php endif; ?>
        					<h4>Abstract:</h4>
        					<p><?= $abs['abstract'] ?></p>
        					<p><strong>Topics:</strong> <?= $abs['topics'] ?></p>
        					<p><strong>Keywords:</strong> <?= $abs['keywords'] ?></p>
        					<?php if(!empty($abs['file'])): ?>
								<a href="<?= base_url() ?>" target="_blank"><?= $abs['file'] ?></a>
	        				<?php endif; ?>
        					<?php if($abs['bidding_deadline'] < date("Y-m-d H:i:s")): ?>
								<div class="alert alert-danger" role="alert">
						            Bidding process closed!
						        </div>
        					<?php elseif($voted == 0): ?>
        						<a class="genric-btn success" href="<?= base_url() ?>bidding/set_yes/<?= $id ?>" style="font-size: 14px;">Interested <i class="fa fa-thumbs-up"></i></a>
        						<a class="genric-btn danger" href="<?= base_url() ?>bidding/set_no/<?= $id ?>" style="font-size: 14px;">Not interested <i class="fa fa-thumbs-down"></i></a>
        					<?php else: ?>
        						<div class="alert alert-success">
        							You have voted!
        						</div>
        					<?php endif; ?>
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
    </div>
</section>
