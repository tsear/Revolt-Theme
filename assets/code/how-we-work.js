// how-we-work.js

const Project = function(client) {
    this.discovery = () => {
      return {
        vibeCheck: true,
        voice: client.voice || "emerging",
        constraints: "honored"
      };
    };
  
    this.build = () => ({
      tech: ["WordPress", "custom CSS", "modular JS"],
      design: "intentional",
      scale: "sane",
      ownership: client
    });
  
    this.delivery = () => "on your terms";
  };
  
  const yourSite = new Project(you);