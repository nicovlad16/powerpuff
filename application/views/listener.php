<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <div class="page_link">
                    <a href="index.html">Home</a>
                    <a href="contact.html">Listener</a>
                </div>
                <h2>Listener</h2>
            </div>
        </div>
    </div>
</section>
<section class="contact_area p_120">
    <div class="container">
        <div class="alert alert-success" role="alert">
            <h2>Welcome <b style="color: black;"><?= isset($user['name'])? $user['name'] : ""?></b>!</h2>
        </div>
        <div>
            <h4>
                All you have to do now attend to a conference!
            </h4>
        </div>
    </div>
</section>
<section class="contact_area p_61">
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
                <div class="event_schedule_inner">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <?php if(isset($confs)): ?>
                                <?php foreach ($confs as $conf):?>
                                    <div class="media">
                                        <div class="media-body">
                                            <h5><?= $conf['date_start'] ?> -- <?= $conf['date_end'] ?></h5>
                                            <h4><?= $conf['name'] ?> </h4>
                                            <p><?= $conf['location'] ?></p>
                                        </div>
                                            <!-- <a href="<?=base_url()?>listener/attend/<?=$user['id']?>/<?=$conf['id']?>" class="tickets_btn buton_submit" name="Submit">Attend - 5$</a> -->
                                            <a href="#" class="tickets_btn buton_submit" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Attend to prezentation</a> &nbsp;&nbsp;
                                                <ul class="dropdown-menu">
                                                        <?php foreach($sessions as $session):
                                                                if($session['cid'] == $conf['id']):
                                                                    <li class="nav-item"><strong><?=$session['room']</strong>: 
                                                                        $k = 0; 
                                                                            foreach($session_participants as $part):
                                                                                if($part['sid'] == $session['id']):
                                                                                $k = 1; 
                                                                            endif; 
                                                                            endforeach; 
                                                                            if($k == 0):?>
                                                                        <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
                                                                            <input type="hidden" name="cmd" value="_xclick">
                                                                            <input type="hidden" name="business" value="reciver_powerpuff@gmail.com">
                                                                            <input type="hidden" name="personal" value="buyer_powerpuff@gmail.com">
                                                                            <input type="hidden" name="lc" value="US">
                                                                            <input type="hidden" name="item_name" value="Conference">
                                                                            <input type="hidden" name="amount" value="5">
                                                                            <input type="hidden" name="currency_code" value="EUR">
                                                                            <input type="hidden" name="button_subtype" value="services">
                                                                            <input type="hidden" name="no_note" value="0">
                                                                            <input type="hidden" name="cn" value="Add special instructions to the seller:">
                                                                            <input type="hidden" name="no_shipping" value="2">
                                                                            <input type="hidden" name="quantity" value="1">
                                                                            <input type="hidden" name="return" value="<?=base_url();?>listener/attend/<?=$session['id']?>">
                                                                            <input type="hidden" name="redirect" value="<?=base_url();?>">
                                                                            <input type="hidden" name="bn" value="PP-BuyNowBF:btn_paynowCC_LG.gif:NonHosted">
                                                                            <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                                                                            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                                                                        </form>
                                                                    <?php else:?>
                                                                        <strong>Attended!</strong>
                                                                    <?php endif;?>
                                                                    </li>
                                                                <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    
                                                </ul>

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

