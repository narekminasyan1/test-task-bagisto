<?php

namespace Webkul\Google\Repositories;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Webkul\Google\Contracts\Integrate;

class GoogleRepository implements Integrate
{
    private const GOOGLE_API_PATH = 'https://www.googleapis.com/pagespeedonline/v5/runPagespeed';
    private const GOOGLE_DEVELOPERS_PATH = 'https://developers.google.com';
    private const GOOGLE_API_CATEGORY = 'ACCESSIBILITY';

    public function getData(): array
    {
        // Build API URL and parameters
        $apiUrl = self::GOOGLE_API_PATH;
        $params = $this->getParams();

        // Check if response is cached
        if (!$this->checkCacheExists()) {
            // Fetch data from API
            $response = Http::get($apiUrl, $params)->json();
            // Cache the response
            $this->addToCache($response);
        } else {
            // Retrieve cached response
            $response = Cache::get($this->getCacheKey());
        }

        return $response;
    }

    private function getParams(): array
    {
        return [
            'url' => self::GOOGLE_DEVELOPERS_PATH,
            'category' => self::GOOGLE_API_CATEGORY,
            'key' => env('GOOGLE_SPEED_API_KEY')
        ];
    }

    private function addToCache($response): void
    {
        Cache::remember($this->getCacheKey(), 60, function () use ($response) {
            return $response;
        });
    }

    private function checkCacheExists(): bool
    {
        return Cache::has($this->getCacheKey());
    }

    private function getCacheKey(): string
    {
        return 'google-api-url-' . self::GOOGLE_DEVELOPERS_PATH;
    }
}
