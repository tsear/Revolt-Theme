document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("startHereForm");
    const response = document.getElementById("startHereResponse");
  
    form.addEventListener("submit", function (e) {
      e.preventDefault();
  
      const data = new FormData(form);
  
      // Compile submission as a single message (for Formspree or HubSpot field)
      let summary = `
  Hi, I’m ${data.get("name")} and I ${data.get("action")} ${data.get("what")}.
  
  Lately, I’ve been trying to ${data.get("trying")}, 
  but I keep getting distracted by ${data.get("distracted")} 
  or blocked by ${data.get("blocked")}.
  
  The truth is, I think what I’m building could ${data.get("impact")}, 
  but I need help with ${data.get("need")}.
  
  I’ve worked with ${data.get("worked_with")} before. 
  It went ${data.get("experience")}.
  
  If I could wave a wand and get one thing built right now, 
  it would be ${data.get("magic")}. I’d call that a win.
  
  You can reach me at ${data.get("email")}, 
  and if I ghost you, it’s probably because ${data.get("ghost_reason")}.
      `;
  
      // Send to Formspree (replace YOUR_ID)
      fetch("https://formspree.io/f/mrbprrpv", {
        method: "POST",
        headers: {
          Accept: "application/json",
        },
        body: new URLSearchParams({
          message: summary,
          email: data.get("email"),
        }),
      }).then(() => {
        form.style.display = "none";
        response.style.display = "block";
      });
    });
  });