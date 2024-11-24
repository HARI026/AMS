
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="Contact.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

     <section class="contact">
        <div class="content">
            <h2>Get in Touch</h2>
             <p>If you have any questions, feel free to contact us.If you have any questions, feel free to contact us.If you have any questions, feel free to contact us.If you have any questions, feel free to contact us.</p>
        </div>

           
        <div class="user">

        <div class="container">
            <div class="contactInfo">
                <div class="box">
                    <div class="icon"> <i class='bx bx-map'></i></div>
                    <div class="text"> 
                        <h3>Address</h3>
                        <p>NH Street, Kallakurichi, Tamilnadu</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"> <i class='bx bx-envelope'></i></div>
                    <div class="text"> 
                        <h3>Email</h3>
                        <p>Krishnahari90255@gmail.com</p></div>
                    </div>
                <div class="box">
                    <div class="icon"> <i class='bx bx-phone'></i></div>
                    <div class="text"> 
                        <h3>Phone</h3>
                        <p>9025576183,9092576183</p></div>
                    </div>
                </div>
            </div>

             <div class="contactForm">
               <form action="contact.php" method="POST">
                    <h2>Send Message</h2>
                        <div class="inputBox">
                            <input type="text" name="fullName" required="required">
                            <span>Full Name</span>
                        </div>
                         <div class="inputBox">
                            <input type="email" name="email" required="required">
                            <span>Email</span>
                        </div>
                        <div class="inputBox">
                            <textarea name="message" required="required"></textarea> 
                            <span>Type your Message</span>
                        </div>
                        <div class="inputBox">
                        <input type="submit" name="submit" value="Send">
                        </div>
                </form>

            </div>
        </div>


    </section>
    
    <script type="text/javascript" src="Contact.js"></script>
</body>
</html>
