<?php include 'includes/header.php'?>
<?php include 'includes/db-connection.php' ?>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
            <div class="container px-5">
                <a class="navbar-brand fw-bold" href="#page-top"><small class="txt-custom fw-bold"> Funeraria Santa Rita de Casia</small></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    
                    <i class="fa fa-bars"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
                        <li class="nav-item"><a class="nav-link me-lg-3" href="#ourBranches">Our Branches</a></li>
                        <li class="nav-item"><a class="nav-link me-lg-3" href="#services">Services</a></li>
                        <li class="nav-item"><a class="nav-link me-lg-3" href="#contact">Contact</a></li>
                        <li class="nav-item"><a class="nav-link me-lg-3" href="#about">About Us</a></li>
                    </ul>
                    <hr>
                    <a href="login-form.php" class="btn bg-black rounded-pill px-3 mb-2 mb-lg-0 mx-0 text-white btn-custom" >
                        <span class="d-flex align-items-center">
                            <i class="fa fa-sign-in-alt me-2"></i>
                            <span class="small">Login</span>
                        </span>
                    </a>
                </div>
            </div>
        </nav>

        <header class="masthead">
            <div class="container h-100" id="home">
                <div class="row">
                    <div class="col-md-8">
                        <h1 class="fw-bold"> <small class="quote1">"</small> Life is not just a passing of time. Life is the collection of experiences and their intensity.<small class="quote2">"</small></h1>
                        <hr class="divider-custom" />
                        <p class="text-white-75 mb-5">We at <b>Funeraria Santa Rita de Casia</b> provides quality service you can afford. Register now to avail our service!</p>
                        <a class="btn btn-xl btn-custom text-white" href="register.php">Register Now</a>
                    </div>
                    <div class="col-md-4">
                        <img src="design/assets/img/logo.jpeg" alt="Logo" class="img-logo mt-5">
                    </div>
                </div>
            </div>
        </header>

        <section class="testimonials bg-light">
            <div class="container">
                <h2 class="mb-1 text-center custom-horn mb-3"><i class="fa fa-bullhorn"></i></h2>

                <div class="row">
                    <div class="col-lg-8">
                        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                            <h1>Announcement</h1>
                            <p class="font-weight-light">"This is fantastic! Thanks so much guys!This is fantastic! Thanks so much guys!This is fantastic! Thanks so much guys!This is fantastic! Thanks so much guys!This is fantastic! Thanks so much guys!This is fantastic! Thanks so much guys!This is fantastic! Thanks so much guys!"</p>
                            <a class="btn btn-xl btn-custom text-white float-right" href="">Read More...</a>
                            </a>
                        </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">News and updates</h5>
                                <p class="card-text">Soome news and updates will appear here.</p>
                            </div>
                        </div>
                    </div>
            </div>
        </section>

        <section class="features-icons bg-light text-center"  id="ourBranches">
            <div class="container" >
            <h3 class="fw-bold text-center">Our Branches</h3>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <img class="card-img-top" src="design/assets/img/chapel.png" alt="Image">
                            <div class="card-body">
                                <h6>Funeraria Sta. Rita de Casia | Main Branch</h6>
                                <p class="card-text">Sipocot, Camarines Sur</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card" >
                            <img class="card-img-top" src="design/assets/img/chapel.png" alt="Image">
                            <div class="card-body">
                                <h6>Funeraria Sta. Rita de Casia | Del Gallego</h6>
                                <p class="card-text">Del Gallego, Camarines Sur</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <img class="card-img-top" src="design/assets/img/chapel.png" alt="Image">
                            <div class="card-body">
                                <h6>Funeraria Sta. Rita de Casia | Lupi</h6>
                                <p class="card-text">Lupi, Camarines Sur</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <img class="card-img-top" src="design/assets/img/chapel.png" alt="Image">
                            <div class="card-body">
                                <h6>Funeraria Sta. Rita de Casia | Ragay</h6>
                                <p class="card-text">Ragay, Camarines Sur</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
       <section class="features-icons bg-light"  id="services" >
           <div class="container">
           <h3 class="fw-bold text-center">Our Services</h3>
           <div class="row g-2">
           <?php $fetch_res = "SELECT * from casket INNER JOIN service USING(service_id)";
                    $query_res = $conn->query($fetch_res); 
                     while($services = $query_res->fetch_assoc())
                    {
                        if ($services['image']=== ''){
                            $imageURL =  "design/assets/img/logo.jpeg";
                        } else{
                            $imageURL = 'admin/casketimage/'.$services['image'];
                        }
                    ?>
                     <div class="col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="<?php echo $imageURL ?>" alt="Image">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $services['casket_type']; ?></h5>
                                <p class="card-text"><b>Service Type:  </b> <?php echo $services['service']; ?></p>
                                <span class="card-text"><b>Price:</b>  &#8369;<?php echo number_format($services['amount'], 2) ?></span>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                </div>
           </div>
       </section>


        <section class="page-section" id="contact">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6 text-center">
                        <h2 class="mt-0">Contact Us</h2>
                        <hr class="divider" />
                        <p class="text-muted mb-5">If you have any queries about our service, please leave a message.</p>
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                    <div class="col-lg-6">
                        <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                            
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" required/>
                                <label for="name">Full name</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                            </div>
                           
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" required />
                                <label for="email">Email address</label>
                                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                            </div>
                            
                            <div class="form-floating mb-3">
                                <input class="form-control" id="phone" type="tel" placeholder="(123) 456-7890" data-sb-validations="required" required/>
                                <label for="phone">Phone number</label>
                                <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                            </div>
                            
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="message" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required" required></textarea>
                                <label for="message">Message</label>
                                <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                            </div>

                            <div class="d-grid"><button class="btn btn-xl btn-custom text-white" id="submitButton" type="submit">Submit</button></div>
                        </form>
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-4 text-center mb-5 mb-lg-0">
                        <i class="bi-phone fs-2 mb-3 text-muted"></i>
                        <div>+639123456789</div>
                    </div>
                </div>
            </div>
        </section>

        <?php include 'includes/footer.php' ?>
       
        <?php include 'includes/scripts.php' ?>
        
<script>
    $(function(){
    
    $('.view').click(function(e)
    {
        e.preventDefault();
        $('#view').modal('show');
        var id = $(this).data('id');
    });
    });
</script>
    </body>
</html>