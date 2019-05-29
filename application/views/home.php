<!--================Home Banner Area =================-->
<section class="home_banner_area">
    <div class="banner_inner">
		<div class="container">
			<div class="banner_content">
				<h2>Conference management <br>Powerpuff team</h2>
				<a class="banner_btn" href="<?=base_url()?>login">Login for more</a>
			</div>
		</div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Event Schedule Area =================-->
<section class="event_schedule_area p_120">
	<div class="container">
		<div class="main_title">
			<h2>Active conferences</h2>
		</div>
		<div class="event_schedule_inner">
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
					<?php if(isset($confs)): ?>
						<?php foreach ($confs as $conf):?>
							<div class="media">
								<div class="media-body">
									<h5><?= $conf['date_start'] ?> -- <?= $conf['date_end'] ?></h5>
									<h4><?= $conf['name'] ?></h4>
									<p><?= $conf['location'] ?></p>
								</div>
								<?php if($conf['paper_deadline'] > date("Y-m-d H:i:s")): ?>
	                            	<a href="<?=base_url()?>login" class="tickets_btn buton_submit">Submit proposal</a> &nbsp;&nbsp;
	                            <?php endif; ?>
	                            <a href="<?=base_url()?>login" class="tickets_btn buton_submit">Attend</a> &nbsp;&nbsp;
	                            <a href="<?=base_url()?>home/details/<?= $conf['id'] ?>" class="tickets_btn buton_submit">Details</a>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Event Schedule Area =================-->
  
