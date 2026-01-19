// ==================== 3D DESIGNER WEBSITE SCRIPT ====================

// Initialize AOS (Animate On Scroll)
AOS.init({
    duration: 800,
    offset: 100,
    once: false
});

// ==================== ADVANCED 3D SCENE WITH THREE.JS ====================
function init3DScene() {
    const container = document.getElementById('canvas-container');
    if (!container) return;

    // Scene setup
    const scene = new THREE.Scene();
    scene.background = new THREE.Color(0x0f0f1e);
    scene.fog = new THREE.Fog(0x0f0f1e, 10, 500);

    const camera = new THREE.PerspectiveCamera(
        75,
        container.clientWidth / container.clientHeight,
        0.1,
        1000
    );
    camera.position.z = 5;

    const renderer = new THREE.WebGLRenderer({
        antialias: true,
        alpha: true,
        precision: 'highp'
    });
    renderer.setSize(container.clientWidth, container.clientHeight);
    renderer.setPixelRatio(window.devicePixelRatio);
    renderer.shadowMap.enabled = true;
    renderer.shadowMap.type = THREE.PCFShadowShadowMap;
    container.appendChild(renderer.domElement);

    // ==================== CHARACTER HEAD (GLTF or fallback) ====================
    // headGroup will contain either the loaded GLTF or a procedural fallback head
    const headGroup = new THREE.Group();
    headGroup.position.set(0, 0, 0);
    headGroup.castShadow = true;
    headGroup.receiveShadow = true;
    scene.add(headGroup);

    // smoothing targets for head look (set by pointer) -----------------
    let headTargetRotX = 0;
    let headTargetRotY = 0;
    const headPupils = [];

    // Procedural fallback (stylized head) -----------------------------
    function createFallbackHead() {
        const skinMat = new THREE.MeshStandardMaterial({ color: 0xffe0cc, roughness: 0.6, metalness: 0 });
        const eyeWhite = new THREE.MeshStandardMaterial({ color: 0xffffff, roughness: 0.4 });
        const pupilMat = new THREE.MeshStandardMaterial({ color: 0x111111 });
        const hairMat = new THREE.MeshStandardMaterial({ color: 0x111111, roughness: 0.7 });

        const head = new THREE.Mesh(new THREE.SphereGeometry(1.05, 64, 64), skinMat);
        head.castShadow = true;
        head.receiveShadow = true;
        head.position.set(0, 0, 0);
        headGroup.add(head);

        // eyes
        const eyeL = new THREE.Mesh(new THREE.SphereGeometry(0.14, 16, 16), eyeWhite);
        const eyeR = eyeL.clone();
        eyeL.position.set(-0.32, 0.12, 0.92);
        eyeR.position.set(0.32, 0.12, 0.92);
        headGroup.add(eyeL, eyeR);

        const pupilL = new THREE.Mesh(new THREE.SphereGeometry(0.06, 12, 12), pupilMat);
        const pupilR = pupilL.clone();
        pupilL.position.set(-0.32, 0.12, 0.98);
        pupilR.position.set(0.32, 0.12, 0.98);
        headGroup.add(pupilL, pupilR);
        headPupils.push(pupilL, pupilR);

        // simple hair (cap)
        const hair = new THREE.Mesh(new THREE.SphereGeometry(1.07, 32, 32, 0, Math.PI * 2), hairMat);
        hair.scale.y = 0.65;
        hair.position.set(0, 0.25, 0);
        headGroup.add(hair);

        // neck
        const neck = new THREE.Mesh(new THREE.CylinderGeometry(0.35, 0.45, 0.6, 24), skinMat);
        neck.position.set(0, -1.05, 0);
        headGroup.add(neck);

        headGroup.scale.set(1.2, 1.2, 1.2);
    }

    // Try loading a GLTF head model; fallback if not available ----------
    function loadCharacterHead() {
        const modelPath = 'models/head.glb';

        if (typeof THREE.GLTFLoader !== 'undefined') {
            const loader = new THREE.GLTFLoader();
            loader.load(modelPath, (gltf) => {
                // scale & center
                const model = gltf.scene || gltf.scenes[0];
                model.traverse((n) => {
                    if (n.isMesh) {
                        n.castShadow = true;
                        n.receiveShadow = true;
                    }
                });
                model.scale.set(1.2, 1.2, 1.2);
                model.position.set(0, 0, 0);
                headGroup.add(model);
            }, undefined, (err) => {
                console.warn('GLTF load failed — using procedural head fallback', err);
                createFallbackHead();
            });
        } else {
            // GLTFLoader not available — use fallback
            createFallbackHead();
        }
    }

    loadCharacterHead();

    // ==================== PARTICLE SYSTEM ====================
    const particleCount = 300;
    const particlesGeometry = new THREE.BufferGeometry();
    const positions = new Float32Array(particleCount * 3);

    for (let i = 0; i < particleCount * 3; i += 3) {
        positions[i] = (Math.random() - 0.5) * 15;
        positions[i + 1] = (Math.random() - 0.5) * 15;
        positions[i + 2] = (Math.random() - 0.5) * 15;
    }

    particlesGeometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));

    const particlesMaterial = new THREE.PointsMaterial({
        color: 0x00d4ff,
        size: 0.05,
        sizeAttenuation: true,
        transparent: true,
        opacity: 0.6
    });

    const particles = new THREE.Points(particlesGeometry, particlesMaterial);
    scene.add(particles);

    // ==================== ADVANCED LIGHTING ====================

    // Main Light 1 - Cyan
    const light1 = new THREE.PointLight(0x00d4ff, 1.5, 100);
    light1.position.set(5, 5, 5);
    light1.castShadow = true;
    light1.shadow.mapSize.width = 2048;
    light1.shadow.mapSize.height = 2048;
    scene.add(light1);

    // Main Light 2 - Purple
    const light2 = new THREE.PointLight(0x7c3aed, 1.5, 100);
    light2.position.set(-5, -5, 5);
    light2.castShadow = true;
    light2.shadow.mapSize.width = 2048;
    light2.shadow.mapSize.height = 2048;
    scene.add(light2);

    // Main Light 3 - Pink
    const light3 = new THREE.PointLight(0xff006e, 1, 100);
    light3.position.set(0, 8, -5);
    light3.castShadow = true;
    light3.shadow.mapSize.width = 2048;
    light3.shadow.mapSize.height = 2048;
    scene.add(light3);

    // Ambient Light
    const ambientLight = new THREE.AmbientLight(0xffffff, 0.4);
    scene.add(ambientLight);

    // Directional Light
    const directionalLight = new THREE.DirectionalLight(0xffffff, 0.5);
    directionalLight.position.set(0, 10, 10);
    directionalLight.castShadow = true;
    scene.add(directionalLight);

    // ==================== MOUSE INTERACTION ====================
    let mouseX = 0;
    let mouseY = 0;
    let targetRotationX = 0;
    let targetRotationY = 0;

    document.addEventListener('mousemove', (e) => {
        mouseX = (e.clientX / window.innerWidth) * 2 - 1;
        mouseY = -(e.clientY / window.innerHeight) * 2 + 1;

        targetRotationY = mouseX * 0.5;
        targetRotationX = mouseY * 0.5;

        // head target (smoother, smaller range)
        headTargetRotY = mouseX * 0.45;
        headTargetRotX = mouseY * 0.35;
    });

    // ==================== ANIMATION LOOP ====================
    function animate() {
        requestAnimationFrame(animate);

        // Head follow: smooth look based on pointer
        if (headGroup) {
            headGroup.rotation.x += (headTargetRotX - headGroup.rotation.x) * 0.08;
            headGroup.rotation.y += (headTargetRotY - headGroup.rotation.y) * 0.08;
            headGroup.position.y += (Math.sin(Date.now() * 0.0008) * 0.12 - headGroup.position.y) * 0.05; // subtle bob

            // pupils follow (if present)
            if (headPupils.length) {
                headPupils.forEach((pupil, i) => {
                    const px = (i === 0 ? -0.32 : 0.32) + mouseX * 0.08;
                    const py = 0.12 + mouseY * -0.04;
                    pupil.position.x += (px - pupil.position.x) * 0.12;
                    pupil.position.y += (py - pupil.position.y) * 0.12;
                });
            }
        }


        // Particle animation
        particles.rotation.x += 0.0001;
        particles.rotation.y += 0.0003;

        // Dynamic light animation
        light1.position.x = Math.sin(Date.now() * 0.0005) * 8;
        light1.position.y = Math.cos(Date.now() * 0.0004) * 8;

        light2.position.x = Math.cos(Date.now() * 0.0006) * 8;
        light2.position.y = Math.sin(Date.now() * 0.0005) * 8;

        light3.position.x = Math.sin(Date.now() * 0.0004) * 6;
        light3.position.z = Math.cos(Date.now() * 0.0003) * 6;

        renderer.render(scene, camera);
    }

    animate();

    // Handle resize
    window.addEventListener('resize', () => {
        const width = container.clientWidth;
        const height = container.clientHeight;
        camera.aspect = width / height;
        camera.updateProjectionMatrix();
        renderer.setSize(width, height);
    });
}

