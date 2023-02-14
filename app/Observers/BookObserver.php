<?php

namespace App\Observers;

use App\Models\Book;
use App\Jobs\IndexBookElasticsearchJob;
use App\Jobs\RemoveBookElasticsearchJob;
class BookObserver
{
    /**
     * Handle the Book "created" event.
     *
     * @param  \App\Models\Book  $book
     * @return void
     */
    public function created(Book $book)
    {
        if ($book->is_active) {
            dispatch(new IndexBookElasticsearchJob($book));
        }
    }

    /**
     * Handle the Book "updated" event.
     *
     * @param  \App\Models\Book  $book
     * @return void
     */
    public function updated(Book $book)
    {
        if ($book->is_active) {
            dispatch(new IndexBookElasticsearchJob($book));
        } else {
            dispatch(new RemoveBookElasticsearchJob($book->id));
        }
    }

    /**
     * Handle the Book "deleted" event.
     *
     * @param  \App\Models\Book  $book
     * @return void
     */
    public function deleted(Book $book)
    {
        dispatch(new RemoveBookElasticsearchJob($book->id));

    }

    /**
     * Handle the Book "restored" event.
     *
     * @param  \App\Models\Book  $book
     * @return void
     */
    public function restored(Book $book)
    {
        if ($book->is_active) {
            dispatch(new IndexBookElasticsearchJob($book));
        }
    }

    /**
     * Handle the Book "force deleted" event.
     *
     * @param  \App\Models\Book  $book
     * @return void
     */
    public function forceDeleted(Book $book)
    {
        dispatch(new RemoveBookElasticsearchJob($book->id));

    }
}
