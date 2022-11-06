<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ishi Properties</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#ef3b2d",
                    },
                },
            },
        };
    </script>
    <link rel="stylesheet" href="css/main-footer.css">
    <link rel="stylesheet" href="../css/main-footer.css">
    <link rel="stylesheet" href="css/style6.css">
    <link rel="stylesheet" href="../css/style6.css">
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/contactUs.css" />
</head>

<section class="contact">
    <div class="content">
      <h2>Contact Us</h2>
      <p>
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vitae harum
        amet distinctio cum facilis? Veritatis aspernatur ipsam corporis vero
        natus
      </p>
    </div>
    <div class="container">
          <div class="contactInfo">
              <div class="box">
                  <div class="icon">
                      <img class ="icon"src="images/map.png" alt="">
                  </div>
                  <div class="text">
                      <h3>Address</h3>
                      <p>3234 Avenue way Packlands,<br />Westlands,Nairobi,<br />539434</p>
                  </div>
              </div>
              <div class="box">
              <div class="icon">
                   <img class ="icon"src="images/gmail.png" alt="">
              </div>
              <div class="text">
                  <h3>Email</h3>
                  <p>ishihomes@gmail.com</p>
              </div>
              </div>
              <div class="box">
              <div class="icon"><img class ="icon"src="images/telephone-call.png" alt=""></i></div>
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
      function sendEmail(){
                  Email.send({
          Host : "smtp.gmail.com",
          Username : "ocomilj@gmail.com",
          Password : "jude@j2001",
          To : 'jude.angedu@strathmore.edu',
          From : document.getElementById("email").value,
          Subject : "New Contact Form Enquiry",
          Body : "And this is the body"
      }).then(
      message => alert(message)
      );
    }
  </script>
 

 <footer class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-col">
                <h4>Ishi Homes</h4>
                <ul>
                    <li><a href="/about">About us</a></li>
                    <li><a href="#">our services</a></li>
                    <li><a href="#">private policy</a></li>
                    <li><a href="#">Affiliation </a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>Get help</h4>
                <ul>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Purchases</a></li>
                    <li><a href="#">Agreement Policies</a></li>
                    <li><a href="#">Payment options</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Online services </h4>
                <ul>
                    <li><a href="#">Rentals</a></li>
                    <li><a href="/property">Property management</a></li>
                    <li><a href="#">Leasing</a></li>
                    <li><a href="#">Online purchase</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Follow us</h4>
                <div class="social-links">
                    <a href="#"><i class="fab  fa-facebook-f"></i>
                        <a href="#"><i class="fab  fa-twitter"></i>
                            <a href="#"><i class="fab  fa-instagram"></i>
                                <a href="#"><i class="fab  fa-youtube"></i>
                                    <a href="#"><i class="fab  fa-linkedin"></i>
                </div>
            </div>
        </div>
</footer>
<footer class="w-full flex items-center justify-start font-bold bg-blue-900 text-blue-300 h-16 md:justify-center">

    <p class="ml-2 mr-64">Copyright &copy; 2022, All Rights reserved</p>

    <a href="#" class="bg-blue-600 text-white py-2 px-5 rounded ml-24">Contact Us</a>

</footer>
<x-flash-message />
</body>

</html>

