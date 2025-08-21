document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("startHereForm");
  const response = document.getElementById("startHereResponse");

  // Ensure form and response elements exist before adding listeners
  if (form && response) {
    form.addEventListener("submit", function (e) {
      e.preventDefault();

      const data = new FormData(form);

      // Compile a summary message based on the NEW, simplified form fields
      let summary = `
Hi, I’m ${data.get("name")} and I ${data.get("action")} ${data.get("what")}.

Lately, I’ve been trying to ${data.get("trying")}, but I'm blocked by ${data.get("blocked")}.

You can reach me at ${data.get("email")}.
      `;

      // The Formspree endpoint remains the same
      fetch("https://formspree.io/f/mrbprrpv", {
        method: "POST",
        headers: {
          Accept: "application/json",
        },
        // Send the simplified summary and the required email field
        body: new URLSearchParams({
          message: summary,
          email: data.get("email"),
        }),
      })
      .then(res => {
        if (res.ok) {
          // On successful submission, hide the form and show the response message
          form.style.display = "none";
          response.style.display = "block";
        } else {
          // Optional: Handle submission errors
          response.innerHTML = "<p>Sorry, there was an error submitting the form. Please try again.</p>";
          response.style.display = "block";
        }
      })
      .catch(error => {
        // Optional: Handle network errors
        console.error("Form submission error:", error);
        response.innerHTML = "<p>Sorry, a network error occurred. Please try again.</p>";
        response.style.display = "block";
      });
    });
  }
});
