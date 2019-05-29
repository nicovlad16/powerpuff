<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <div class="page_link">
                    <a>Home</a>
                    <a>Conferences</a>
                    <a>Proposals</a>
                </div>
                <h2>Proposals</h2>
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
        <section class="event_schedule_area">
        	<div class="container">
        		<br><br>
        		<div class="event_schedule_inner">
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
							<?php if(isset($abstracts)): ?>
								<?php foreach ($abstracts as $abs):?>
									<div class="media">
										<div class="media-body">
											<h4><?= $abs['title'] ?></h4>
											<p>Topics: <?= $abs['topics'] ?></p>
										</div>
										<?php if($this->session->userdata('login')['type'] < 3): ?>
                                        	<a href="<?=base_url()?>conferences/view_paper/<?=$abs['id']?>" class="tickets_btn buton_submit">View paper</a> &nbsp;&nbsp;
                                        	<a href="<?=base_url()?>review/assign/<?=$abs['id']?>" class="tickets_btn buton_submit">Assign reviewer</a> &nbsp;&nbsp;
                                        <?php endif; ?>
										<?php if($abs['assigned'] == 1): ?>
                                        	<a href="<?=base_url()?>review/index/<?=$abs['id']?>" class="tickets_btn buton_submit">Review</a> &nbsp;&nbsp;
                                        <?php endif; ?>
                                        <a href="<?=base_url()?>bidding/index/<?=$abs['id']?>" class="tickets_btn buton_submit">Bid abstract</a>
									</div>
								<?php endforeach; ?>
							<?php endif; ?>
						</div>
					</div>
        		</div>
        	</div>
        </section>
    </div>
</section>
