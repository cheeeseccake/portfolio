<?php

class ExperienceSection {

    public function render() {

        return "<style>
:root {
  --color-card: 75, 46, 36;
}

.wrapper {
  width: 100%;
  height: 100%;
  position: relative;
  text-align: center;
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
}

.inner {
  --w: 100px;
  --h: 150px;
  --translateZ: calc((var(--w) + var(--h)) + 0px);
  --rotateX: -15deg;
  --perspective: 1000px;
  position: absolute;
  width: var(--w);
  height: var(--h);
  top: 25%;
  left: calc(50% - (var(--w) / 2) - 2.5px);
  z-index: 2;
  transform-style: preserve-3d;
  transform: perspective(var(--perspective));
  animation: rotating 20s linear infinite; /* */
}
@keyframes rotating {
  from {
    transform: perspective(var(--perspective)) rotateX(var(--rotateX))
      rotateY(0);
  }
  to {
    transform: perspective(var(--perspective)) rotateX(var(--rotateX))
      rotateY(1turn);
  }
}

.card {
  position: absolute;
  border: 2px solid rgba(var(--color-card));
  border-radius: 12px;
  overflow: hidden;
  inset: 0;
  transform: rotateY(calc((360deg / var(--quantity)) * var(--index)))
    translateZ(var(--translateZ));
}

.img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  background: #0000
    radial-gradient(
      circle,
      rgba(var(--color-card), 0.2) 0%,
      rgba(var(--color-card), 0.6) 80%,
      rgba(var(--color-card), 0.9) 100%
    );
}
</style><section id='experience' class='experience-section'>

    <div class='container'>

        <h2>Experience & Education</h2>

        <div class='experience-filters'>

            <button class='filter-btn active' data-filter='all' onclick=\"filterCards('all', this)\">All</button>

            <button class='filter-btn' data-filter='work' onclick=\"filterCards('work', this)\">Work Experience</button>

            <button class='filter-btn' data-filter='education' onclick=\"filterCards('education', this)\">Education</button>

        </div>

        <div class='wrapper'>

            <div class='inner' style='--quantity: 5;'>

                <div class='card' style='--index: 0;' data-type='work'>

                    <div class='img'>

                        <div class='card-header'>

                            <div class='card-icon'><i class='fas fa-building'></i></div>

                            <div class='card-title'>

                                <h4>Concentrix Philippines</h4>

                                <p class='job-title'>Chat Support Representative</p>

                                <p class='dates'>October 2021 – March 2022</p>

                            </div>

                        </div>

                        <div class='card-details'>

                            <ul>

                                <li>Handles chat support for Nike retail account.</li>

                                <li>Provides order status updates and troubleshooting assistance for Nike accounts.</li>

                                <li>Ensures accurate and timely customer resolutions with high satisfaction ratings.</li>

                            </ul>

                        </div>

                    </div>

                </div>

                <div class='card' style='--index: 1;' data-type='work'>

                    <div class='img'>

                        <div class='card-header'>

                            <div class='card-icon'><i class='fas fa-building'></i></div>

                            <div class='card-title'>

                                <h4>IQOR Philippines</h4>

                                <p class='job-title'>Technical Support Representative</p>

                                <p class='dates'>June 2019 – November 2020</p>

                            </div>

                        </div>

                        <div class='card-details'>

                            <ul>

                                <li>Assisted AT&T customers with cable and internet troubleshooting.</li>

                                <li>Resolved connectivity and billing issues efficiently.</li>

                                <li>Upsold eligible product upgrades to enhance service packages.</li>

                            </ul>

                        </div>

                    </div>

                </div>

                <div class='card' style='--index: 2;' data-type='work'>

                    <div class='img'>

                        <div class='card-header'>

                            <div class='card-icon'><i class='fas fa-building'></i></div>

                            <div class='card-title'>

                                <h4>Teletech (Seasonal Account)</h4>

                                <p class='job-title'>Customer Service Representative</p>

                                <p class='dates'>October 2018 – January 2019</p>

                            </div>

                        </div>

                        <div class='card-details'>

                            <ul>

                                <li>Supported a U.S.-based online bookstore.</li>

                                <li>Processed orders, tracked deliveries, and handled membership cancellations.</li>

                            </ul>

                        </div>

                    </div>

                </div>

                <div class='card' style='--index: 3;' data-type='work'>

                    <div class='img'>

                        <div class='card-icon'><i class='fas fa-building'></i></div>

                        <div class='card-title'>

                            <h4>Alorica Philippines</h4>

                            <p class='job-title'>Customer Service Representative</p>

                            <p class='dates'>May 2017 – December 2018</p>

                        </div>

                    </div>

                    <div class='card-details'>

                        <ul>

                            <li>Managed inbound calls for T-Mobile customers.</li>

                            <li>Troubleshot mobile phone and billing issues.</li>

                            <li>Processed upgrades, upsells, and retention offers.</li>

                        </ul>

                    </div>

                </div>

                <div class='card' style='--index: 4;' data-type='education'>

                    <div class='img'>

                        <div class='card-header'>

                            <div class='card-icon education-icon'><i class='fas fa-graduation-cap'></i></div>

                            <div class='card-title'>

                                <h4>Bestlink College of the Philippines</h4>

                                <p class='degree'>Tertiary Level</p>

                                <p class='dates'>August 2023 – June 2024</p>

                                <p class='location'>San Jose del Monte, Bulacan</p>

                            </div>

                        </div>

                        <div class='card-details'>

                            <p>Focused on advanced studies in technology and business.</p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>";

    }

}