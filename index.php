<?php
$profile = [
    'name' => 'Gan Wei Ying',
    'location' => 'Kajang, Selangor, Malaysia',
    'university' => 'Universiti Tunku Abdul Rahman (UTAR)',
    'degree' => 'Bachelor of Software Engineering (Honours)',
    'graduation' => 'Expected 2027',
    'internship' => 'Available 12 Oct 2026 – 9 Jan 2027',
    'email' => 'your.email@example.com', 
    'github' => 'https://github.com/weiyinggan05',
    'linkedin' => 'https://www.linkedin.com/in/weiyinggan',
    'instagram' => 'https://instagram.com/weiyinggan' 
];

$journey = [
    ['2018', 'Started Working Part-Time', 'Built communication, responsibility and customer-service skills through real working environments.'],
    ['2023', 'Foundation in Science', 'Strengthened analytical thinking and prepared for an engineering-focused degree path.'],
    ['2024', 'Software Engineering Degree', 'Started the Bachelor of Software Engineering (Honours) programme at UTAR.'],
    ['2025', 'University Projects', 'Applied OOP, databases, algorithms, web development and mobile development.'],
    ['2026', 'Internship Chapter', 'Preparing for a full-time software engineering internship from October 2026.'],
    ['Future', 'AI-Focused Engineer', 'Building intelligent systems with strong engineering and thoughtful user experience.']
];

$skills = [
    ['Java', 'Intermediate', 'OOP, algorithms, console applications'],
    ['Python', 'Foundation', 'AI and data exploration'],
    ['JavaScript', 'Intermediate', 'Interactive web interfaces'],
    ['HTML', 'Intermediate', 'Semantic responsive pages'],
    ['CSS', 'Intermediate', 'Layouts, UI and animation'],
    ['PHP', 'Intermediate', 'CRUD web applications'],
    ['React Native', 'Foundation', 'Mobile application development'],
    ['Flutter', 'Foundation', 'SmartFarm AI interface'],
    ['MySQL', 'Intermediate', 'Relational database design'],
    ['Firebase', 'Foundation', 'Realtime application services'],
    ['Git', 'Foundation', 'Version-control workflow'],
    ['Linux', 'Foundation', 'Commands and cloud coursework'],
    ['AWS', 'Foundation', 'Cloud services and architecture'],
    ['UI/UX', 'Intermediate', 'Wireframes and interface design']
];

$projects = [
    [
        'icon' => '🌱', 'name' => 'SmartFarm AI', 'subtitle' => 'Intelligent planting companion',
        'description' => 'A modern Flutter application concept for smarter planting through weather awareness, plant-health assistance and useful recommendations.',
        'tech' => ['Flutter', 'AI', 'Weather API', 'IoT'],
        'features' => ['Plant disease assistance', 'Weather insights', 'Smart irrigation concepts', 'Recommendation interface'],
        'class' => 'green', 'status' => 'In development', 'github' => '#', 'demo' => '#'
    ],
    [
        'icon' => '⚙️', 'name' => 'Freelance Project Scheduling', 'subtitle' => 'Algorithm comparison system',
        'description' => 'A Java scheduling system that loads or generates project data and compares algorithms that maximize profit before deadlines.',
        'tech' => ['Java', 'OOP', 'Algorithms', 'File I/O'],
        'features' => ['Greedy scheduling', 'Dynamic programming', 'Brute force', 'Runtime comparison'],
        'class' => 'purple', 'status' => 'University project', 'github' => 'https://github.com/weiyinggan05/FreelanceProjectScheduling_Java.git', 'demo' => '#'
    ],
    [
        'icon' => '🩺', 'name' => 'Medi-Flow Orchestrator', 'subtitle' => 'Hackathon healthcare workflow',
        'description' => 'A team concept that detects action intents from consultations and routes digital orders to laboratories and pharmacies. My role focused on UI/UX.',
        'tech' => ['UI/UX', 'AI Concept', 'Healthcare', 'Teamwork'],
        'features' => ['Doctor dashboard', 'Pharmacy workflow', 'Order routing', 'Clear status visibility'],
        'class' => 'cyan', 'status' => 'Hackathon project', 'github' => '#', 'demo' => '#'
    ],
    [
        'icon' => '♻️', 'name' => 'Campus Secondhand Marketplace', 'subtitle' => 'Community trading platform',
        'description' => 'A PHP and MySQL marketplace for campus communities, with listings, search, filters, wishlists and seller management.',
        'tech' => ['PHP', 'MySQL', 'HTML', 'CSS', 'JavaScript'],
        'features' => ['CRUD listings', 'Wishlist', 'Search and filters', 'Responsive design'],
        'class' => 'orange', 'status' => 'Web project', 'github' => '#', 'demo' => '#'
    ]
];

