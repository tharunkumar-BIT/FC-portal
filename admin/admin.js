document
  .getElementById("adminForm")
  .addEventListener("submit", function (event) {
    event.preventDefault();

    // Get input values
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    // Validate email (you can add more sophisticated validation)
    if (validateEmail(email)) {
      // Check if the email is allowed (you can replace this with your database logic)
      if (isEmailAllowed(email)) {
        // Redirect or show success message
        alert("Login successful!");
        // For redirection:
        // window.location.href = 'dashboard.html';
      } else {
        showError("*Enter valid email ID.");
      }
    } else {
      showError("*Enter a valid email address.");
    }
  });
function validateEmail(email) {
  const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return regex.test(email);
}

function isEmailAllowed(email) {
  // You can replace this logic with your actual database check
  const allowedEmails = ["user1@example.com", "user2@example.com"];
  return allowedEmails.includes(email);
}

function showError(message) {
  const errorMsg = document.getElementById("errorMsg");
  errorMsg.textContent = message;
}
  