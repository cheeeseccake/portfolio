<?php

class ContactSection {

    public function render() {

        return "<section id='contact' class='contact-section'>

    <div class='container'>

        <h2>Contact</h2>

        <div class='contact-grid'>

            <div class='contact-info'>

                <a href='tel:0994-181-3832' class='contact-item'>

                    <i class='fas fa-phone'></i>

                    <span>0994-181-3832</span>

                </a>

                <a href='mailto:jalotjot.cheska@icloud.com' class='contact-item'>

                    <i class='fas fa-envelope'></i>

                    <span>jalotjot.cheska@icloud.com</span>

                </a>

                <div class='contact-item'>

                    <i class='fas fa-map-marker-alt'></i>

                    <span>Block 28 Lot 11, Phase 6C<br>Barangay Gaya-gaya San Jose del Monte, Bulacan</span>

                </div>

           

            </div>

            <form class='contact-form' action='#' method='post'>

                <div class='form-container'>

                    <h3>Send a Message</h3>

                    <div class='message-container'>

                        <div id='message-box' class='message-box'></div>

                    </div>

                    <div class='form-group'>

                        <label for='name'>Name</label>

                        <input type='text' id='name' name='name' required>

                    </div>

                    <div class='form-group'>

                        <label for='email'>Email</label>

                        <input type='email' id='email' name='email' required>

                    </div>

                    <div class='form-group'>

                        <label for='message'>Message</label>

                        <textarea id='message' name='message' required></textarea>

                    </div>

                    <button type='submit' class='btn'>Send Message</button>

                </div>

            </form>

        </div>

    </div>

    </div>

          <div class='social-links'>

                    <a href='https://www.instagram.com/cheeeessecccake/' target='_blank'><i class='fab fa-instagram'></i></a>

                    <a href='https://www.linkedin.com/in/maria-cheska-j-213805202/' target='_blank'><i class='fab fa-linkedin-in'></i></a>

                    <a href='https://github.com/cheeeseccake' target='_blank'><i class='fab fa-github'></i></a>

                </div>

</section>";

    }

}