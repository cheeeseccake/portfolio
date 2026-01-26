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
  ABOUT_SECTION: '.about-section',
  ROLE: '#role'
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
  const role = document.querySelector(SELECTORS.ROLE);

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

  // Experience tags interaction
  const tagButtons = document.querySelectorAll('.tag-btn');
  const stackedCards = document.querySelectorAll('.stacked-card');

  tagButtons.forEach(button => {
    button.addEventListener('click', () => {
      const cardIndex = button.getAttribute('data-card');

      // Remove active from all tags
      tagButtons.forEach(btn => removeClass(btn, 'active'));
      // Add active to clicked
      addClass(button, 'active');

      // Fold all cards
      stackedCards.forEach(card => {
        addClass(card, 'folded');
        removeClass(card, 'unfolded');
        card.style.display = 'none';
      });
      
      function filterCards(filter, btn) {
          const filterButtons = document.querySelectorAll('.filter-btn');
          const cards = document.querySelectorAll('.experience-card');
          filterButtons.forEach(b => b.classList.remove('active'));
          btn.classList.add('active');
          cards.forEach(card => {
              if (filter === 'all' || card.dataset.type === filter) {
                  card.style.display = 'block';
              } else {
                  card.style.display = 'none';
              }
          });
          stackCards();
      }
      
      function toggleCard(card) {
          card.classList.toggle('expanded');
      }
      
      function stackCards() {
          const visibleCards = document.querySelectorAll('.stacked-card[style*="display: block"]');
          visibleCards.forEach((card, index) => {
              const offsetY = index * 15;
              const rotate = index * 3;
              const zIndex = 10 - index;
              card.style.transform = `translateX(-50%) translateY(${offsetY}px) rotate(${rotate}deg)`;
              card.style.zIndex = zIndex;
          });
      }
      
      stackCards();

      // Unfold selected card
      if (stackedCards[cardIndex]) {
        setTimeout(() => {
          removeClass(stackedCards[cardIndex], 'folded');
          addClass(stackedCards[cardIndex], 'unfolded');
          stackedCards[cardIndex].style.display = 'block';
        }, 200);
      }
    });
  });

  // Initially hide all cards and unfold the card for 2017 (card 3)
  stackedCards.forEach(card => {
    card.style.display = 'none';
  });
  if (stackedCards[3]) {
    removeClass(stackedCards[3], 'folded');
    addClass(stackedCards[3], 'unfolded');
    stackedCards[3].style.display = 'block';
  }

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

  // Apply typing effect for role after main title
  setTimeout(() => {
    if (role) {
      role.style.opacity = '1';
      const originalText = role.textContent;
      typeWriter(role, originalText, 60);
    }
  }, 1500);


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
