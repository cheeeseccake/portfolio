<?php

class EducationSection {

    private $educations = [
        [
            'institution' => 'Bestlink College of the Philippines',
            'level' => 'Tertiary Level',
            'dates' => 'August 2023 – June 2024',
            'location' => 'San Jose del Monte, Bulacan'
        ],
        [
            'institution' => 'Some High School',
            'level' => 'Secondary Level',
            'dates' => '2019 – 2023',
            'location' => 'Bulacan'
        ]
    ];

    public function render() {
        $html = "<section id='education' class='education-section'>
    <div class='container'>
        <h2>Education</h2>

        <div class='experience-tags'>
            <button class='tag-btn active' data-card='0'>Tertiary</button>
            <button class='tag-btn' data-card='1'>Secondary</button>
        </div>

        <div class='experience-grid'>";
        foreach ($this->educations as $index => $edu) {
            $html .= "<div class='experience-card stacked-card' data-card='{$index}'>
                <h4>{$edu['institution']}</h4>
                <h5>{$edu['level']}</h5>
                <p class='dates'>{$edu['dates']}</p>
                <p class='location'>{$edu['location']}</p>
            </div>";
        }
        $html .= "</div>
    </div>
</section>";

        return $html;
    }
}