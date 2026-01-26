<?php

require_once 'Header.php';

require_once 'HomeSection.php';

require_once 'AboutSection.php';

require_once 'ExperienceSection.php';

require_once 'ProjectsSection.php';

require_once 'SkillsSection.php';

require_once 'ContactSection.php';

class Portfolio {

    private $title = "My Portfolio";

    private $header;

    private $sections = [];

    public function __construct() {

        $this->header = new Header();

        $this->sections[] = new HomeSection();

        $this->sections[] = new AboutSection();

        $this->sections[] = new ExperienceSection();

        $this->sections[] = new ProjectsSection();

        $this->sections[] = new SkillsSection();

        $this->sections[] = new ContactSection();

    }

    public function render() {

        $html = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><meta name='viewport' content='width=device-width, initial-scale=1.0'><title>{$this->title}</title>";

        $html .= "<link rel='stylesheet' href='assets/fontawesome-free-7.1.0-web/css/all.min.css'>";

        $html .= "<link href='https://fonts.googleapis.com/css2?family=Delius+Swash+Caps&family=Comic+Neue:wght@400;700&display=swap' rel='stylesheet'>";

        $html .= "<script src='https://cdn.tailwindcss.com'></script>";

        $html .= "<link rel='stylesheet' href='style.css'>";

        $html .= "<style>@font-face { font-family: 'Delius'; src: url('assets/fonts/delius.woff2') format('woff2'); } @font-face { font-family: 'EB Garamond'; src: url('assets/fonts/ebgaramond.woff2') format('woff2'); } @font-face { font-family: 'Margarine'; src: url('assets/fonts/margarine.woff2') format('woff2'); }</style>";

        $html .= "</head><body>";

        $html .= $this->header->render();

        foreach ($this->sections as $section) {

            $html .= $section->render();

        }

        $html .= "<div class='scroll-buttons'><button id='scroll-btn' class='scroll-btn'>↓</button></div>";

        $html .= "<script>" . $this->getJS() . "</script></body></html>";

        return $html;

    }

    private function getJS() {

        $js = file_get_contents('script.js');

        $js .= "

document.addEventListener('DOMContentLoaded', function() {

  const carousel = document.querySelector('.carousel-inner');

  const prevBtn = document.querySelector('.carousel-btn.prev');

  const nextBtn = document.querySelector('.carousel-btn.next');

  if (!carousel || !prevBtn || !nextBtn) return;

  const cards = carousel.children;

  const visibleCards = 4;

  const cardWidth = 220;

  let currentIndex = 0;

  function updateCarousel() {

    carousel.style.transform = `translateX(\${-currentIndex * cardWidth}px)`;

    prevBtn.disabled = currentIndex === 0;

    nextBtn.disabled = currentIndex >= cards.length - visibleCards;

    prevBtn.style.opacity = prevBtn.disabled ? '0.5' : '1';

    nextBtn.style.opacity = nextBtn.disabled ? '0.5' : '1';

  }

  prevBtn.addEventListener('click', () => {

    if (currentIndex > 0) {

      currentIndex--;

      updateCarousel();

    }

  });

  nextBtn.addEventListener('click', () => {

    if (currentIndex < cards.length - visibleCards) {

      currentIndex++;

      updateCarousel();

    }

  });

  updateCarousel();

});

// 3D Rotating Carousel for Projects
document.addEventListener('DOMContentLoaded', function() {
 const wrapper = document.querySelector('.wrapper');
 const inner = document.querySelector('.inner');
 const cards = document.querySelectorAll('.card');

 if (!wrapper || !inner || cards.length === 0) return;

 // Dynamic content loading
 cards.forEach(function(card, index) {
   const img = card.querySelector('.img');
   const title = card.querySelector('.content h3');
   const desc = card.querySelector('.content p');
   const link = card.querySelector('.content a');

   const dataTitle = card.getAttribute('data-title');
   const dataDesc = card.getAttribute('data-desc');
   const dataImg = card.getAttribute('data-img');
   const dataLink = card.getAttribute('data-link');

   if (img && dataImg) {
     img.style.backgroundImage = 'url(\'' + dataImg + '\')';
   }
   if (title && dataTitle) {
     title.textContent = dataTitle;
   }
   if (desc && dataDesc) {
     desc.textContent = dataDesc;
   }
   if (link && dataLink) {
     link.href = dataLink;
     link.setAttribute('aria-label', 'View ' + dataTitle + ' project');
   }

   // Accessibility
   card.setAttribute('tabindex', '0');
   card.setAttribute('aria-label', dataTitle + ': ' + dataDesc);
   card.setAttribute('role', 'button');
 });

 // Keyboard navigation
 let currentRotation = 0;
 const rotationStep = 360 / cards.length;

 function rotateCarousel(direction) {
   currentRotation += direction * rotationStep;
   inner.style.transform = 'perspective(var(--perspective)) rotateX(var(--rotateX)) rotateY(' + currentRotation + 'deg)';
 }

 wrapper.addEventListener('keydown', function(e) {
   if (e.key === 'ArrowLeft') {
     e.preventDefault();
     rotateCarousel(-1);
   } else if (e.key === 'ArrowRight') {
     e.preventDefault();
     rotateCarousel(1);
   } else if (e.key === ' ') {
     e.preventDefault();
     inner.style.animationPlayState = inner.style.animationPlayState === 'paused' ? 'running' : 'paused';
   }
 });

 // Focus management
 cards.forEach(card => {
   card.addEventListener('keydown', function(e) {
     if (e.key === 'Enter' || e.key === ' ') {
       e.preventDefault();
       const link = card.querySelector('.content a');
       if (link) link.click();
     }
   });
 });

 // Pause on focus
 wrapper.addEventListener('focusin', function() {
   inner.style.animationPlayState = 'paused';
 });

 wrapper.addEventListener('focusout', function() {
   inner.style.animationPlayState = 'running';
 });

 // Customizable speed (example: add buttons or controls if needed)
 // For now, speed is set via CSS variable --animation-duration
});

";

        return $js;

    }

}