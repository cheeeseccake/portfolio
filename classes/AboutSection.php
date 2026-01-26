<?php

class AboutSection {

    public function render() {

        return "<section id='about' class='about-section'>

    <div class='about-container'>

        <div class='portrait-container'>

            <img src='aboutme.jpg' alt='Portrait of Maria Cheska' class='portrait'>

        </div>

        <div class='content-container'>

            <h1>About Me</h1>

            <p>I'm a dedicated professional transitioning into web development. I have hands-on experience in <strong>HTML</strong>, <strong>CSS</strong>, <strong>JavaScript</strong>, <strong>PHP</strong>, and <strong>MySQL</strong>, and I bring strong problem-solving skills from my Technical support and customer service experience. I focus on building efficient, user-friendly websites while providing technical support solutions.</p>

            <div class='skills-marquee'>

                <div class='skills-list'>

                    <div class='skill-badge'>

                        <i class='fab fa-html5'></i>

                        <span>HTML</span>

                    </div>

                    <div class='skill-badge'>

                        <i class='fab fa-css3-alt'></i>

                        <span>CSS</span>

                    </div>

                    <div class='skill-badge'>

                        <i class='fab fa-js-square'></i>

                        <span>JavaScript</span>

                    </div>

                    <div class='skill-badge'>

                        <i class='fab fa-php'></i>

                        <span>PHP</span>

                    </div>

                    <div class='skill-badge'>

                        <i class='fas fa-database'></i>

                        <span>MySQL</span>

                    </div>

                    <!-- Duplicate for seamless loop -->

                    <div class='skill-badge'>

                        <i class='fab fa-html5'></i>

                        <span>HTML</span>

                    </div>

                    <div class='skill-badge'>

                        <i class='fab fa-css3-alt'></i>

                        <span>CSS</span>

                    </div>

                    <div class='skill-badge'>

                        <i class='fab fa-js-square'></i>

                        <span>JavaScript</span>

                    </div>

                    <div class='skill-badge'>

                        <i class='fab fa-php'></i>

                        <span>PHP</span>

                    </div>

                    <div class='skill-badge'>

                        <i class='fas fa-database'></i>

                        <span>MySQL</span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>";

    }

}