<?php

namespace App\Jobs;

use App\Models\Endpoint;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class EndpointCheckJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public Endpoint $endpoint,
    )
    { }

    /**
     * Execute the job.
     */
    public function handle(): void
{
    try {
        $url = $this->endpoint->urlFull();
        $response = Http::get($url);

        if ($response->successful()) {
            $this->endpoint->checks()->create([
               'status_code' => $response->status(),
               'response_body' => $response->body(),
            ]);

            $this->endpoint->update([
                'next_check' => now()->addMinutes($this->endpoint->frequency)
            ]);
        } else {
           dd("erro 1");
        }
    } catch (\Exception $e) {
        dd($e);
    }
}

}
