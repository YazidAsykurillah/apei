<section id="title" class="asbestos" style="padding:20px 0 10px;">
        <div class="container">
           <div class="row">
                <div class="col-sm-6">
                    <h1>Hubungi Kami</h1>
                </div>
                <div class="col-sm-6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="<?php echo base_url();?>">Home</a></li>
                        <li class="active">Hubungi Kami</li>
                    </ul>
                </div>
           </div>
        </div>
    </section>

    <section id="contact-page" class="container">
         <div class="row">
              <div class="col-sm-12">
                       <h4>Our Location</h4>
                       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d991.6076806113938!2d106.85837132917776!3d-6.206778599719173!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f47b587c19fb%3A0xddd8063555298d5d!2sJl.+Matraman+Raya+No.113%2C+Palmeriam%2C+Matraman%2C+Kota+Jakarta+Timur%2C+Daerah+Khusus+Ibukota+Jakarta+13140!5e0!3m2!1sen!2sid!4v1471843742680" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
                       <!-- <iframe width="100%" height="215" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.co.id/maps/place/Jl.+Matraman+Raya+No.113,+Palmeriam,+Matraman,+Kota+Jakarta+Timur,+Daerah+Khusus+Ibukota+Jakarta+13140/@-6.2067773,106.8583713,19z/data=!3m1!4b1!4m5!3m4!1s0x2e69f47b587c19fb:0xddd8063555298d5d!8m2!3d-6.2067786!4d106.8589185"> -->
                       <!-- </iframe> -->
              </div>
         </div>
        <div class="row">
            <div class="col-sm-12">
                <h4>Contact Form</h4>
                <div class="status alert alert-success" style="display: none"></div>
                <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="sendemail.php" role="form">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" placeholder="First Name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" placeholder="Last Name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" placeholder="Email address">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg">Send Message</button>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <textarea name="message" id="message" required="required" class="form-control" rows="6" placeholder="Message"></textarea>
                        </div>
                    </div>
                </form>
            </div><!--/.col-sm-8-->

        </div>
    </section>