// Initialize 3D scene when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    init3DScene();

    // ==================== INTERACTIVE VISUAL EFFECTS ====================

    // Add glow effect tracking to cards
    const cards = document.querySelectorAll('.service-card, .feature-card, .pricing-card, .team-member');

    cards.forEach(card => {
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;

            card.style.setProperty('--mouse-x', `${x}px`);
            card.style.setProperty('--mouse-y', `${y}px`);
        });

        card.addEventListener('mouseleave', () => {
            card.style.setProperty('--mouse-x', '50%');
            card.style.setProperty('--mouse-y', '50%');
        });
    });

    // ==================== INTERSECTION OBSERVER FOR SCROLL ANIMATIONS ====================

    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
                entry.target.classList.add('in-view');
            }
        });
    }, observerOptions);

    cards.forEach(card => {
        card.style.opacity = '0.5';
        card.style.transform = 'translateY(20px)';
        observer.observe(card);
    });

    // ==================== PARALLAX EFFECT ====================

    const parallaxElements = document.querySelectorAll('[data-parallax]');

    window.addEventListener('scroll', () => {
        parallaxElements.forEach(el => {
            const scrollPosition = window.scrollY;
            const elementPosition = el.offsetTop;
            const distance = elementPosition - scrollPosition;

            if (distance > -500 && distance < window.innerHeight) {
                const parallaxValue = distance * 0.5;
                el.style.transform = `translateY(${parallaxValue}px)`;
            }
        });
    });

    // ==================== ACTIVE NAVIGATION LINK ====================

    const updateActiveLink = () => {
        const sections = document.querySelectorAll('section[id]');
        const navLinks = document.querySelectorAll('.nav-menu a');

        let current = '';

        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            if (scrollY >= sectionTop - 200) {
                current = section.getAttribute('id');
            }
        });

        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href').slice(1) === current) {
                link.classList.add('active');
            }
        });
    };

    window.addEventListener('scroll', updateActiveLink);

    // ==================== LAZY LOADING IMAGES ====================

    const imageElements = document.querySelectorAll('img[data-src]');

    const imageObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.classList.add('loaded');
                imageObserver.unobserve(img);
            }
        });
    }, {
        rootMargin: '50px'
    });

    imageElements.forEach(img => imageObserver.observe(img));

    // ==================== HAMBURGER MENU ====================

    const navToggle = document.querySelector('.nav-toggle');
    const navMenu = document.querySelector('.nav-menu');

    if (navToggle) {
        navToggle.addEventListener('click', () => {
            navMenu.classList.toggle('active');
            navToggle.classList.toggle('active');
        });

        document.querySelectorAll('.nav-menu a').forEach(link => {
            link.addEventListener('click', () => {
                navMenu.classList.remove('active');
                navToggle.classList.remove('active');
            });
        });
    }
});

