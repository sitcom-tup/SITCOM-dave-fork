<?php

namespace App\Faker;

use Faker\Provider\Base;
use Faker\Factory as Faker;

class CustomHtmlLorem extends Base
{

    
    public function bodyText($minParagraphs = 1, $maxParagraphs = 4, $images = 1, $minSentences = 3, $maxSentences = 9)
    {
        $faker = Faker::create();
        /* Generate ipsum text */
        $count = mt_rand($minParagraphs, $maxParagraphs);
        $ipsumArray = array();
        for ($c = 0; $c < $count; $c++) {
            $ipsumArray[] = $faker->paragraph(mt_rand($minSentences, $maxSentences));
        }
        /* Add in images at random */
        for ($c = 0; $c < $images; $c++) {
            $image = "<img src='{$faker->imageUrl()}' alt='faker_image' class='ipsImage'>";
            // array_splice($ipsumArray, mt_rand(0, count($ipsumArray)), $images);
            $ipsumArray[] = $image;
        }
        for ($c = 0; $c < $count; $c++) {
            $ipsumArray[] = $faker->paragraph(mt_rand($minSentences, $maxSentences));
        }
        /* Generate HTML output from our array */
        $ipsumText = '';
        foreach ($ipsumArray as $line) {
            $ipsumText = $ipsumText . "<p>{$line}</p>";
        }
        return $ipsumText;
    }
}