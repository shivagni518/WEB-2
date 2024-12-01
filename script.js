document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("jobForm");
    const responseDiv = document.getElementById("response");
  
    form.addEventListener("submit", (event) => {
      event.preventDefault(); // Prevent form from submitting traditionally
      const formData = new FormData(form);
  
      // Mocking a successful submission (use AJAX for real submission)
      responseDiv.style.display = "block";
      responseDiv.style.backgroundColor = "#e0ffe4";
      responseDiv.style.color = "#2d7a3e";
      responseDiv.innerHTML = `
              <strong>Success!</strong> Your application has been submitted.<br>
              <ul>
                  <li><strong>Name:</strong> ${formData.get("name")}</li>
                  <li><strong>Email:</strong> ${formData.get("email")}</li>
                  <li><strong>Phone:</strong> ${formData.get("phone")}</li>
                  <li><strong>Position:</strong> ${formData.get("position")}</li>
              </ul>
          `;
  
      form.reset(); // Clear form after submission
    });
  });