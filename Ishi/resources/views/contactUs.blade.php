<x-homeLayout>

    <section class="contact">
        <div class="content">
            <h2>Contact Us</h2>
            <p>
                Need to get in touch with us? Either  fill out the form<br>
                with your inquiry or find  the department email you'd<br>
                like to contact below
            </p>
        </div>
        <div class="container">
            <div class="contactInfo">
                <div class="box">
                    <div class="icon">
                        <img class="icon" src="images/map.png" alt="">
                    </div>
                    <div class="text">
                        <h3>Address</h3>
                        <p>3234 Avenue way Packlands,<br />Westlands,Nairobi,<br />539434</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon">
                        <img class="icon" src="images/gmail.png" alt="">
                    </div>
                    <div class="text">
                        <h3>Email</h3>
                        <a target="_blank"
                            href="mailto:ishiproperties@gmail.com?subject=Help needed&body=Hi Jude, I am {{ auth()->user()->name }} and ">ishiproperties@gmail.com</a>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><img class="icon" src="images/telephone-call.png" alt=""></i></div>
                    <div class="text">
                        <h3>Phone</h3>
                        <p>+254 7854 2354</p>
                        <p>+254 7854 4673</p>
                    </div>
                </div>
            </div>

            <div class="contactform">
                <form onsubmit="sendEmail(); reset(); return false;">
                    <h2>Send Message</h2>
                    <div class="inputBox">
                        <input type="text" name="" required="required" />
                        <span>Full Name</span>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="" required="required" />
                        <span>Email</span>
                    </div>
                    <div class="inputBox">
                        <input type="number" name="" required="required" />
                        <span>Phone Number</span>
                    </div>
                    <div class="inputBox">
                        <textarea required="required"></textarea>
                        <span>Type your Message...</span>
                    </div>
                    <div class="inputBox">
                        <input type="submit" name="" value="Send" />
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script scr="https://smtpjs.com/v3/smtp.js"></script>
    <script>
        function sendEmail() {
            Email.send({
                Host: "smtp.gmail.com",
                Username: "ocomilj@gmail.com",
                Password: "jude@j2001",
                To: 'jude.angedu@strathmore.edu',
                From: document.getElementById("email").value,
                Subject: "New Contact Form Enquiry",
                Body: "And this is the body"
            }).then(
                message => alert(message)
            );
        }
    </script>


</x-homeLayout>
