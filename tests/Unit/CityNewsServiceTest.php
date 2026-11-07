<?php

namespace Tests\Unit;

use App\Services\CityNewsService;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class CityNewsServiceTest extends TestCase
{
    protected function tearDown(): void
    {
        Carbon::setTestNow();

        parent::tearDown();
    }

    public function test_it_rotates_the_displayed_news_each_day(): void
    {
        Carbon::setTestNow(Carbon::parse('2026-01-01 00:30:00', 'Asia/Jakarta'));
        Cache::setDefaultDriver('array');
        Cache::flush();
        Http::fake([
            '*' => Http::response(
                '<html><body>'.
                '<div class="post-item-horizontal"><div class="item-image"><img data-src="/uploads/berita-1.jpg"></div><h3><a href="/berita-1">Berita 1</a></h3></div>'.
                '<div class="post-item-horizontal"><div class="item-image"><img data-src="/uploads/berita-2.jpg"></div><h3><a href="/berita-2">Berita 2</a></h3></div>'.
                '<div class="post-item-horizontal"><div class="item-image"><img data-src="/uploads/berita-3.jpg"></div><h3><a href="/berita-3">Berita 3</a></h3></div>'.
                '<div class="post-item-horizontal"><div class="item-image"><img data-src="/uploads/berita-4.jpg"></div><h3><a href="/berita-4">Berita 4</a></h3></div>'.
                '<div class="post-item-horizontal"><div class="item-image"><img data-src="/uploads/berita-5.jpg"></div><h3><a href="/berita-5">Berita 5</a></h3></div>'.
                '</body></html>',
                200
            ),
        ]);

        $service = app(CityNewsService::class);
        $firstDayNews = $service->latest(3);

        Http::assertSent(fn ($request) => str_contains($request->url(), '/berita'));

        Carbon::setTestNow(Carbon::parse('2026-01-02 00:30:00', 'Asia/Jakarta'));
        $secondDayNews = $service->latest(3);

        $this->assertSame(['Berita 1', 'Berita 2', 'Berita 3'], array_column($firstDayNews, 'title'));
        $this->assertSame(['Berita 2', 'Berita 3', 'Berita 4'], array_column($secondDayNews, 'title'));
        $this->assertSame(
            'https://web.padangsidimpuankota.go.id/uploads/berita-1.jpg',
            $firstDayNews[0]['image']
        );
        $this->assertSame(
            'https://web.padangsidimpuankota.go.id/uploads/berita-2.jpg',
            $secondDayNews[0]['image']
        );
    }
}
