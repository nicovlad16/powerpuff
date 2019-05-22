<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <div class="page_link">
                    <a href="index.html">Home</a>
                    <a href="contact.html">Register</a>
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
