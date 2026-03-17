<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Leave Application Form</title>
</head>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/emailjs-com@3/dist/email.min.js"></script>
<script type="text/javascript">
    (function () {
        emailjs.init("svULc6YjtcngsvvC9");
    })();
</script>

<body background="bg.jfif">
    <div class="container">
        <h1>Leave Application Form</h1>
        <form action="submit_application.php" method="POST" onsubmit="sendemail(); reset(); return false;" id="leaveform">
            <label>Name:</label>
            <input type="text" name="fullname" id="name" required>

            <label>Roll No:</label>
            <input type="number" name="roll_no" id="roll_no" required>

            <label for="dept_email">Department Email:</label>
            <input type="email" name="dept_email" id="dept_email" required>

            <label for="user_email">User Email:</label>
            <input type="email" name="user_email" id="user_email" required>

            <label for="Department">Department:</label>
            <select id="Department" name="department" required>
                <option value="" disabled selected>Department</option>
                <option value="Tamil">Dept. of Tamil</option>
                <option value="Business Admin">Dept. of Business Admin</option>
                <option value="comp. Application">Dept. of comp. Application</option>
                <option value="commerce">Dept. of commerce</option>
                <option value="bio">Dept. of bio</option>
                <option value="chemistry">Dept. of chemistry</option>
                <option value="comp. science">Dept. of comp. science</option>
                <option value="maths">Dept. of maths</option>
                <option value="micro">Dept. of micro</option>
                <option value="Msc.(I.T)">Msc.(I.T)</option>
                <option value="PG- chemistry">PG- chemistry</option>
                <option value="BBA">Dept. of BBA</option>
                <option value="B.COM">Dept. of B.COM</option>
            </select>

            <table>
                <tr>
                    <td><label for="Class_name">Class:</label></td>
                    <td>
                        <select id="Class_name" name="class_name" required>
                            <option value="" disabled selected>Select Year</option>
                            <option value="I YEAR">I YEAR</option>
                            <option value="II YEAR">II YEAR</option>
                            <option value="III YEAR">III YEAR</option>
                        </select>
                    </td>
                    <td></td>
                    <td><label for="section_name">Section:</label></td>
                    <td>
                        <select id="section_name" name="section_name" required>
                            <option value="" disabled selected>Select Section</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                        </select>
                    </td>
                </tr>
            </table>

            <label for="leaveType">Leave Type:</label>
            <select id="leaveType" name="leave_type" required>
                <option value="" disabled selected>Select Leave Type</option>
                <option value="sick">Sick Leave</option>
                <option value="casual">Casual Leave</option>
                <option value="earned">Earned Leave</option>
            </select>

            <label for="startDate">Start Date:</label>
            <input type="date" name="startDate" id="startDate" required>

            <label for="endDate">End Date:</label>
            <input type="date" name="endDate" id="endDate" required>

            <label for="reason">Reason:</label>
            <textarea id="reason" name="reason" rows="4" required></textarea>

            <button type="submit" name="submitleave">Submit Application</button>
        </form>
    </div>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://smtpjs.com/v3/smtp.js"></script>

    <!-- Optional EmailJS Script -->
    <script>
        function sendemail() {
            var dept_email = document.getElementById("dept_email").value;
            var name = document.getElementById("name").value;
            var message = document.getElementById("reason").value;
            var s_date = document.getElementById("startDate").value;
            var e_date = document.getElementById("endDate").value;
            var reason = document.getElementById("reason").value;
            var dept_name = document.getElementById("Department").value;
            var your_name = document.getElementById("name").value;
            var class_year = document.getElementById("Class_name").value;
            var section_ = document.getElementById("section_name").value;
            var roll_no = document.getElementById("roll_no").value;
            var user_email = document.getElementById("user_email").value;

            var templateParams = {
                email: dept_email,
                to_name: name,
                message: message,
                s_date: s_date,
                e_date: e_date,
                reason: reason,
                dept_name: dept_name,
                your_name: your_name,
                class_year: class_year,
                class_sec: section_,
                roll_no: roll_no,
                user_email: user_email,
            };

            // Send the main email
            emailjs.send('service_homqx2s', 'template_ajzwuwe', templateParams)
                .then(function (response) {
                    console.log('SUCCESS!', response.status, response.text);
                    alert("Leave application sent successfully!");

                    // Send the auto-reply
                    emailjs.send('service_homqx2s', 'template_g9e12e8', templateParams)
                        .then(function (response) {
                            console.log('Auto-reply sent!', response.status, response.text);
                        }, function (error) {
                            console.error('Failed to send auto-reply:', error);
                        });
                }, function (error) {
                    console.error('Failed to send leave application:', error);
                });
        }
    </script>
</body>

</html>