$experience = [
    ['Elemis', 'Beauty Assistant', 'Part-time', 'Explained products, supported demonstrations, counted stock and maintained a welcoming customer environment.'],
    ['UTAR Mawang', 'Cashier', 'Part-time', 'Handled transactions, customer requests and daily counter responsibilities accurately.'],
    ['Tuition Centre', 'Teacher', 'Part-time', 'Supported students with clear explanations, patience and structured learning.'],
    ['Event Hospitality', 'Dinner Waitress', 'Part-time', 'Worked efficiently during busy wedding events while coordinating with a service team.']
];

$achievements = [
    ['🏆', 'Hackathon Builder', 'Contributed UI/UX work to Medi-Flow Orchestrator, a healthcare workflow concept.'],
    ['🧠', 'Algorithm Explorer', 'Implemented and compared greedy, dynamic programming, brute-force and weighted scheduling.'],
    ['🎨', 'UI/UX Role', 'Took ownership of user-interface design in collaborative technology projects.'],
    ['☁️', 'Cloud Foundations', 'Studied Linux and core AWS concepts including compute, storage, databases, networking and serverless services.']
];

$tech = ['HTML', 'CSS', 'JavaScript', 'React', 'Java', 'Python', 'PHP', 'SQL', 'Git', 'Firebase', 'Docker', 'AWS'];
$quotes = [
    'First, solve the problem. Then, write the code.',
    'Small progress is still progress.',
    'Build, test, learn, repeat.',
    'Great software starts with curiosity.',
    'May your code always compile.'
];
$quote = $quotes[array_rand($quotes)];
?>
<!DOCTYPE html>
<html lang="en" data-theme="dark" data-accent="purple">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Interactive personal portfolio of Gan Wei Ying, a Software Engineering student interested in AI, IoT, mobile applications and UI/UX.">
    <meta name="keywords" content="Gan Wei Ying, Software Engineering, UTAR, Portfolio, AI, Flutter, Java, PHP, Malaysia">
    <meta name="author" content="Gan Wei Ying">
    <meta name="theme-color" content="#0B1020">
    <title>Gan Wei Ying | Software Engineering Portfolio</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css?v=1.0">
