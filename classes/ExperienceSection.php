<?php

class ExperienceSection {

    private $workExperiences = [
        [
            'title' => 'Chat Support Representative',
            'company' => 'Concentrix Philippines',
            'dates' => 'October 2021 – Present',
            'responsibilities' => [
                'Handles chat support for Nike retail account.',
                'Provides order status updates and troubleshooting assistance for Nike accounts.',
                'Ensures accurate and timely customer resolutions with high satisfaction ratings.'
            ]
        ],
        [
            'title' => 'Technical Support Representative',
            'company' => 'IQOR Philippines',
            'dates' => 'June 2019 – November 2020',
            'responsibilities' => [
                'Assisted AT&T customers with cable and internet troubleshooting.',
                'Resolved connectivity and billing issues efficiently.',
                'Upsold eligible product upgrades to enhance service packages.'
            ]
        ],
        [
            'title' => 'Customer Service Representative',
            'company' => 'Teletech (Seasonal Account)',
            'dates' => 'October 2018 – January 2019',
            'responsibilities' => [
                'Supported a U.S.-based online bookstore.',
                'Processed orders, tracked deliveries, and handled membership cancellations.'
            ]
        ],
        [
            'title' => 'Customer Service Representative',
            'company' => 'Alorica Philippines',
            'dates' => 'May 2017 – December 2018',
            'responsibilities' => [
                'Managed inbound calls for T-Mobile customers.',
                'Troubleshot mobile phone and billing issues.',
                'Processed upgrades, upsells, and retention offers.'
            ]
        ]
    ];

    private $education = [
        'institution' => 'Bestlink College of the Philippines',
        'level' => 'Tertiary Level',
        'dates' => 'August 2023 – June 2024',
        'location' => 'San Jose del Monte, Bulacan'
    ];


    public function render() {

        $html = "<section id='experience' class='experience-section'>
    <div class='container'>
        <h2>Experience</h2>

        <div class='experience-tags'>
            <button class='tag-btn active' data-card='0'>2021 - Present</button>
            <button class='tag-btn' data-card='1'>2019 - 2020</button>
            <button class='tag-btn' data-card='2'>2018 - 2019</button>
            <button class='tag-btn' data-card='3'>2017 - 2018</button>
        </div>

        <div class='experience-grid'>";
        foreach ($this->workExperiences as $index => $exp) {
            $html .= "<div class='experience-card stacked-card' data-card='{$index}'>
                <h4>{$exp['title']}</h4>
                <h5>{$exp['company']}</h5>
                <p class='dates'>{$exp['dates']}</p>
                <ul>";
            foreach ($exp['responsibilities'] as $resp) {
                $html .= "<li>{$resp}</li>";
            }
            $html .= "</ul>
            </div>";
        }
        $html .= "</div>

        <h3>Education</h3>
        <div class='experience-grid'>
            <div class='experience-card'>
                <h4>{$this->education['institution']}</h4>
                <h5>{$this->education['level']}</h5>
                <p class='dates'>{$this->education['dates']}</p>
                <p class='location'>{$this->education['location']}</p>
            </div>
        </div>
    </div>
</section>";

        return $html;
    }
}