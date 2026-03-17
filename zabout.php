<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - KMG College</title>
    <style>
        /* General Body Styling */
        body {
            background-image: url('image/bg.jfif');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: black;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Centered Title Styling */
        .center-text {
            text-align: center;
            color: rgb(67, 0, 83);
            padding: 20px;
        }

        /* Content Section Styling */
        .content-section {
            background-color: yellow;
            padding: 20px;
            margin: 20px auto;
            width: 80%;
            border-radius: 10px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
        }

        /* Section Title Styling */
        .section-title {
            color: red;
            padding-top: 10px;
            text-decoration: underline;
        }

        /* Navigation Link */
        .navigation {
            text-align: center;
            margin: 20px 0;
        }

        .navigation a {
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
            color: black;
            background-color: yellow;
            padding: 10px 20px;
            border-radius: 5px;
            transition: 0.3s ease-in-out;
        }

        .navigation a:hover {
            background-color: red;
            color: white;
        }

        /* Objectives Styling */
        .objectives {
            list-style-type: none;
            padding-left: 0;
            font-size: 18px;
            font-weight: bold;
        }

        .objectives li {
            margin: 5px 0;
        }

        /* Announcement Styling */
        .announcement {
            color: red;
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-top: 20px;
            animation: blink 1s infinite alternate;
        }

        @keyframes blink {
            from { opacity: 1; }
            to { opacity: 0.5; }
        }
    </style>
</head>
<body>

    <!-- Title Section -->
    <h1 class="center-text"><u>ABOUT US</u></h1>

    <!-- Navigation -->
    <div class="navigation">
        <a href="index.php">GO TO HOME</a>
    </div>

    <!-- About the College Section -->
    <section class="content-section">
        <h2 class="section-title">About the College</h2>
        <p>
            Welcome to <strong>K.M.G. College of Arts and Science (Autonomous)</strong>.<br>
            The <strong>Kousalya Ammal Govindarajan Educational and Charitable Trust, Gudiyattam</strong>, 
            was established in 1999 by <strong>Sri. K.M. Govindarajan</strong>, the Founder, Chairman, and Managing Trustee, 
            to promote collegiate education in Arts, Science, Technology, Culture, and Sports.<br><br>
            The institution, with its strong vision and mission, aspires to be a role model among autonomous institutions.<br>
            It aims to achieve the prestigious status of <em>‘Potential for Excellence’</em>.<br><br>
            <strong>- The Principal</strong>
        </p>
    </section>

    <hr>

    <!-- Quality Policy Section -->
    <section class="content-section">
        <h2 class="section-title">Quality Policy</h2>
        <p>
            KMG students achieve the best learning outcomes and personal growth<br>
            through modern education that equips them for the working world<br>
            and a constantly evolving society, fostering their development<br>
            into responsible and deserving citizens.
        </p>
    </section>

    <!-- Objectives Section -->
    <section class="content-section">
        <h2 class="section-title">Objectives</h2>
        <ul class="objectives">
            <li><strong>K</strong> - Knowledge to Obtain</li>
            <li><strong>M</strong> - Motive to Serve</li>
            <li><strong>G</strong> - Goal to Reach</li>
        </ul>
    </section>

    <!-- Placement Announcement -->
    <p class="announcement">100% Placement</p>

</body>
</html>
