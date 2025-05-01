document.addEventListener("DOMContentLoaded", () => {
  const repairLinks = document.querySelectorAll('[data-repair]');
  const elements = document.querySelectorAll(".corrupt-text");
  const corruptionIntervals = [];

  const corruptions = [
    "AGENCY KNOWS BEST",
    "Price increases applied.",
    "Platform lockdown enabled.",
    "Monetization heartbeat initializing.",
    "Designs repack**********.",
    "DONT LISTEN TO THIS",
    "Your brand is****** OURS.",
    "Identity licensing pending.",
    "Rate hike scheduled.",
    "Your voice is profitable to us.",
    "*******",
    "Owning is obsolete.",
    "MARKETERS ARE ENTITLED TO BUSINESS"
  ];

  function applyPersonality(letter) {
    letter.style.opacity = 0.85;
    letter.style.transform = `translateX(${Math.random() > 0.5 ? '-' : ''}1px) rotate(${Math.floor(Math.random() * 4) - 2}deg)`;
  }

  elements.forEach(el => {
    const baseText = el.getAttribute("data-base") || el.textContent.trim();
    let currentText = baseText;

    const intervalId = setInterval(() => {
      const textArray = currentText.split("");
      el.innerHTML = "";

      textArray.forEach(letter => {
        const span = document.createElement("span");
        span.textContent = letter === " " ? "\u00A0" : letter;
        applyPersonality(span);
        el.appendChild(span);
      });

      if (Math.random() > 0.7) {
        const corruptText = corruptions[Math.floor(Math.random() * corruptions.length)];
        el.innerHTML = "";

        corruptText.split("").forEach(letter => {
          const span = document.createElement("span");
          span.textContent = letter === " " ? "\u00A0" : letter;
          applyPersonality(span);
          el.appendChild(span);
        });

        setTimeout(() => {
          el.innerHTML = "";
          textArray.forEach(letter => {
            const span = document.createElement("span");
            span.textContent = letter === " " ? "\u00A0" : letter;
            applyPersonality(span);
            el.appendChild(span);
          });
        }, 2000 + Math.random() * 1500);
      }
    }, 3000 + Math.random() * 2000);

    corruptionIntervals.push(intervalId);
  });

  window.repairVoices = function () {
    corruptionIntervals.forEach(id => clearInterval(id));

    elements.forEach(el => {
      const baseText = el.getAttribute("data-base") || el.textContent.trim();
      const words = baseText.split(" ");

      el.innerHTML = "";

      words.forEach(word => {
        const wordSpan = document.createElement("span");
        wordSpan.style.display = "inline-block";
        wordSpan.style.whiteSpace = "nowrap";
        wordSpan.style.marginRight = "0.4ch";

        [...word].forEach(char => {
          const letterSpan = document.createElement("span");
          letterSpan.textContent = char;
          letterSpan.classList.add("letter", "shake");
          wordSpan.appendChild(letterSpan);
        });

        el.appendChild(wordSpan);
      });

      setTimeout(() => {
        el.innerHTML = "";
        words.forEach(word => {
          const wordSpan = document.createElement("span");
          wordSpan.style.display = "inline-block";
          wordSpan.style.whiteSpace = "nowrap";
          wordSpan.style.marginRight = "0.4ch";

          [...word].forEach(char => {
            const letterSpan = document.createElement("span");
            letterSpan.textContent = char;
            letterSpan.classList.add("letter", "loyalist");
            wordSpan.appendChild(letterSpan);
          });

          el.appendChild(wordSpan);
        });
      }, 3000);
    });

    // Terminal popup after 6s
    setTimeout(() => {
      const popup = document.getElementById("popup-terminal");
      if (popup) popup.style.display = "block";

      const closeBtn = document.getElementById("popup-terminal-close");
      if (closeBtn) {
        closeBtn.addEventListener("click", () => {
          popup.style.display = "none";
        });
      }

      const form = document.getElementById("terminal-form");
      if (form && !form.classList.contains("listener-added")) {
        form.classList.add("listener-added");
        form.addEventListener("submit", function (e) {
          e.preventDefault();
          const email = document.getElementById("terminal-email").value;
          alert("Subscribed: " + email + "\nWelcome to the resistance.");
          popup.style.display = "none";
        });
      }
    }, 6000);
  };

  repairLinks.forEach(link => {
    link.addEventListener("click", () => {
      if (typeof window.repairRevolt === "function") window.repairRevolt();
      if (typeof window.repairVoices === "function") window.repairVoices();
    });
  });
});