<?php

class HomeSection {

    public function render() {

        return "<section id='home' class='hero-header'>

    <div class='socials-icons'>

        <a href='https://www.instagram.com/cheeeessecccake/'><i class='fab fa-instagram'></i></a>

        <a href='https://www.linkedin.com/in/maria-cheska-j-213805202/'><i class='fab fa-linkedin-in'></i></a>

        <a href='https://github.com/cheeeseccake'><i class='fab fa-github'></i></a>

    </div>

    <div class='hero-content'>

<h1 style=\"font-family: 'Delius Swash Caps', sans-serif;\">Hello I'm Cheska <i class='fas fa-hand-paper wave'></i></h1>

            <p id='role' class='role'>Front-End & Web Developer | IT Support Specialist</p>

            <blockquote class='quote'>I combine technical knowledge and problem-solving skills to build smooth, user-friendly digital experiences.</blockquote>

    <a href='#contact' class='btn'>Contact Info</a>

    <a href='/resume.pdf' download class='btn'>Download CV <i class='fas fa-file-pdf'></i></a>

</div>

    </div>

    <div class='avatar-container'>

        <img src='avatar.jpg' alt='Portrait of Maria Cheska' class='avatar'>

    </div>

</section>";

    }

}
