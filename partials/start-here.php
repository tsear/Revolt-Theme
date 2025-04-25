<section id="start-here" class="start-here">
  <form id="startHereForm">
    <p>Hi, I’m <input type="text" name="name" placeholder="your name"> and I 
      <select name="action">
        <option value="make">make</option>
        <option value="build">build</option>
        <option value="write">write</option>
        <option value="scream into the void about">scream into the void about</option>
      </select>
      <input type="text" name="what" placeholder="what you make">
    </p>

    <p>Lately, I’ve been trying to <input type="text" name="trying">  
    but I keep getting distracted by <input type="text" name="distracted">  
    or blocked by <input type="text" name="blocked">.</p>

    <p>The truth is, I think what I’m building could <input type="text" name="impact">,  
    but I need help with <input type="text" name="need">.</p>

    <p>I’ve worked with  
      <select name="worked_with">
        <option value="freelancers">freelancers</option>
        <option value="agencies">agencies</option>
        <option value="a friend who ghosted me">a friend who ghosted me</option>
        <option value="no one">no one</option>
      </select> before. It went <input type="text" name="experience">.
    </p>

    <p>If I could wave a wand and get one thing built right now,  
    it would be <input type="text" name="magic">. I’d call that a win.</p>

    <p>You can reach me at <input type="email" name="email" required>,  
    and if I ghost you, it’s probably because <input type="text" name="ghost_reason">.</p>

    <!-- ✅ Fixed class here -->
    <button type="submit" class="btn-cta">Confess & Submit (Politely)</button>
  </form>

  <div id="startHereResponse" style="display:none;">
    <p>✅ Got it. You’ve officially made this weird form proud.</p>
    <p>We’ll be in touch. Or maybe you’ll beat us to it.</p>
  </div>
</section>