<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Elasticsearch\Client;
use Elasticsearch\Common\Exceptions\Missing404Exception;

class IndexBookElasticsearchJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected $bookId;

    public function __construct($bookId)
    {
        $this->bookId = $bookId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Client $client)
    {
        $params = [
            'index' => 'books-v1',
            'id' => $this->bookId,
        ];

        try {
            $client->delete($params);
        } catch (Missing404Exception $exception) {
            // Already deleted..
        }
    }
}
