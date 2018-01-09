<?php


namespace App\Services;


trait Sluggable
{
    public function generateSlug($sluggedTitle, $class, $loopNumber = 1)
    {
        $loopedTitle = $loopNumber == 1 ? $sluggedTitle : $sluggedTitle . ' ' . $loopNumber;
        $sluggedName = str_slug($loopedTitle, '-');
        // check existing slug
        if (app($class)::where('slug', $sluggedName)->exists()) {
            return $this->generateSlug($sluggedTitle, $class, ++$loopNumber);
        }
        return $sluggedName;
    }
}