document.getElementById("adminLogin").addEventListener("click", function () {
    document.getElementById("role").value = "admin"; // Set role to admin
    document.getElementById("loginForm").submit();   // Submit form
});

document.getElementById("userLogin").addEventListener("click", function () {
    document.getElementById("role").value = "user";  // Set role to user
    document.getElementById("loginForm").submit();   // Submit form
});
