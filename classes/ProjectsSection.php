<?php

class ProjectsSection {

    private $projects = [
        [
            'title' => 'The Rattan Co. Website',
            'desc' => 'An e-commerce website for rattan bags featuring sustainable, handcrafted products with a focus on traditional craftsmanship and community support.',
            'img' => 'projects/rattanbag.png',
            'link' => 'projects/rattanbag.png',
            'color' => [128, 0, 0]
        ],
        [
            'title' => 'Gamified Weather App Demo',
            'desc' => 'An interactive weather application featuring gamified elements like daily challenges, trivia quizzes, matching games, and journal logging for an engaging user experience.',
            'img' => 'projects/weather app.png',
            'link' => 'projects/weather app.png',
            'color' => [150, 90, 90]
        ],
        [
            'title' => 'NBI Online Services',
            'desc' => 'A comprehensive online platform for National Bureau of Investigation services, featuring clearance applications, tracking, dashboard management, and informational pages about NBI Philippines.',
            'img' => 'projects/nbi.png',
            'link' => 'projects/nbi.png',
            'color' => [100, 0, 0]
        ],
        [
            'title' => 'DTI (Department of Trade and Industry)',
            'desc' => 'A comprehensive management system for the Department of Trade and Industry, handling business registration, consumer protection, and trade services.',
            'img' => 'projects/dti.png',
            'link' => 'projects/dti.png',
            'color' => [170, 120, 120]
        ],
        [
            'title' => 'Bestlink College Project',
            'desc' => 'A web application developed for Bestlink College of the Philippines, focusing on student management and academic resources.',
            'img' => 'projects/bcp.png',
            'link' => 'projects/bcp.png',
            'color' => [120, 40, 40]
        ],
        [
            'title' => 'Brigino General Hospital',
            'desc' => 'Brigino General Hospital website, a comprehensive healthcare platform with patient services, appointments, and information.',
            'img' => 'projects/brigino.png',
            'link' => 'projects/brigino.png',
            'color' => [180, 60, 60]
        ],
        [
            'title' => 'Ember & Loom Website',
            'desc' => 'Ember & Loom Studio e-commerce website for handmade home decor, featuring planters, kitchen items, and sustainable products.',
            'img' => 'projects/ember&loom.png',
            'link' => 'projects/ember&loom.png',
            'color' => [140, 20, 20]
        ],
        [
            'title' => 'Kleish Collection',
            'desc' => 'Kleish Collection admin dashboard for managing inventory, orders, staff, and analytics for a thrift store.',
            'img' => 'projects/kleishcollection.png',
            'link' => 'projects/kleishcollection.png',
            'color' => [160, 80, 80]
        ],
        [
            'title' => 'Inkinsteadoftears',
            'desc' => 'A digital sanctuary for writing unspoken emotions, transforming private journaling into a shared space for evocative prose and community story submissions, featuring a Dark Academia aesthetic.',
            'img' => 'projects/Inkinsteadoftears.png',
            'link' => 'projects/Inkinsteadoftears.pdf',
            'color' => [0, 0, 0]
        ],
        [
            'title' => 'Bestlink College Legal & Compliance Module',
            'desc' => 'Dashboard for managing users, policies, compliance, incidents, documents, and trainings in a college setting.',
            'img' => 'projects/Bestlink College Legal & Compliance Module.png',
            'link' => 'projects/Bestlink College Legal & Compliance Module.pdf',
            'color' => [50, 50, 50]
        ]
    ];

    public function render() {
        $quantity = count($this->projects);
        $cardsHtml = '';

        foreach ($this->projects as $index => $project) {
            $color = implode(', ', $project['color']);

            $cardsHtml .= "
                <div class='card' style='--index: {$index}; --color-card: {$color};'>
                    <a href='{$project['link']}' target='_blank' class='img'>
                        <img src='{$project['img']}' alt='{$project['title']}'>
                        <div class='overlay'>
                            <h3>{$project['title']}</h3>
                            <p>{$project['desc']}</p>
                        </div>
                    </a>
                </div>
            ";
        }

        return "
        <section id='projects' class='projects-section'>
            <h2>Projects</h2>
            <div class='wrapper'>
                <div class='inner' style='--quantity: {$quantity};'>
                    {$cardsHtml}
                </div>
            </div>
        </section>
        ";
    }
}
