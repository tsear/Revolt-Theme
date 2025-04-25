// revolt-core.js

class RevoltBuild {
    constructor(client) {
      this.client = client;
      this.site = new Site();
      this.budget = client.realisticBudget || 0;
    }
  
    setupStack() {
      this.cms = "WordPress";
      this.theme = this.budget > 3000 ? "custom" : "child";
      this.plugins = this.auditPlugins([
        "ACF",
        "custom-CPT",
        "bespoke-SEO",
        "no-bloat-mode"
      ]);
    }
  
    deploy() {
      if (!this.client.hasVoice()) throw new Error("Nothing worth building");
      this.site.publish({ control: "client", roadmap: true });
    }
  
    auditPlugins(plugins) {
      return plugins.filter(p => !p.includes("builder"));
    }
  }
  
  export default RevoltBuild;