// ==================== NAVIGATION SCROLL ==================== 
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        const href = this.getAttribute('href');
        if (href === '#' || !document.querySelector(href)) return;

        e.preventDefault();
        document.querySelector(href).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

// ==================== CONTACT FORM ==================== 
const contactForm = document.getElementById('contact-form');
if (contactForm) {
    contactForm.addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);
        const data = {
            name: formData.get('name'),
            email: formData.get('email'),
            phone: formData.get('phone'),
            service: formData.get('service'),
            budget: formData.get('budget'),
            message: formData.get('message')
        };

        // WhatsApp message
        const whatsappMessage = `
*طلب مشروع جديد*

الاسم: ${data.name}
البريد الإلكتروني: ${data.email}
الهاتف: ${data.phone}
الخدمة: ${data.service}
الميزانية: ${data.budget}
التفاصيل: ${data.message}
    `.trim();

        const whatsappPhone = '201001234567'; // استبدل برقمك
        const encodedMessage = encodeURIComponent(whatsappMessage);
        const whatsappUrl = `https://wa.me/${whatsappPhone}?text=${encodedMessage}`;

        window.open(whatsappUrl, '_blank');
        showNotification('تم توجيهك إلى WhatsApp! يرجى إرسال رسالتك.', 'success');
        this.reset();
    });
}

// ==================== NOTIFICATION SYSTEM ==================== 
function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.textContent = message;

    const styles = `
    position: fixed;
    bottom: 20px;
    right: 20px;
    padding: 1rem 1.5rem;
    background: ${type === 'success' ? 'rgba(0, 212, 255, 0.2)' : 'rgba(124, 58, 237, 0.2)'};
    border: 2px solid ${type === 'success' ? '#00d4ff' : '#7c3aed'};
    color: ${type === 'success' ? '#00d4ff' : '#7c3aed'};
    border-radius: 8px;
    font-weight: 600;
    z-index: 10000;
    animation: slideInUp 0.3s ease;
    backdrop-filter: blur(10px);
    font-family: 'Poppins', sans-serif;
  `;

    notification.style.cssText = styles;
    document.body.appendChild(notification);

    setTimeout(() => {
        notification.style.animation = 'slideOutDown 0.3s ease';
        setTimeout(() => notification.remove(), 300);
    }, 3000);
}

