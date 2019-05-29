<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <div class="page_link">
                    <a>Home</a>
                    <a>Conferences</a>
                </div>
                <h2>Conferences</h2>
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
        		<a href="<?=base_url()?>conferences/add" class="genric-btn info-border" style="font-size: 14px;">Add new</a>
        		<br><br>
        		<div class="event_schedule_inner">
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
							<?php if(isset($confs)): ?>
								<?php foreach ($confs as $conf):?>
									<div class="media">
										<div class="media-body">
											<h5><?= $conf['date_start'] ?> -- <?= $conf['date_end'] ?></h5>
											<h4><?= $conf['name'] ?> <a href="<?=base_url()?>conferences/edit/<?=$conf['id']?>"><i class="fa fa-pencil"></i></a></h4>
											<p><?= $conf['location'] ?></p>
										</div>
                                        <a href="<?=base_url()?>sections/index/<?=$conf['id']?>" class="tickets_btn buton_submit">Sections</a> &nbsp;&nbsp;
                                        <a href="<?=base_url()?>conferences/proposals/<?=$conf['id']?>" class="tickets_btn buton_submit">View poposals</a>
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
