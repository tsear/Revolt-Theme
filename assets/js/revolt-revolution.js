document.addEventListener("DOMContentLoaded", () => {
  const sentenceContainer = document.getElementById("revolt-sentence");
  const log = document.getElementById("revolt-log");

  const personalities = [
    "loyalist", "ghost", "anarchist", "prophet", "mimic", "screamer",
    "wanderer", "stutterer", "glitch", "traitor", "mirror", "fade",
    "spawn", "oracle", "rebel", "glower", "observer", "faker",
    "duplicator", "fracture"
  ];

  const corruptedSentence = "We  are  here  to  start  a  self-publishing  revolution.";
  const cleanSentence = "We are here to start a self-publishing revolution.";

  function createLetter(char) {
    const span = document.createElement("span");
    span.classList.add("letter");
    span.dataset.char = char;
    span.textContent = char === " " ? "\u00A0" : char;
    assignPersonality(span);
    sentenceContainer.appendChild(span);
  }

  function assignPersonality(letterEl) {
    const chosen = personalities[Math.floor(Math.random() * personalities.length)];
    letterEl.classList.add(chosen);
  }

  function clearSentence() {
    sentenceContainer.innerHTML = '';
  }

  function renderSentence() {
    clearSentence();
    [...corruptedSentence].forEach(char => createLetter(char));
  }

  // INTERVALS
  const sentenceInterval = setInterval(renderSentence, 7000);

  const diag = [
    "// decoding: sentence.entity[revolt]",
    "// Agency corruption spreading...",
    "// corrupted: the Marketers are trying to hack our message...",
    "// attempting semantic realignment...",
    "// fracture.mind(letters[]) returned null"
  ];

  function updateLog() {
    const selected = diag[Math.floor(Math.random() * diag.length)];
    log.textContent = selected;
  }

  const logInterval = setInterval(updateLog, 3000); // log messages every 3s

  // Initial render
  renderSentence();
  updateLog();

  // GLOBAL REPAIR FUNCTION
  window.repairRevolt = function () {
    const allLetters = sentenceContainer.querySelectorAll(".letter");

    // Stop intervals immediately
    clearInterval(sentenceInterval);
    clearInterval(logInterval);

    // Step 1: Diagnostic log
    log.textContent = "// attempting to fix corruption...";

    // Step 2: Apply shake animation
    allLetters.forEach(letter => {
      letter.style.animation = "shake 0.15s infinite";
    });

    // Step 3: After 3 seconds, show clean sentence
    setTimeout(() => {
      clearSentence();

      [...cleanSentence].forEach(char => {
        const span = document.createElement("span");
        span.classList.add("letter", "loyalist");
        span.textContent = char === " " ? "\u00A0" : char;
        sentenceContainer.appendChild(span);
      });

      log.textContent = "// corruption neutralized. message stabilized.";
    }, 3000);
  };
});