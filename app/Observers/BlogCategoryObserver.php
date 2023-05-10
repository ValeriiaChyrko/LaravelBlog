<?php

namespace App\Observers;

use App\Models\BlogCategory;
use Illuminate\Support\Str;

class blogCategoryObserver
{
    /**
     * Handle the logategory "created" event.
     *
     * @param  \App\Models\BlogCategory  $logategory
     * @return void
     */
    public function created(BlogCategory $logategory)
    {
        //
    }

    /**
     * Handle the logategory "updated" event.
     *
     * @param  \App\Models\BlogCategory  $logategory
     * @return void
     */
    public function updated(BlogCategory $logategory)
    {
        //
    }

    /**
     * Handle the logategory "deleted" event.
     *
     * @param  \App\Models\BlogCategory  $logategory
     * @return void
     */
    public function deleted(BlogCategory $logategory)
    {
        //
    }

    /**
     * Handle the logategory "restored" event.
     *
     * @param  \App\Models\BlogCategory  $logategory
     * @return void
     */
    public function restored(BlogCategory $logategory)
    {
        //
    }

    /**
     * Handle the logategory "force deleted" event.
     *
     * @param  \App\Models\BlogCategory  $logategory
     * @return void
     */
    public function forceDeleted(BlogCategory $logategory)
    {
        //
    }

    /**
     * Обробка перед створенням запису.
     *
     * @param  BlogCategory  $blogCategory
     *
     */
    public function creating(BlogCategory $blogCategory)
    {
        $this->setSlug($blogCategory);
    }

    public function updating(BlogCategory $blogCategory)
    {
        $this->setSlug($blogCategory);
    }
    /**
     * якщо псевдонім порожній
     * то генеруємо псевдонім
     *
     * @param BlogCategory  $blogCategory
     */
    protected function setSlug(BlogCategory $blogCategory)
    {
        if (empty($blogCategory->slug)) {
            $blogCategory->slug = Str::slug($blogCategory->title);
        }
    }

}
