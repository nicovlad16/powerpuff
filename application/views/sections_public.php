<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <div class="page_link">
                    <a>Home</a>
                    <a>Conferences</a>
                    <a>Sections</a>
                </div>
                <h2>Sections</h2>
            </div>
        </div>
    </div>
</section>
<section class="contact_area p_60">
    <div class="container">
        <section class="event_schedule_area">
        	<div class="container">
        		<div class="event_schedule_inner">
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
							<?php if(isset($sections)): ?>
								<?php foreach ($sections as $section):?>
									<div class="media">
										<div class="media-body">
											<h5><?= $section['hour_start'] ?> -- <?= $section['hour_end'] ?></h5>
											<h4><?= $section['name'] ?></h4>
											<p>Room: <?= $section['room'] ?></p>
										</div>
										<a href="<?=base_url()?>login" class="tickets_btn buton_submit">Attend</a> &nbsp;&nbsp;
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
