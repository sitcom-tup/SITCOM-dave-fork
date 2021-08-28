<?php

namespace App\Faker;

use Faker\Provider\Base;
use Faker\Factory as Faker;

class JobType extends Base
{
    protected static $names = [
        'Full-Time',
        'Part-Time',
        'Contract',
        'Internship',
        'Project Based',
        'Voluunteer',
        'Temporary',
        'Seasonal',
        'Freelance',
        'On - Site',
        'Work from home - PT',
        'Work from home - FT',
        'Work from home - Contract',
        'Work from home - Intern',
        'Work from home - FL',
        'Work from home - BP',

        // 'Electrical Engineering',
        // 'Software Engineering',
        // 'Mechanical Engineering',
        // 'Industrial Engineering',
        // 'Aerospace Engineering',
        // 'Chemical Engineering',
        // 'Environmental Engineering',
        // 'Agricultural Engineering',
        // 'Petroleum Engineering',
        // 'Geological Engineering',
        // 'Biomedical Engineering',
        // 'Automotive Engineering',
        // 'Nuclear Engineering',
        // 'Civil Engineering',
        // 'Structural Engineering',
        // 'Biomechanical Engineering',
        // 'Architectural Engineering',
        // 'Computer Science Engineering',
        // 'Mechatronics Engineering',
        // 'Robotics Engineering',
        // 'Microelectronic Engineering',
        // 'Materials Engineering',
        // 'Paper Engineering',
        // 'Sustainability Engineering',
        // 'Systems Engineering',
        // 'Manufacturing Engineering',
        // 'Marine Engineering',
        // 'Photonics Engineering',
        // 'Nanotechnology Engineering',
        // 'Mining Engineering',
        // 'Ceramics Engineering',
        // 'Geomatics Engineering',
        // 'Health and Safety Engineering ₱',
    ];

    public function jobType(): string
    {
        return static::randomElement(static::$names);
    }

}