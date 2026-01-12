// Constants for selectors and strings
const SELECTORS = {
  SCROLL_BTN: '.scroll-btn',
  NAV_BTN: '.nav-btn',
  EXPLORE_BTN: '.primary-btn',
  DOWNLOAD_BTN: '.secondary-btn',
  SCROLL_INDICATOR: '.scroll-indicator',
  PROFILE_IMAGE: '.profile-image',
  ANIMATED_ELEMENTS: '.text-content, .profile-section',
  MAIN_TITLE: '.main-title',
  ABOUT_SECTION: '.about-section'
};

const STRINGS = {
  SCROLL_DOWN: 'Scroll down <i class="ph-bold ph-arrow-bend-right-down"></i>',
  SCROLL_UP: 'Scroll up <i class="ph-bold ph-arrow-up"></i>',
  EXPLORE_ALERT: 'Exploring Maria\'s work portfolio!',
  DOWNLOAD_ALERT: 'CV download initiated!'
};

const ANIMATION_CLASSES = {
  VISIBLE: 'visible'
};

// Utility functions
function debounce(func, wait) {
  let timeout;
  return function executedFunction(...args) {
    const later = () => {
      clearTimeout(timeout);
      func(...args);
    };
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
  };
}

function addClass(element, className) {
  if (element) element.classList.add(className);
}

function removeClass(element, className) {
  if (element) element.classList.remove(className);
}

function toggleClass(element, className) {
  if (element) element.classList.toggle(className);
}


// Main initialization
document.addEventListener('DOMContentLoaded', function() {
  // Cache DOM elements
  const navButtons = document.querySelectorAll(SELECTORS.NAV_BTN);
  const exploreBtn = document.querySelector(SELECTORS.EXPLORE_BTN);
  const downloadBtn = document.querySelector(SELECTORS.DOWNLOAD_BTN);
  const scrollIndicator = document.querySelector(SELECTORS.SCROLL_INDICATOR);
  const profileImage = document.querySelector(SELECTORS.PROFILE_IMAGE);
  const animatedElements = document.querySelectorAll(SELECTORS.ANIMATED_ELEMENTS);
  const mainTitle = document.querySelector(SELECTORS.MAIN_TITLE);
  const aboutSection = document.querySelector(SELECTORS.ABOUT_SECTION);

  // Scroll button functionality removed

  // Navigation functionality
  navButtons.forEach(button => {
    button.addEventListener('click', function() {
      // Remove active class from all buttons
      navButtons.forEach(btn => removeClass(btn, 'active'));

      // Add active class to clicked button
      addClass(this, 'active');

      // Get the section name
      const section = this.getAttribute('data-section');
      console.log(`Navigating to ${section} section`);
      // Additional navigation logic can be added here
    });
  });

  // Action buttons functionality
  if (exploreBtn) {
    exploreBtn.addEventListener('click', function() {
      console.log('Exploring work...');
      alert(STRINGS.EXPLORE_ALERT);
    });
  }

  if (downloadBtn) {
    downloadBtn.addEventListener('click', function() {
      console.log('Downloading CV...');
      alert(STRINGS.DOWNLOAD_ALERT);
    });
  }

  // Scroll indicator functionality removed

  // Profile image hover effects
  if (profileImage) {
    profileImage.addEventListener('mouseenter', function() {
      this.style.transform = 'scale(1.05)';
      this.style.transition = 'transform 0.3s ease';
    });

    profileImage.addEventListener('mouseleave', function() {
      this.style.transform = 'scale(1)';
    });
  }

  // Animate elements on scroll
  const animateOnScroll = debounce(() => {
    animatedElements.forEach(element => {
      const elementTop = element.getBoundingClientRect().top;
      const elementVisible = 150;

      if (elementTop < window.innerHeight - elementVisible) {
        addClass(element, ANIMATION_CLASSES.VISIBLE);
      }
    });
  }, 16); // ~60fps

  // Initial setup for animation
  animatedElements.forEach(element => {
    element.style.opacity = '0';
    element.style.transform = 'translateY(30px)';
    element.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
  });

  // Trigger animation on load
  setTimeout(() => {
    animateOnScroll();
  }, 100);

  // Trigger animation on scroll
  window.addEventListener('scroll', animateOnScroll);

  // Typing effect for main title
  function typeWriter(element, text, speed = 100) {
    if (!element) return;
    let i = 0;
    element.innerHTML = '';

    function type() {
      if (i < text.length) {
        element.innerHTML += text.charAt(i);
        i++;
        setTimeout(type, speed);
      }
    }

    type();
  }

  // Apply typing effect after a short delay
  setTimeout(() => {
    if (mainTitle) {
      const originalText = mainTitle.textContent;
      typeWriter(mainTitle, originalText, 80);
    }
  }, 500);


  // Scroll button
  const scrollBtn = document.getElementById('scroll-btn');
  let hideTimer;
  const scrollThreshold = 50;

  function updateButton() {
      const scrollY = window.scrollY;
      const totalHeight = document.documentElement.scrollHeight;
      const windowHeight = window.innerHeight;

      clearTimeout(hideTimer);

      if (scrollY < scrollThreshold) {
          // Near top, show ↓
          scrollBtn.innerHTML = '↓';
          scrollBtn.classList.add('show');
      } else if (scrollY > totalHeight - windowHeight - scrollThreshold) {
          // Near bottom, show ↑
          scrollBtn.innerHTML = '↑';
          scrollBtn.classList.add('show');
      } else {
          // Middle, hide
          scrollBtn.classList.remove('show');
      }

      // Auto-hide after 2 seconds of inactivity
      hideTimer = setTimeout(() => {
          scrollBtn.classList.remove('show');
      }, 2000);
  }

  window.addEventListener('scroll', updateButton);

  scrollBtn.addEventListener('click', () => {
      if (scrollBtn.innerHTML === '↓') {
          window.scrollTo({ top: document.documentElement.scrollHeight, behavior: 'smooth' });
      } else {
          window.scrollTo({ top: 0, behavior: 'smooth' });
      }
  });

  // Contact form submission
  const contactForm = document.querySelector('.contact-form');
  const messageBox = document.getElementById('message-box');
  if (contactForm && messageBox) {
    contactForm.addEventListener('submit', (e) => {
      e.preventDefault();
      // Simple form handling - in real app, send to server
      messageBox.textContent = 'Thank you for your message! We will get back to you soon.';
      messageBox.className = 'message-box success';
      messageBox.style.display = 'block';
      contactForm.reset();
      setTimeout(() => {
        messageBox.style.display = 'none';
      }, 5000);
    });
  }
});