// ==================== ANIMATIONS ==================== 
const style = document.createElement('style');
style.textContent = `
  @keyframes slideInUp {
    from {
      opacity: 0;
      transform: translateY(30px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
  
  @keyframes slideOutDown {
    from {
      opacity: 1;
      transform: translateY(0);
    }
    to {
      opacity: 0;
      transform: translateY(30px);
    }
  }

  @keyframes glow {
    0%, 100% {
      box-shadow: 0 0 10px rgba(0, 212, 255, 0.4);
    }
    50% {
      box-shadow: 0 0 30px rgba(0, 212, 255, 0.8);
    }
  }
`;
document.head.appendChild(style);

// ==================== MOUSE FOLLOW EFFECT ==================== 
document.addEventListener('mousemove', (e) => {
    const moveX = e.clientX - window.innerWidth / 2;
    const moveY = e.clientY - window.innerHeight / 2;

    const parallaxElements = document.querySelectorAll('[data-parallax]');
    parallaxElements.forEach(el => {
        const depth = el.dataset.parallax || 10;
        el.style.transform = `translate(${moveX / depth}px, ${moveY / depth}px)`;
    });
});

// ==================== SCROLL ANIMATIONS ==================== 
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -100px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, observerOptions);

document.querySelectorAll('.feature-card, .service-card, .pricing-card, .team-member').forEach(el => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(20px)';
    el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
    observer.observe(el);
});

// ==================== MOBILE MENU ==================== 
function handleMobileMenu() {
    const navbar = document.querySelector('.navbar');
    const navMenu = document.querySelector('.nav-menu');

    // Add hamburger menu for mobile
    if (window.innerWidth <= 768 && !document.querySelector('.hamburger')) {
        const hamburger = document.createElement('button');
        hamburger.className = 'hamburger';
        hamburger.innerHTML = '☰';
        hamburger.style.cssText = `
      display: none;
      background: none;
      border: none;
      color: #00d4ff;
      font-size: 1.5rem;
      cursor: pointer;
      z-index: 101;
    `;

        navbar.querySelector('.navbar-container').appendChild(hamburger);

        hamburger.addEventListener('click', () => {
            navMenu.style.display = navMenu.style.display === 'none' ? 'flex' : 'none';
        });
    }
}

handleMobileMenu();
window.addEventListener('resize', handleMobileMenu);

// ==================== LAZY LOAD IMAGES ==================== 
function lazyLoadImages() {
    const images = document.querySelectorAll('img[data-src]');

    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.removeAttribute('data-src');
                    imageObserver.unobserve(img);
                }
            });
        });

        images.forEach(img => imageObserver.observe(img));
    }
}

lazyLoadImages();

// ==================== ACTIVE NAV LINK ==================== 
window.addEventListener('scroll', () => {
    const sections = document.querySelectorAll('section[id]');

    sections.forEach(current => {
        const sectionId = current.getAttribute('id');
        const navLink = document.querySelector(`.nav-menu a[href="#${sectionId}"]`);

        if (!navLink) return;

        const sectionTop = current.offsetTop;
        const sectionHeight = current.clientHeight;

        if (scrollY >= sectionTop - 200 && scrollY < sectionTop + sectionHeight - 200) {
            navLink.style.color = '#00d4ff';
        } else {
            navLink.style.color = '#e0e0e0';
        }
    });
});

// ==================== SMOOTH SCROLL TRANSITIONS ====================

// Smooth scroll for navigation links
document.querySelectorAll('a[href^="#"]').forEach(link => {
    link.addEventListener('click', (e) => {
        const href = link.getAttribute('href');
        if (href === '#' || !document.querySelector(href)) return;

        e.preventDefault();
        const target = document.querySelector(href);

        target.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });

        // Close mobile menu if open
        const navMenu = document.querySelector('.nav-menu');
        const navToggle = document.querySelector('.nav-toggle');
        if (navMenu && navMenu.classList.contains('active')) {
            navMenu.classList.remove('active');
            navToggle.classList.remove('active');
        }
    });
});

// ==================== SECTION TRANSITION ANIMATIONS ====================

const allSections = document.querySelectorAll('section');

const sectionObserverOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const sectionObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.pointerEvents = 'auto';
        }
    });
}, sectionObserverOptions);

allSections.forEach(section => {
    sectionObserver.observe(section);
});

console.log('3D Designer Website Loaded Successfully ✓');