</head>
<body>
    <canvas id="starfield" aria-hidden="true"></canvas>
    <div class="cursor-dot" aria-hidden="true"></div>
    <div class="cursor-glow" aria-hidden="true"></div>
    <div class="noise" aria-hidden="true"></div>
    <div id="rocket" class="rocket" aria-hidden="true">🚀<span></span></div>

    <header class="site-header" id="top">
        <a class="logo" href="#home" aria-label="Go to home" title="Click five times for a secret">
            <span>Gan Wei Ying</span><i></i>
        </a>
        <nav aria-label="Main navigation">
            <a href="#about">About</a>
            <a href="#journey">Journey</a>
            <a href="#skills">Skills</a>
            <a href="#projects">Projects</a>
            <a href="#experience">Experience</a>
            <a href="#playground">Playground</a>
            <a href="#contact">Contact</a>
        </nav>
        <div class="header-actions">
            <button id="themeButton" class="icon-button" aria-label="Toggle light and dark mode">☀️</button>
            <button id="paletteButton" class="icon-button" aria-label="Change color theme">🎨</button>
            <button id="menuButton" class="icon-button menu-button" aria-label="Open navigation">☰</button>
        </div>
    </header>

    <div id="mobileMenu" class="mobile-menu" aria-hidden="true">
        <button id="closeMenu" aria-label="Close navigation">×</button>
        <a href="#about">About</a><a href="#journey">Journey</a><a href="#skills">Skills</a>
        <a href="#projects">Projects</a><a href="#experience">Experience</a>
        <a href="#playground">Playground</a><a href="#contact">Contact</a>
    </div>

    <main>
        <section id="home" class="hero section-shell">
            <div class="hero-copy reveal">
                <div class="status-pill"><span></span><?= htmlspecialchars($profile['internship']) ?></div>
                <p class="hero-greeting">Hi there <span class="wave">👋</span> I’m</p>
                <h1><span>GAN WEI YING</span></h1>
                <p class="hero-role">Software Engineering Student · Future AI Developer</p>
                <div class="typing-line"><span>&gt; </span><strong id="typingText">AI Enthusiast</strong><i></i></div>
                <p class="hero-description">I turn ideas into thoughtful digital experiences—combining software engineering, emerging technology and interfaces with personality.</p>
                <div class="hero-buttons">
                    <a class="button primary magnetic" href="#journey">View My Journey <span>↓</span></a>
                    <a class="button secondary magnetic" href="assets/resume/Gan_Wei_Ying_Resume.pdf" download>Download Résumé <span>↗</span></a>
                    <a class="button ghost magnetic" href="#contact">Contact Me</a>
                </div>
                <p class="refresh-quote">“<?= htmlspecialchars($quote) ?>”</p>
            </div>

            <div class="hero-visual reveal" aria-label="Interactive developer profile illustration">
                <div class="orb orb-one"></div><div class="orb orb-two"></div>
                <div class="holo-card tilt-card">
                    <div class="holo-top"><span>developer.profile</span><i>LIVE</i></div>
                    <div class="avatar-ring"><img src="assets/images/profile-placeholder.svg" alt="Gan Wei Ying profile placeholder"></div>
                    <h2>Gan Wei Ying</h2>
                    <p>Software Engineering Student</p>
                    <div class="code-window">
                        <span><b>const</b> developer = {</span>
                        <span>&nbsp;&nbsp;focus: <em>"AI + UI/UX"</em>,</span>
                        <span>&nbsp;&nbsp;mindset: <em>"always learning"</em>,</span>
                        <span>&nbsp;&nbsp;available: <em>true</em></span>
                        <span>};</span>
                    </div>
                </div>
                <div class="floating-chip chip-a">⚡ Problem Solver</div>
                <div class="floating-chip chip-b">🌱 Building SmartFarm AI</div>
                <div class="floating-chip chip-c">✨ Creative Coder</div>
            </div>
            <a class="scroll-hint" href="#about"><span>Scroll to explore</span><i></i></a>
        </section>

        <section id="about" class="content-section section-shell">
            <div class="section-heading reveal"><span>01 / IDENTITY</span><h2>A digital profile,<br>not a boring biography.</h2><p>Curious about how technology works, how people use it and how a thoughtful interface can make it better.</p></div>
            <div class="about-grid">
                <article class="profile-panel glass tilt-card reveal">
                    <div class="profile-head">
                        <img src="assets/images/profile-placeholder.svg" alt="Gan Wei Ying profile placeholder">
                        <div><span>Student developer</span><h3>Gan Wei Ying</h3><p><?= htmlspecialchars($profile['location']) ?></p></div>
                    </div>
                    <p class="profile-intro">I am a Software Engineering student who enjoys creating practical systems, experimenting with modern technologies and designing interfaces that feel clear, polished and enjoyable.</p>
                    <div class="profile-links">
                        <a href="<?= htmlspecialchars($profile['github']) ?>" target="_blank" rel="noopener">GitHub ↗</a>
                        <a href="<?= htmlspecialchars($profile['linkedin']) ?>" target="_blank" rel="noopener">LinkedIn ↗</a>
                    </div>
                </article>
                <div class="about-cards">
                    <article class="info-card glass reveal"><small>University</small><strong><?= htmlspecialchars($profile['university']) ?></strong><span><?= htmlspecialchars($profile['degree']) ?></span></article>
                    <article class="info-card glass reveal"><small>Location</small><strong>Kajang, Malaysia</strong><span>Open to internship opportunities</span></article>
                    <article class="info-card glass reveal"><small>Languages</small><strong>English · 中文 · Bahasa Melayu</strong><span>Communication across diverse teams</span></article>
                    <article class="info-card glass reveal"><small>Interests</small><strong>AI · Mobile · UI/UX</strong><span>Building useful technology creatively</span></article>
                    <article class="quote-card glass reveal"><small>Favourite mindset</small><blockquote>“Do not wait until you know everything. Start building, then learn what the project teaches you.”</blockquote></article>
                </div>
            </div>
        </section>

        <section id="journey" class="content-section section-shell">
            <div class="section-heading reveal"><span>02 / MY JOURNEY</span><h2>Every chapter unlocked<br>a new skill.</h2><p>Select a timeline card to reveal its story.</p></div>
            <div class="timeline reveal" tabindex="0" aria-label="Horizontal journey timeline">
                <?php foreach ($journey as $index => $item): ?>
                    <button class="timeline-card <?= $index === 0 ? 'active' : '' ?>" type="button">
                        <span><?= htmlspecialchars($item[0]) ?></span><i></i><h3><?= htmlspecialchars($item[1]) ?></h3><p><?= htmlspecialchars($item[2]) ?></p>
                    </button>
                <?php endforeach; ?>
            </div>
        </section>

        <section id="skills" class="content-section section-shell">
            <div class="section-heading reveal"><span>03 / SKILL GALAXY</span><h2>Skills floating around<br>my learning universe.</h2><p>Hover or tap a planet to inspect what I have used it for.</p></div>
            <div class="skill-space glass reveal">
                <div class="skill-core"><span>GWY</span><small>Skill<br>Galaxy</small></div>
                <div class="planet-orbit orbit-1"></div><div class="planet-orbit orbit-2"></div>
                <?php foreach ($skills as $index => $skill): ?>
                    <button class="skill-planet" style="--i:<?= $index ?>" type="button" data-level="<?= htmlspecialchars($skill[1]) ?>" data-use="<?= htmlspecialchars($skill[2]) ?>">
                        <strong><?= htmlspecialchars($skill[0]) ?></strong><span><?= htmlspecialchars($skill[1]) ?></span>
                    </button>
                <?php endforeach; ?>
                <div id="skillTooltip" class="skill-tooltip"><strong>Select a planet</strong><span>Skill information appears here.</span></div>
            </div>
        </section>

        <section id="projects" class="content-section section-shell">
            <div class="section-heading reveal"><span>04 / PROJECT ARCADE</span><h2>Projects built like<br>collectible game cards.</h2><p>Explore the systems, interfaces and ideas I have worked on.</p></div>
            <div class="project-grid">
                <?php foreach ($projects as $index => $project): ?>
                    <article class="project-card <?= $project['class'] ?> tilt-card reveal" data-project='<?= htmlspecialchars(json_encode($project), ENT_QUOTES, 'UTF-8') ?>'>
                        <div class="project-art"><span><?= $project['icon'] ?></span><i></i><b><?= htmlspecialchars($project['status']) ?></b></div>
                        <div class="project-body"><small><?= htmlspecialchars($project['subtitle']) ?></small><h3><?= htmlspecialchars($project['name']) ?></h3><p><?= htmlspecialchars($project['description']) ?></p>
                            <div class="tags"><?php foreach ($project['tech'] as $tag): ?><span><?= htmlspecialchars($tag) ?></span><?php endforeach; ?></div>
                            <button class="learn-more" type="button">Explore project <span>↗</span></button>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>

        <section id="experience" class="content-section section-shell">
            <div class="section-heading reveal"><span>05 / EXPERIENCE OFFICE</span><h2>Every desk taught me<br>something useful.</h2><p>Professional skills are built both inside and outside a development environment.</p></div>
            <div class="desk-grid">
                <?php foreach ($experience as $item): ?>
                    <article class="desk glass reveal"><div class="monitor"><span>&gt;_</span><i></i></div><div class="keyboard-desk"></div><small><?= htmlspecialchars($item[2]) ?></small><h3><?= htmlspecialchars($item[0]) ?></h3><strong><?= htmlspecialchars($item[1]) ?></strong><p><?= htmlspecialchars($item[3]) ?></p></article>
                <?php endforeach; ?>
            </div>
        </section>

        <section id="achievements" class="content-section section-shell">
            <div class="section-heading reveal"><span>06 / ACHIEVEMENT WALL</span><h2>Milestones displayed<br>as digital trophies.</h2><p>A growing collection of challenges attempted and lessons earned.</p></div>
            <div class="trophy-grid">
                <?php foreach ($achievements as $item): ?>
                    <article class="trophy glass reveal"><div><?= $item[0] ?></div><h3><?= htmlspecialchars($item[1]) ?></h3><p><?= htmlspecialchars($item[2]) ?></p></article>
                <?php endforeach; ?>
            </div>
        </section>

        <section id="technology" class="content-section section-shell">
            <div class="section-heading reveal"><span>07 / TECH UNIVERSE</span><h2>Tools orbiting around<br>the way I build.</h2><p>Technology changes quickly. The important skill is learning how to combine the right tools.</p></div>
            <div class="tech-universe reveal">
                <div class="universe-ring ring-one"></div><div class="universe-ring ring-two"></div>
                <div class="universe-core"><span>My Tech</span><strong>Universe</strong></div>
                <?php foreach ($tech as $index => $name): ?><div class="orbit-tech" style="--n:<?= count($tech) ?>;--i:<?= $index ?>"><span><?= htmlspecialchars($name) ?></span></div><?php endforeach; ?>
            </div>
        </section>

        <section id="facts" class="content-section section-shell">
            <div class="section-heading reveal"><span>08 / FUN FACTS</span><h2>Click a card.<br>Reveal a little more.</h2><p>Because a portfolio should show personality too.</p></div>
            <div class="facts-grid">
                <?php
                $facts = [
                    ['☕','Coffee Consumed','Enough to debug one more time'],['💻','Coding Style','Learn by building'],['🌱','Current Build','SmartFarm AI'],
                    ['📚','Degree','Software Engineering'],['🎮','Favourite Mode','Creative problem-solving'],['🐱','Random Fact','I enjoy interfaces with personality']
                ];
                foreach ($facts as $fact): ?>
                    <button class="fact-card reveal" type="button"><span class="fact-front"><i><?= $fact[0] ?></i><strong><?= htmlspecialchars($fact[1]) ?></strong><small>Click to flip</small></span><span class="fact-back"><strong><?= htmlspecialchars($fact[2]) ?></strong><small>Click to return</small></span></button>
                <?php endforeach; ?>
            </div>
        </section>

        <section id="playground" class="content-section section-shell">
            <div class="section-heading reveal"><span>09 / INTERACTIVE LAB</span><h2>Take a break.<br>Play with the interface.</h2><p>Small experiments powered by ordinary JavaScript—no framework or build process required.</p></div>
            <div class="playground-grid">
                <article class="play-card glass reveal"><div class="play-title"><span>✨</span><div><small>Experiment 01</small><h3>Particle Generator</h3></div></div><p>Launch a burst of particles anywhere inside the panel.</p><div id="particleBox" class="particle-box"><button id="burstButton" type="button">Generate particles</button></div></article>
                <article class="play-card glass reveal"><div class="play-title"><span>🧮</span><div><small>Experiment 02</small><h3>Mini Calculator</h3></div></div><div class="calculator"><input id="calcDisplay" type="text" value="0" readonly aria-label="Calculator display"><div id="calcKeys" class="calc-keys"></div></div></article>
                <article class="play-card glass reveal"><div class="play-title"><span>⌨️</span><div><small>Experiment 03</small><h3>Typing Speed Test</h3></div></div><p id="typingPrompt" class="typing-prompt">creative code builds memorable experiences</p><textarea id="typingInput" placeholder="Start typing the sentence above..."></textarea><div class="typing-stats"><span id="typingTime">0.0s</span><span id="typingWpm">0 WPM</span><button id="typingReset" type="button">Reset</button></div></article>
                <article class="play-card draw-card glass reveal"><div class="play-title"><span>✏️</span><div><small>Experiment 04</small><h3>Draw on Screen</h3></div></div><canvas id="drawCanvas" aria-label="Drawing canvas"></canvas><button id="clearCanvas" type="button">Clear canvas</button></article>
            </div>
        </section>

        <section id="contact" class="content-section section-shell">
            <div class="section-heading reveal"><span>10 / OPEN CONNECTION</span><h2>Run contact()<br>and start a conversation.</h2><p>The form is connected to a small PHP handler that works directly in WampServer.</p></div>
            <div class="terminal glass reveal">
                <div class="terminal-bar"><div><i></i><i></i><i></i></div><span>contact-terminal.php</span><small>localhost / secure connection</small></div>
                <div class="terminal-content">
                    <div class="terminal-output">
                        <p><span>visitor@gwy:~$</span> contact()</p><p>{</p>
                        <a href="mailto:<?= htmlspecialchars($profile['email']) ?>">&nbsp;&nbsp;email: "<?= htmlspecialchars($profile['email']) ?>",</a>
                        <a href="<?= htmlspecialchars($profile['linkedin']) ?>" target="_blank" rel="noopener">&nbsp;&nbsp;linkedin: "Connect with me",</a>
                        <a href="<?= htmlspecialchars($profile['github']) ?>" target="_blank" rel="noopener">&nbsp;&nbsp;github: "Explore my code",</a>
                        <a href="assets/resume/Gan_Wei_Ying_Resume.pdf" target="_blank">&nbsp;&nbsp;resume: "Open PDF"</a><p>}</p><p class="terminal-ready">✓ Ready for new opportunities.</p>
                    </div>
                    <form id="contactForm" action="contact.php" method="post">
                        <label><span>name:</span><input name="name" type="text" maxlength="80" required placeholder="Your name"></label>
                        <label><span>email:</span><input name="email" type="email" maxlength="120" required placeholder="you@example.com"></label>
                        <label><span>message:</span><textarea name="message" maxlength="1500" required placeholder="Tell me about the opportunity or project..."></textarea></label>
                        <input type="text" name="website" class="honeypot" tabindex="-1" autocomplete="off">
                        <button class="button primary" type="submit">send_message() <span>↗</span></button>
                        <p id="formStatus" role="status"></p>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <footer class="section-shell">
        <div class="robot"><span>[•‿•]</span><i>👋</i></div><h2>Thanks for visiting.</h2><p>May your code always compile.</p>
        <div><span>© <?= date('Y') ?> Gan Wei Ying</span><button id="backTop" type="button">Back to top ↑</button></div>
    </footer>

    <div id="projectModal" class="modal" aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
        <div class="modal-card"><button class="modal-close" type="button" aria-label="Close project details">×</button><div id="modalIcon" class="modal-icon"></div><small id="modalStatus"></small><h2 id="modalTitle"></h2><p id="modalDescription"></p><h3>Key features</h3><ul id="modalFeatures"></ul><div id="modalTags" class="tags"></div><div class="modal-actions"><a id="modalGithub" class="button secondary" href="#">GitHub ↗</a><a id="modalDemo" class="button primary" href="#">Live Demo ↗</a></div></div>
    </div>

    <div id="secretPanel" class="secret-panel" aria-hidden="true"><button type="button">×</button><span>SECRET FILE UNLOCKED</span><h2>Behind the Scenes</h2><p>This portfolio intentionally uses plain PHP, HTML, CSS and JavaScript so it can be edited in Notepad++ and run directly in WampServer.</p><code>logoClicks === 5 // curiosity rewarded ✨</code></div>
    <div id="developerMode" class="developer-mode" aria-hidden="true"><button type="button">×</button><span>DEVELOPER MODE UNLOCKED</span><p>Konami Code accepted. Debugging confidence +100.</p></div>
    <div id="idleBot" class="idle-bot" aria-hidden="true"><span>🤖</span><p>You have been idle for a while. Here is a reminder: your next great project may begin with one small experiment.</p><button type="button">×</button></div>

    <script>window.PORTFOLIO_PROFILE = <?= json_encode($profile, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?>;</script>
    <script src="assets/js/script.js?v=1.0"></script>
</body>
</html>
