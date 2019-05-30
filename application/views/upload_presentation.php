<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <div class="page_link">
                    <a>Home</a>
                    <a>Submitter</a>
                    <a>Upload presentation</a>
                </div>
                <h2>Upload presentation in room <?=$session['room']?>!</h2>
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
        <form align="center" class="register-form contact_form" action="<?=base_url()?>submitter/save_presentation/<?=$session['id']?>" method="post" id="contactForm" novalidate="novalidate" enctype="multipart/form-data">
            
            <div class="form-group">
                <input type="file" name="pdf" id="pdf" class="inputfile" />
                <label for="pdf"><i class="fas fa-upload"></i> Choose a file</label>
            </div>
            <button type="submit" value="submit" class="btn submit_btn">Upload presentation</button>
        </form>
    </div>
</section>

<style type="text/css">
    .inputfile + label {
        font-size: 1.25em;
        font-weight: 700;
        color: white;
        background-color: #9b5cf6;
        display: inline-block;
        padding: 20px 25px 25px 25px;
    }

    .inputfile:focus + label,
    .inputfile + label:hover {
        background-color: red;
    }

    .inputfile {
        width: 0.1px;
        height: 0.1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;
    }
    .inputfile + label {
        cursor: pointer; /* "hand" cursor */
    }

    .inputfile:focus + label {
        outline: 1px dotted #000;
        outline: -webkit-focus-ring-color auto 5px;
    }

    .inputfile:focus + label {
        outline: 1px dotted #000;
        outline: -webkit-focus-ring-color auto 5px;
    }
</style>
