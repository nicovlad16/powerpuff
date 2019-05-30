<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <div class="page_link">
                    <a href="<?=base_url()?>">Home</a>
                    <a href="<?=base_url()?>submitter">Submitter</a>
                </div>
                <h2>Submitter</h2>
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
                All you have to do now is to submit your paper!
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
 											<?php $string = 'accepted'.$conf['id'];
                                             if(isset($papers[$string]) and !empty($papers[$string]) and $papers[$string] == 1): ?>
                                                <a href="#" class="tickets_btn buton_submit" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Upload prezentation</a> &nbsp;&nbsp;
                                                <ul class="dropdown-menu">
                                                        <?php foreach($sessions as $session):
                                                                if($session['cid'] == $conf['id']):?>
                                                                    <li class="nav-item"><a class="nav-link" href="<?=base_url()?>submitter/upload_presentation/<?=$session['id']?>"><?=$session['room']?></a></li>
                                                                <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    
                                                </ul>
                                            <?php endif; ?>
                                            <?php if($papers[$conf['id']] == 0): ?>
                                                <a href="<?=base_url()?>submitter/submit/<?=$conf['id']?>" class="tickets_btn buton_submit" name="Submit">Submit</a>
                                            <?php else: ?>
                                                <a href="<?=base_url()?>submitter/edit_paper/<?=$papers['pid']?>/<?=$conf['id']?>" class="tickets_btn buton_submit button_edit" name="Submit">Edit</a>
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

