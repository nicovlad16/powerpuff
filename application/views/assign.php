<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <div class="page_link">
                    <a href="index.html">Home</a>
                    <a>Conferences</a>
                    <a>Proposals</a>
                    <a>Assign reviewer</a>
                </div>
                <h2>Assign reviewer</h2>
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
							<?php if(isset($pc_members)): ?>
								<?php foreach ($pc_members as $pcm):?>
									<div class="media">
										<div class="media-body">
											<h4><?= $pcm['name'] ?></h4>
											<p>Bidding answer: <?= $pcm['answer'] == 1 ? "Yes" : ($pcm['answer'] == 0 ? "No" : "Unvoted") ?></p>
										</div>
										<?php if($pcm['assigned'] == 0): ?>
                                        	<a href="<?=base_url()?>review/ass/<?=$proposal_id?>/<?=$pcm['id']?>" class="tickets_btn buton_submit">Assign</a>
										<?php else: ?>
											<p>Assigned</p>
										<?php endif; ?>
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
