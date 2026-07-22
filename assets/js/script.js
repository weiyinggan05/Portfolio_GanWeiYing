(() => {
  'use strict';

  const $ = (selector, scope = document) => scope.querySelector(selector);
  const $$ = (selector, scope = document) => [...scope.querySelectorAll(selector)];
  const root = document.documentElement;
  const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* ---------- Theme and palette ---------- */
  const themeButton = $('#themeButton');
  const paletteButton = $('#paletteButton');
  const accents = ['purple', 'cyan', 'pink', 'green'];
  let accentIndex = Math.max(0, accents.indexOf(localStorage.getItem('portfolio-accent') || 'purple'));
  const savedTheme = localStorage.getItem('portfolio-theme');
  if (savedTheme === 'light' || savedTheme === 'dark') root.dataset.theme = savedTheme;
  root.dataset.accent = accents[accentIndex];

  const updateThemeIcon = () => {
    themeButton.textContent = root.dataset.theme === 'dark' ? '☀️' : '🌙';
  };
  updateThemeIcon();

  themeButton?.addEventListener('click', () => {
    root.dataset.theme = root.dataset.theme === 'dark' ? 'light' : 'dark';
    localStorage.setItem('portfolio-theme', root.dataset.theme);
    updateThemeIcon();
  });

  paletteButton?.addEventListener('click', () => {
    accentIndex = (accentIndex + 1) % accents.length;
    root.dataset.accent = accents[accentIndex];
    localStorage.setItem('portfolio-accent', accents[accentIndex]);
  });

  /* ---------- Mobile menu ---------- */
  const mobileMenu = $('#mobileMenu');
  const setMenu = (open) => {
    mobileMenu?.classList.toggle('open', open);
    mobileMenu?.setAttribute('aria-hidden', String(!open));
    document.body.style.overflow = open ? 'hidden' : '';
  };
  $('#menuButton')?.addEventListener('click', () => setMenu(true));
  $('#closeMenu')?.addEventListener('click', () => setMenu(false));
  $$('#mobileMenu a').forEach(link => link.addEventListener('click', () => setMenu(false)));

  /* ---------- Header and active links ---------- */
  const header = $('.site-header');
  const sections = $$('main section[id]');
  const navLinks = $$('.site-header nav a');
  const updateHeader = () => {
    header?.classList.toggle('scrolled', window.scrollY > 20);
    let current = 'home';
    sections.forEach(section => {
      if (window.scrollY >= section.offsetTop - 220) current = section.id;
    });
    navLinks.forEach(link => link.classList.toggle('active', link.getAttribute('href') === `#${current}`));
  };
  window.addEventListener('scroll', updateHeader, { passive: true });
  updateHeader();

  /* ---------- Reveal animation ---------- */
  const revealObserver = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
        revealObserver.unobserve(entry.target);
      }
    });
  }, { threshold: 0.12, rootMargin: '0px 0px -45px' });
  $$('.reveal').forEach(item => revealObserver.observe(item));

  /* ---------- Typing animation ---------- */
  const roles = ['AI Enthusiast', 'Full Stack Learner', 'Mobile App Developer', 'IoT Explorer', 'UI/UX Lover', 'Software Engineer'];
  const typingText = $('#typingText');
  let roleIndex = 0;
  let charIndex = 0;
  let deleting = false;
  function typeRole() {
    if (!typingText) return;
    const role = roles[roleIndex];
    charIndex += deleting ? -1 : 1;
    typingText.textContent = role.slice(0, charIndex);
    let delay = deleting ? 45 : 75;
    if (!deleting && charIndex === role.length) {
      deleting = true;
      delay = 1350;
    } else if (deleting && charIndex === 0) {
      deleting = false;
      roleIndex = (roleIndex + 1) % roles.length;
      delay = 300;
    }
    window.setTimeout(typeRole, delay);
  }
  if (!prefersReduced) typeRole();

  /* ---------- Mouse cursor ---------- */
  const cursorDot = $('.cursor-dot');
  const cursorGlow = $('.cursor-glow');
  let mouseX = window.innerWidth / 2;
  let mouseY = window.innerHeight / 2;
  let glowX = mouseX;
  let glowY = mouseY;
  window.addEventListener('pointermove', event => {
    mouseX = event.clientX;
    mouseY = event.clientY;
    if (cursorDot) cursorDot.style.transform = `translate(${mouseX}px, ${mouseY}px) translate(-50%, -50%)`;
    resetIdleTimer();
  }, { passive: true });
  function animateGlow() {
    glowX += (mouseX - glowX) * 0.09;
    glowY += (mouseY - glowY) * 0.09;
    if (cursorGlow) cursorGlow.style.transform = `translate(${glowX}px, ${glowY}px) translate(-50%, -50%)`;
    requestAnimationFrame(animateGlow);
  }
  if (!prefersReduced) animateGlow();

  /* ---------- Canvas star field ---------- */
  const starCanvas = $('#starfield');
  const starContext = starCanvas?.getContext('2d');
  let stars = [];
  function resizeStars() {
    if (!starCanvas || !starContext) return;
    const ratio = Math.min(window.devicePixelRatio || 1, 2);
    starCanvas.width = window.innerWidth * ratio;
    starCanvas.height = window.innerHeight * ratio;
    starCanvas.style.width = `${window.innerWidth}px`;
    starCanvas.style.height = `${window.innerHeight}px`;
    starContext.setTransform(ratio, 0, 0, ratio, 0, 0);
    const count = Math.min(180, Math.floor((window.innerWidth * window.innerHeight) / 9500));
    stars = Array.from({ length: count }, () => ({
      x: Math.random() * window.innerWidth,
      y: Math.random() * window.innerHeight,
      size: Math.random() * 1.6 + 0.2,
      speed: Math.random() * 0.22 + 0.04,
      alpha: Math.random() * 0.65 + 0.2
    }));
  }
  function renderStars() {
    if (!starCanvas || !starContext) return;
    starContext.clearRect(0, 0, window.innerWidth, window.innerHeight);
    const light = root.dataset.theme === 'light';
    for (const star of stars) {
      star.y += star.speed;
      if (star.y > window.innerHeight + 5) {
        star.y = -5;
        star.x = Math.random() * window.innerWidth;
      }
      const parallaxX = (mouseX - window.innerWidth / 2) * star.speed * 0.018;
      const parallaxY = (mouseY - window.innerHeight / 2) * star.speed * 0.012;
      starContext.beginPath();
      starContext.fillStyle = light ? `rgba(60,77,130,${star.alpha * .5})` : `rgba(207,226,255,${star.alpha})`;
      starContext.arc(star.x + parallaxX, star.y + parallaxY, star.size, 0, Math.PI * 2);
      starContext.fill();
    }
    if (!prefersReduced) requestAnimationFrame(renderStars);
  }
  resizeStars();
  renderStars();
  window.addEventListener('resize', resizeStars);

  /* ---------- Tilt cards and magnetic buttons ---------- */
  $$('.tilt-card').forEach(card => {
    card.addEventListener('pointermove', event => {
      if (prefersReduced || window.matchMedia('(pointer: coarse)').matches) return;
      const rect = card.getBoundingClientRect();
      const x = (event.clientX - rect.left) / rect.width - 0.5;
      const y = (event.clientY - rect.top) / rect.height - 0.5;
      card.style.setProperty('--rx', `${-y * 7}deg`);
      card.style.setProperty('--ry', `${x * 9}deg`);
    });
    card.addEventListener('pointerleave', () => {
      card.style.setProperty('--rx', '0deg');
      card.style.setProperty('--ry', '0deg');
    });
  });
  $$('.magnetic').forEach(button => {
    button.addEventListener('pointermove', event => {
      if (prefersReduced) return;
      const rect = button.getBoundingClientRect();
      button.style.transform = `translate(${(event.clientX - rect.left - rect.width / 2) * .12}px, ${(event.clientY - rect.top - rect.height / 2) * .12}px)`;
    });
    button.addEventListener('pointerleave', () => button.style.transform = '');
  });

  /* ---------- Timeline ---------- */
  $$('.timeline-card').forEach(card => {
    card.addEventListener('click', () => {
      $$('.timeline-card').forEach(item => item.classList.remove('active'));
      card.classList.add('active');
    });
  });

  /* ---------- Skill planets ---------- */
  const skillSpace = $('.skill-space');
  const skillPlanets = $$('.skill-planet');
  const skillTooltip = $('#skillTooltip');
  function positionSkillPlanets() {
    if (!skillSpace || window.innerWidth <= 760) {
      skillPlanets.forEach(planet => {
        planet.style.left = '';
        planet.style.top = '';
      });
      return;
    }
    const rect = skillSpace.getBoundingClientRect();
    const centerX = rect.width / 2;
    const centerY = rect.height / 2;
    skillPlanets.forEach((planet, index) => {
      const inner = index < 7;
      const ringIndex = inner ? index : index - 7;
      const ringCount = inner ? 7 : skillPlanets.length - 7;
      const radiusX = inner ? Math.min(rect.width * .25, 245) : Math.min(rect.width * .39, 390);
      const radiusY = inner ? Math.min(rect.height * .27, 185) : Math.min(rect.height * .42, 290);
      const angle = ((Math.PI * 2) / ringCount) * ringIndex - Math.PI / 2 + (inner ? 0 : .17);
      const left = centerX + Math.cos(angle) * radiusX - planet.offsetWidth / 2;
      const top = centerY + Math.sin(angle) * radiusY - planet.offsetHeight / 2;
      planet.style.left = `${left}px`;
      planet.style.top = `${top}px`;
    });
  }
  positionSkillPlanets();
  window.addEventListener('resize', positionSkillPlanets);
  skillPlanets.forEach(planet => {
    const showSkill = () => {
      skillPlanets.forEach(item => item.classList.remove('active'));
      planet.classList.add('active');
      if (skillTooltip) {
        $('strong', skillTooltip).textContent = `${$('strong', planet).textContent} · ${planet.dataset.level}`;
        $('span', skillTooltip).textContent = planet.dataset.use || '';
      }
    };
    planet.addEventListener('mouseenter', showSkill);
    planet.addEventListener('click', showSkill);
  });

  /* ---------- Project modal ---------- */
  const modal = $('#projectModal');
  const closeModal = () => {
    modal?.classList.remove('open');
    modal?.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
  };
  $$('.project-card').forEach(card => {
    $('.learn-more', card)?.addEventListener('click', () => {
      try {
        const project = JSON.parse(card.dataset.project || '{}');
        $('#modalIcon').textContent = project.icon || '✨';
        $('#modalStatus').textContent = project.status || '';
        $('#modalTitle').textContent = project.name || 'Project';
        $('#modalDescription').textContent = project.description || '';
        $('#modalFeatures').innerHTML = (project.features || []).map(feature => `<li>${escapeHtml(feature)}</li>`).join('');
        $('#modalTags').innerHTML = (project.tech || []).map(tag => `<span>${escapeHtml(tag)}</span>`).join('');
        $('#modalGithub').href = project.github || '#';
        $('#modalDemo').href = project.demo || '#';
        modal?.classList.add('open');
        modal?.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
      } catch (error) {
        console.error('Could not open project modal:', error);
      }
    });
  });
  $('.modal-close')?.addEventListener('click', closeModal);
  modal?.addEventListener('click', event => { if (event.target === modal) closeModal(); });
  window.addEventListener('keydown', event => { if (event.key === 'Escape') closeModal(); });

  function escapeHtml(value) {
    const node = document.createElement('div');
    node.textContent = String(value);
    return node.innerHTML;
  }

  /* ---------- Fact cards ---------- */
  $$('.fact-card').forEach(card => card.addEventListener('click', () => card.classList.toggle('flipped')));

  /* ---------- Particle generator ---------- */
  const particleBox = $('#particleBox');
  function createParticleBurst(originX, originY) {
    if (!particleBox) return;
    const colors = ['var(--accent)', 'var(--accent-2)', 'var(--accent-3)', '#ffffff'];
    for (let index = 0; index < 42; index += 1) {
      const particle = document.createElement('i');
      particle.className = 'particle';
      const angle = Math.random() * Math.PI * 2;
      const distance = 45 + Math.random() * 130;
      particle.style.left = `${originX}px`;
      particle.style.top = `${originY}px`;
      particle.style.setProperty('--tx', `${Math.cos(angle) * distance}px`);
      particle.style.setProperty('--ty', `${Math.sin(angle) * distance}px`);
      particle.style.setProperty('--particle-color', colors[index % colors.length]);
      particle.style.width = particle.style.height = `${4 + Math.random() * 7}px`;
      particleBox.appendChild(particle);
      window.setTimeout(() => particle.remove(), 900);
    }
  }
  $('#burstButton')?.addEventListener('click', event => {
    const rect = particleBox.getBoundingClientRect();
    createParticleBurst(event.clientX - rect.left, event.clientY - rect.top);
  });
  particleBox?.addEventListener('dblclick', event => {
    const rect = particleBox.getBoundingClientRect();
    createParticleBurst(event.clientX - rect.left, event.clientY - rect.top);
  });

  /* ---------- Calculator ---------- */
  const calcKeys = $('#calcKeys');
  const calcDisplay = $('#calcDisplay');
  const keys = ['C', '⌫', '%', '÷', '7', '8', '9', '×', '4', '5', '6', '−', '1', '2', '3', '+', '0', '.', '(', ')', '='];
  if (calcKeys) {
    keys.forEach(key => {
      const button = document.createElement('button');
      button.type = 'button';
      button.textContent = key;
      if ('÷×−+%'.includes(key)) button.className = 'operator';
      if (key === '=') button.className = 'equals';
      button.addEventListener('click', () => handleCalculator(key));
      calcKeys.appendChild(button);
    });
  }
  function handleCalculator(key) {
    if (!calcDisplay) return;
    let value = calcDisplay.value;
    if (key === 'C') calcDisplay.value = '0';
    else if (key === '⌫') calcDisplay.value = value.length > 1 ? value.slice(0, -1) : '0';
    else if (key === '=') {
      try {
        const expression = value.replaceAll('×', '*').replaceAll('÷', '/').replaceAll('−', '-');
        if (!/^[0-9+\-*/%.()\s]+$/.test(expression)) throw new Error('Invalid expression');
        const result = Function(`"use strict"; return (${expression})`)();
        calcDisplay.value = Number.isFinite(result) ? String(Math.round((result + Number.EPSILON) * 1000000) / 1000000) : 'Error';
      } catch (_) { calcDisplay.value = 'Error'; }
    } else {
      if (value === '0' || value === 'Error') value = '';
      calcDisplay.value = value + key;
    }
  }

  /* ---------- Typing speed test ---------- */
  const typingInput = $('#typingInput');
  const typingPrompt = $('#typingPrompt')?.textContent?.trim() || '';
  const typingTime = $('#typingTime');
  const typingWpm = $('#typingWpm');
  let typingStart = null;
  let typingTimer = null;
  function updateTypingStats() {
    if (!typingStart || !typingInput) return;
    const elapsed = (Date.now() - typingStart) / 1000;
    const words = typingInput.value.trim().length / 5;
    const wpm = elapsed > 0 ? Math.round(words / (elapsed / 60)) : 0;
    if (typingTime) typingTime.textContent = `${elapsed.toFixed(1)}s`;
    if (typingWpm) typingWpm.textContent = `${wpm} WPM`;
    if (typingInput.value === typingPrompt) {
      window.clearInterval(typingTimer);
      typingInput.style.borderColor = '#5be58b';
    }
  }
  typingInput?.addEventListener('input', () => {
    if (!typingStart) {
      typingStart = Date.now();
      typingTimer = window.setInterval(updateTypingStats, 100);
    }
    updateTypingStats();
  });
  $('#typingReset')?.addEventListener('click', () => {
    if (typingInput) { typingInput.value = ''; typingInput.style.borderColor = ''; }
    typingStart = null;
    window.clearInterval(typingTimer);
    if (typingTime) typingTime.textContent = '0.0s';
    if (typingWpm) typingWpm.textContent = '0 WPM';
  });

  /* ---------- Drawing canvas ---------- */
  const drawCanvas = $('#drawCanvas');
  const drawContext = drawCanvas?.getContext('2d');
  let drawing = false;
  function resizeDrawingCanvas() {
    if (!drawCanvas || !drawContext) return;
    const snapshot = drawCanvas.toDataURL();
    const rect = drawCanvas.getBoundingClientRect();
    const ratio = Math.min(window.devicePixelRatio || 1, 2);
    drawCanvas.width = rect.width * ratio;
    drawCanvas.height = rect.height * ratio;
    drawContext.setTransform(ratio, 0, 0, ratio, 0, 0);
    drawContext.lineWidth = 3;
    drawContext.lineCap = 'round';
    drawContext.lineJoin = 'round';
    drawContext.strokeStyle = getComputedStyle(root).getPropertyValue('--accent-2').trim() || '#00e5ff';
    if (snapshot && !snapshot.endsWith('AAAA')) {
      const image = new Image();
      image.onload = () => drawContext.drawImage(image, 0, 0, rect.width, rect.height);
      image.src = snapshot;
    }
  }
  function drawPoint(event) {
    if (!drawCanvas || !drawContext) return null;
    const rect = drawCanvas.getBoundingClientRect();
    return { x: event.clientX - rect.left, y: event.clientY - rect.top };
  }
  drawCanvas?.addEventListener('pointerdown', event => {
    const point = drawPoint(event);
    if (!point || !drawContext) return;
    drawing = true;
    drawCanvas.setPointerCapture(event.pointerId);
    drawContext.beginPath();
    drawContext.moveTo(point.x, point.y);
  });
  drawCanvas?.addEventListener('pointermove', event => {
    if (!drawing || !drawContext) return;
    const point = drawPoint(event);
    if (!point) return;
    drawContext.lineTo(point.x, point.y);
    drawContext.stroke();
  });
  const stopDrawing = () => { drawing = false; drawContext?.closePath(); };
  drawCanvas?.addEventListener('pointerup', stopDrawing);
  drawCanvas?.addEventListener('pointercancel', stopDrawing);
  $('#clearCanvas')?.addEventListener('click', () => drawContext?.clearRect(0, 0, drawCanvas.width, drawCanvas.height));
  resizeDrawingCanvas();
  window.addEventListener('resize', resizeDrawingCanvas);

  /* ---------- Contact form ---------- */
  const contactForm = $('#contactForm');
  const formStatus = $('#formStatus');
  contactForm?.addEventListener('submit', async event => {
    event.preventDefault();
    const submitButton = $('button[type="submit"]', contactForm);
    if (formStatus) formStatus.textContent = 'Sending message...';
    if (submitButton) submitButton.disabled = true;
    try {
      const response = await fetch(contactForm.action, { method: 'POST', body: new FormData(contactForm), headers: { 'X-Requested-With': 'XMLHttpRequest' } });
      const result = await response.json();
      if (!response.ok || !result.success) throw new Error(result.message || 'Unable to send message.');
      if (formStatus) { formStatus.textContent = result.message; formStatus.style.color = '#5be58b'; }
      contactForm.reset();
    } catch (error) {
      if (formStatus) { formStatus.textContent = error.message || 'Something went wrong.'; formStatus.style.color = '#ff7d7d'; }
    } finally {
      if (submitButton) submitButton.disabled = false;
    }
  });

  /* ---------- Easter eggs ---------- */
  const secretPanel = $('#secretPanel');
  const developerMode = $('#developerMode');
  let logoClicks = 0;
  let logoClickTimer;
  $('.logo')?.addEventListener('click', event => {
    logoClicks += 1;
    window.clearTimeout(logoClickTimer);
    logoClickTimer = window.setTimeout(() => { logoClicks = 0; }, 1800);
    if (logoClicks >= 5) {
      event.preventDefault();
      secretPanel?.classList.add('open');
      secretPanel?.setAttribute('aria-hidden', 'false');
      logoClicks = 0;
    }
  });
  $('.secret-panel > button')?.addEventListener('click', () => {
    secretPanel?.classList.remove('open');
    secretPanel?.setAttribute('aria-hidden', 'true');
  });

  const konami = ['ArrowUp','ArrowUp','ArrowDown','ArrowDown','ArrowLeft','ArrowRight','ArrowLeft','ArrowRight','b','a'];
  let konamiPosition = 0;
  window.addEventListener('keydown', event => {
    const expected = konami[konamiPosition];
    const received = event.key.length === 1 ? event.key.toLowerCase() : event.key;
    if (received === expected) {
      konamiPosition += 1;
      if (konamiPosition === konami.length) {
        developerMode?.classList.add('open');
        developerMode?.setAttribute('aria-hidden', 'false');
        konamiPosition = 0;
      }
    } else konamiPosition = received === konami[0] ? 1 : 0;
  });
  $('.developer-mode > button')?.addEventListener('click', () => {
    developerMode?.classList.remove('open');
    developerMode?.setAttribute('aria-hidden', 'true');
  });

  const rocket = $('#rocket');
  let rocketRunning = false;
  window.addEventListener('keydown', event => {
    const target = event.target;
    const typingField = target instanceof HTMLInputElement || target instanceof HTMLTextAreaElement;
    if (event.code === 'Space' && !typingField && !rocketRunning) {
      event.preventDefault();
      rocketRunning = true;
      rocket?.classList.remove('launch');
      void rocket?.offsetWidth;
      rocket?.classList.add('launch');
      window.setTimeout(() => { rocket?.classList.remove('launch'); rocketRunning = false; }, 1700);
    }
  });

  /* ---------- Idle bot ---------- */
  const idleBot = $('#idleBot');
  let idleTimer;
  function resetIdleTimer() {
    idleBot?.classList.remove('open');
    idleBot?.setAttribute('aria-hidden', 'true');
    window.clearTimeout(idleTimer);
    idleTimer = window.setTimeout(() => {
      idleBot?.classList.add('open');
      idleBot?.setAttribute('aria-hidden', 'false');
    }, 30000);
  }
  ['keydown', 'scroll', 'click', 'touchstart'].forEach(type => window.addEventListener(type, resetIdleTimer, { passive: true }));
  $('#idleBot button')?.addEventListener('click', resetIdleTimer);
  resetIdleTimer();

  /* ---------- Back to top ---------- */
  $('#backTop')?.addEventListener('click', () => window.scrollTo({ top: 0, behavior: prefersReduced ? 'auto' : 'smooth' }));
})();
