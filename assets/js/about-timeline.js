document.addEventListener('DOMContentLoaded', function() {
    const GITHUB_API_URL = 'https://api.github.com/repos/tsear/Revolt-Theme/commits';
    const loadingEl = document.getElementById('timeline-loading');
    const chaptersEl = document.getElementById('story-chapters');
    const fallbackEl = document.getElementById('timeline-fallback');
    
    // Story structure with business context
    const storyChapters = {
        'Foundation': {
            period: 'April 2025',
            philosophy: 'Rebellion begins with a single commit.',
            story: 'Started from zero. No page builders, no templates, no shortcuts. Built a WordPress theme that refuses to be boring.',
            keywords: ['Initial import', 'foundation', 'initial'],
            color: '#FCB900'
        },
        'Evolution': {
            period: 'May 2025', 
            philosophy: 'Perfection through iteration.',
            story: 'Rapid development cycles. Testing, breaking, improving. Each commit brought us closer to something that actually works.',
            keywords: ['v1.2', 'update', 'tweak', 'fix'],
            color: '#FFB300'
        },
        'Business': {
            period: 'July 2025',
            philosophy: 'Great work needs to be found.',
            story: 'SEO strategy deployment. Service pages that convert. Making sure the rebellion reaches the right people.',
            keywords: ['SEO', 'service', 'CTA', 'subpage', 'brand'],
            color: '#FFA000'
        },
        'Professional': {
            period: 'Present',
            philosophy: 'Polish without compromise.',
            story: 'Navigation perfected. Mobile optimized. Every interaction considered. Ready for serious work.',
            keywords: ['dropdown', 'navigation', 'mobile', 'optimization'],
            color: '#FF8F00'
        }
    };
    
    // Fetch and organize commits
    async function fetchCommits() {
        try {
            const response = await fetch(`${GITHUB_API_URL}?per_page=50`);
            if (!response.ok) throw new Error(`API error: ${response.status}`);
            
            const commits = await response.json();
            return organizeCommitsIntoStory(commits);
        } catch (error) {
            console.error('Error fetching commits:', error);
            return null;
        }
    }
    
    // Intelligently organize commits into story chapters
    function organizeCommitsIntoStory(commits) {
        const chapters = {};
        
        // Initialize chapters
        Object.keys(storyChapters).forEach(phase => {
            chapters[phase] = {
                ...storyChapters[phase],
                commits: []
            };
        });
        
        // Categorize commits
        commits.forEach(commit => {
            const message = commit.commit.message.toLowerCase();
            const date = new Date(commit.commit.committer.date);
            
            // Skip merge commits and noise
            if (message === 'x' || message.includes('merge pull request')) return;
            
            // Categorize by keywords and date
            let assigned = false;
            
            Object.entries(storyChapters).forEach(([phase, data]) => {
                if (assigned) return;
                
                const hasKeyword = data.keywords.some(keyword => 
                    message.includes(keyword.toLowerCase())
                );
                
                if (hasKeyword) {
                    chapters[phase].commits.push(commit);
                    assigned = true;
                }
            });
            
            // Date-based fallback
            if (!assigned) {
                if (date >= new Date('2025-07-01')) {
                    chapters['Professional'].commits.push(commit);
                } else if (date >= new Date('2025-06-01')) {
                    chapters['Business'].commits.push(commit);
                } else if (date >= new Date('2025-05-01')) {
                    chapters['Evolution'].commits.push(commit);
                } else {
                    chapters['Foundation'].commits.push(commit);
                }
            }
        });
        
        return chapters;
    }
    
    // Format commit for display
    function formatCommit(commit) {
        const date = new Date(commit.commit.committer.date);
        const timeAgo = getTimeAgo(date);
        const sha = commit.sha.substring(0, 7);
        const message = commit.commit.message.split('\n')[0]; // First line only
        
        return { sha, message, timeAgo, date };
    }
    
    // Human-readable time ago
    function getTimeAgo(date) {
        const now = new Date();
        const diffTime = Math.abs(now - date);
        const diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24));
        
        if (diffDays < 7) return `${diffDays} days ago`;
        if (diffDays < 30) return `${Math.floor(diffDays / 7)} weeks ago`;
        if (diffDays < 365) return `${Math.floor(diffDays / 30)} months ago`;
        return date.toLocaleDateString('en-US', { month: 'short', year: 'numeric' });
    }
    
    // Render story chapters
    function renderStory(chapters) {
        const chaptersHTML = Object.entries(chapters).map(([phase, data]) => {
            const commitCount = data.commits.length;
            const commitsHTML = data.commits.slice(0, 3).map(commit => {
                const { sha, message, timeAgo } = formatCommit(commit);
                return `
                    <div class="commit-item" data-sha="${commit.sha}">
                        <div class="commit-meta">
                            <span class="commit-sha">${sha}</span>
                            <span class="commit-time">${timeAgo}</span>
                        </div>
                        <div class="commit-message">${message}</div>
                    </div>
                `;
            }).join('');
            
            return `
                <div class="story-chapter" data-phase="${phase}">
                    <div class="chapter-header" style="border-left-color: ${data.color}">
                        <div class="chapter-meta">
                            <h3 class="chapter-title">${phase}</h3>
                            <div class="chapter-period">${data.period}</div>
                        </div>
                        <div class="chapter-philosophy">"${data.philosophy}"</div>
                    </div>
                    
                    <div class="chapter-content">
                        <div class="chapter-story">
                            <p>${data.story}</p>
                        </div>
                        
                        <div class="chapter-commits">
                            <div class="commits-header">
                                <span class="commits-label">Key Commits</span>
                                <span class="commits-count">${commitCount} total</span>
                            </div>
                            <div class="commits-list">
                                ${commitsHTML}
                            </div>
                        </div>
                    </div>
                </div>
            `;
        }).join('');
        
        chaptersEl.innerHTML = chaptersHTML;
        
        // Add click handlers for commits
        chaptersEl.addEventListener('click', (e) => {
            const commitItem = e.target.closest('.commit-item');
            if (commitItem) {
                const sha = commitItem.dataset.sha;
                window.open(`https://github.com/tsear/Revolt-Theme/commit/${sha}`, '_blank');
            }
        });
    }
    
    // Initialize the story
    async function initStory() {
        loadingEl.style.display = 'block';
        chaptersEl.style.display = 'none';
        fallbackEl.style.display = 'none';
        
        const chapters = await fetchCommits();
        
        if (chapters) {
            renderStory(chapters);
            loadingEl.style.display = 'none';
            chaptersEl.style.display = 'block';
        } else {
            loadingEl.style.display = 'none';
            fallbackEl.style.display = 'block';
        }
    }
    
    // Start the story
    initStory();
});
