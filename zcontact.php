<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Contact page of KMG College, Gudiyatham - Get in touch with us.">
    <title>Contact - KMG College Gudiyatham</title>
    <style>
        body {
            background-color: rgb(17, 56, 49);
            color: antiquewhite;
            text-align: center;
            font-family: Arial, sans-serif;
        }
        img {
            width: 50%;
            max-width: 400px;
            margin-top: 20px;
        }
        a {
            color: lightblue;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .contact-form {
            background: #222;
            padding: 20px;
            width: 50%;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(255, 255, 255, 0.2);
        }
        input, textarea {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
        }
        button {
            background-color: green;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: darkgreen;
        }
        .social-links a {
            margin: 0 10px;
            color: lightblue;
            font-size: 20px;
        }
        .map-container {
            margin-top: 20px;
        }
        .location-details {
            background: #333;
            padding: 15px;
            margin: 20px auto;
            width: 50%;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(255, 255, 255, 0.2);
        }
    </style>
</head>
<body>

    <h1 style="color: green;">Contact Us</h1>
    
    <a href="index.php"><h3>GO TO HOME</h3></a>

    <h2>About KMG College, Gudiyatham</h2>
    <p>KMG College of Arts & Science, Gudiyatham, is a leading institution providing high-quality education and career development opportunities.</p>

    <h2>Our Location</h2>
    <div class="map-container">
        <iframe 
           src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3890.9028497438217!2d78.9015943!3d12.9399153!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bad6ccbe9c038a7%3A0xd5a5d7a503615598!2sKMG%20College%20of%20Management!5e0!3m2!1sen!2sin!4v1700000000000!5m2!1sen!2sin"

           width="80%" 
            height="400" 
            style="border:0; border-radius:10px; box-shadow: 0px 0px 10px rgba(255, 255, 255, 0.2);" 
            allowfullscreen="" 
            loading="lazy">
        </iframe>
    </div>

    <div class="location-details">
        <h3>Visit Us At:</h3>
        <p><strong>Address:</strong> KMG College of Arts & Science, Gudiyatham, Tamil Nadu, India</p>
        <p><strong>Phone:</strong> +91 9876543210</p>
        <p><strong>Email:</strong> contact@kmgcollege.com</p>
        <p><strong>Business Hours:</strong></p>
        <p>Monday - Friday: 9:00 AM - 5:00 PM</p>
        <p>Saturday: 10:00 AM - 2:00 PM</p>
        <p>Sunday: Closed</p>
    </div>

    <h2>Contact Form</h2>
    <div class="contact-form">
        <form action="contact_process.php" method="POST">
            <input type="text" name="name" placeholder="Your Name" required><br>
            <input type="email" name="email" placeholder="Your Email" required><br>
            <textarea name="message" rows="4" placeholder="Your Message" required></textarea><br>
            <button type="submit">Send Message</button>
        </form>
    </div>

    <h2>Connect With Us</h2>
    <div class="social-links">
        <a href="https://facebook.com" target="_blank">Facebook</a> |
        <a href="https://twitter.com" target="_blank">Twitter</a> |
        <a href="https://instagram.com" target="_blank">Instagram</a>
    </div>

    <footer>
        <p>© 2024 KMG College, Gudiyatham - All Rights Reserved.</p>
    </footer>

</body>
</html>
