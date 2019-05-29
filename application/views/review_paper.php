<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <div class="page_link">
                    <a href="index.html">Home</a>
                    <a>Conferences</a>
                    <a>Proposals</a>
                    <a>Review proposal</a>
                </div>
                <h2>Review proposal</h2>
            </div>
        </div>
    </div>
</section>
<section class="contact_area p_60">
    <div class="container">
        <section class="welcome_area p_60">
        	<div class="container">
        		<div class="welcome_inner row">
        			<div class="col-lg-12">
        				<div class="welcome_text">
        					<h3><?= $paper['title'] ?></h3>
        					<?php if(!empty($paper['paper'])): ?>
	        					<h4>Paper:</h4>
	        					<p><?= $paper['paper'] ?></p>
	        				<?php endif; ?>
        					<h4>Abstract:</h4>
        					<p><?= $paper['abstract'] ?></p>
        					<p><strong>Topics:</strong> <?= $paper['topics'] ?></p>
        					<p><strong>Keywords:</strong> <?= $paper['keywords'] ?></p>
							<?php if(!empty($paper['file'])): ?>
								<strong>File:</strong> <a href="<?= base_url() ?>files/<?=$paper['file']?>" target="_blank"><?= $paper['file'] ?></a>
	        				<?php endif; ?>
        				</div>
        			</div>
        		</div>
        		<?php if(isset($reviews) && !empty($reviews)): ?>
	                <div class="comments-area">
	                    <h4>Reviews</h4>
	                    <?php foreach ($reviews as $review): ?>
		                    <div class="comment-list">
		                        <div class="single-comment justify-content-between d-flex">
		                            <div class="user justify-content-between d-flex">
		                                <div class="thumb">
		                                </div>
		                                <div class="desc">
		                                    <h5><?= $review['name'] ?></h5>
		                                    <p>
		                                    	<?php if($review['qualifier'] == 3): ?>
													Strong accept
		                                    	<?php elseif($review['qualifier'] == 2): ?>
		                                    		Accept
		                                    	<?php elseif($review['qualifier'] == 1): ?>
		                                    		Weak accept
		                                    	<?php elseif($review['qualifier'] == 0): ?>
		                                    		Borderline paper
		                                    	<?php elseif($review['qualifier'] == -1): ?>
		                                    		Weak reject
		                                    	<?php elseif($review['qualifier'] == -2): ?>
		                                    		Reject
		                                    	<?php elseif($review['qualifier'] == -3): ?>
		                                    		Strong reject
		                                    	<?php endif; ?>
		                                    </p>
		                                    <p class="comment">
		                                        <?= $review['recomandation'] != "" ? $review['recomandation'] : "-" ?>
		                                    </p>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                    <hr><br>
	                   <?php endforeach; ?>
	                </div>
	            <?php endif; ?>
                <div class="comment-form">
                    <h4>Evaluate paper</h4>
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
                    <form method="POST" action="<?=base_url()?>review/save/<?=$id?>">
                        <div class="form-group">
                            <select name="qualifier" class="form-control" required="">
                            	<option value=""> - Select qualifier - </option>
                            	<option value="3">Strong accept</option>
                            	<option value="2">Accept</option>
                            	<option value="1">Weak accept</option>
                            	<option value="0">Borderline paper</option>
                            	<option value="-1">Weak reject</option>
                            	<option value="-2">Reject</option>
                            	<option value="-3">Strong reject</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control mb-10" rows="10" name="recomandation" placeholder="Recomandation"></textarea>
                        </div>
                        <button class="primary-btn submit_btn">Evaluate</button>
                    </form>
                </div>
        	</div>
        </section>
    </div>
</section>
