<?php

namespace App\Observers;

use App\Models\BlogPost;
use Carbon\Carbon;

class blogPostObserver
{
    /**
     * Handle the logost "created" event.
     *
     * @param  \App\Models\BlogPost  $logost
     * @return void
     */
    public function created(BlogPost $logost)
    {
        //
    }

    /**
     * Handle the logost "updated" event.
     *
     * @param  \App\Models\BlogPost  $logost
     * @return void
     */
    public function updated(BlogPost $logost)
    {
        //
    }

    /**
     * Handle the logost "deleted" event.
     *
     * @param  \App\Models\BlogPost  $logost
     * @return void
     */
    public function deleted(BlogPost $logost)
    {
        //
    }

    /**
     * Handle the logost "restored" event.
     *
     * @param  \App\Models\BlogPost  $logost
     * @return void
     */
    public function restored(BlogPost $logost)
    {
        //
    }

    /**
     * Handle the logost "force deleted" event.
     *
     * @param  \App\Models\BlogPost  $logost
     * @return void
     */
    public function forceDeleted(BlogPost $logost)
    {
        //
    }
    /**
     * Обробка перед оновленням запису.
     *
     * @param  BlogPost  $blogPost
     *
     */
    public function updating(BlogPost $blogPost)
    {
        $this->setPublishedAt($blogPost);

        $this->setSlug($blogPost);
    }

    /**
     * якщо поле published_at порожнє і нам прийшло 1 в ключі is_published,
     * то генеруємо поточну дату
     *
     * @param BlogPost $blogPost
     */
    protected function setPublishedAt(BlogPost $blogPost)
    {
        if (empty($blogPost->published_at) && $blogPost->is_published) {
            $blogPost->published_at = Carbon::now();
        }
    }

    /**
     * якщо псевдонім порожній то генеруємо псевдонім
     *
     * @param BlogPost $blogPost
     */
    protected function setSlug(BlogPost $blogPost)
    {
        if (empty($blogPost->slug)) {
            $blogPost->slug = \Str::slug($blogPost->title);
        }
    }
}
