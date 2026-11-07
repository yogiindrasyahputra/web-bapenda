<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Throwable;

class CityNewsService
{
    private const SOURCE_URL = 'https://web.padangsidimpuankota.go.id/berita';

    private const NEWS_POOL_SIZE = 12;

    public function latest(int $limit = 3): array
    {
        $today = now('Asia/Jakarta');
        $cacheKey = 'padangsidimpuan-city-news-v6-'.$today->toDateString().'-'.$limit;

        return Cache::remember($cacheKey, $today->copy()->endOfDay(), function () use ($limit, $today) {
            try {
                $response = Http::withHeaders(['Accept' => 'text/html'])
                    ->timeout(10)
                    ->get(self::SOURCE_URL);

                if ($response->failed()) {
                    return $this->rotateDaily($this->fallbackNews(self::NEWS_POOL_SIZE), $limit, $today);
                }

                $document = new \DOMDocument;
                libxml_use_internal_errors(true);
                $document->loadHTML('<?xml encoding="UTF-8">'.$response->body());
                libxml_clear_errors();

                $xpath = new \DOMXPath($document);
                $news = [];
                $seen = [];

                foreach ($xpath->query('//h3/a[@href]') as $link) {
                    if (! $link instanceof \DOMElement) {
                        continue;
                    }

                    $title = trim(preg_replace('/\s+/', ' ', $link->textContent));
                    $href = trim($link->getAttribute('href'));

                    if ($title === '' || $href === '' || isset($seen[$href])) {
                        continue;
                    }

                    $seen[$href] = true;
                    $news[] = [
                        'title' => Str::limit($title, 92),
                        'url' => $this->absoluteUrl($href),
                        'description' => 'Baca berita terbaru Pemerintah Kota Padangsidimpuan.',
                        'image' => $this->imageFrom($link) ?? $this->imageFor($href),
                    ];

                    if (count($news) === max(self::NEWS_POOL_SIZE, $limit)) {
                        break;
                    }
                }

                return $this->rotateDaily($news ?: $this->fallbackNews(self::NEWS_POOL_SIZE), $limit, $today);
            } catch (Throwable $exception) {
                report($exception);

                return $this->rotateDaily($this->fallbackNews(self::NEWS_POOL_SIZE), $limit, $today);
            }
        });
    }

    private function rotateDaily(array $news, int $limit, \Illuminate\Support\Carbon $today): array
    {
        if ($news === []) {
            return [];
        }

        $offset = ($today->dayOfYear - 1) % count($news);
        $rotatedNews = array_merge(array_slice($news, $offset), array_slice($news, 0, $offset));

        return array_slice($rotatedNews, 0, $limit);
    }

    private function fallbackNews(int $limit): array
    {
        return array_slice([
            [
                'title' => 'Dinas PUTR Sosialisasikan Standar Pelayanan PBG, SLF, SBKBG dan KKPR kepada Kepala Desa',
                'url' => 'https://web.padangsidimpuankota.go.id/Dinas_PUTR_Sosialisasikan_Standar_Pelayanan_PBG',
                'description' => 'Informasi terbaru Pemerintah Kota Padangsidimpuan.',
                'image' => 'https://web.padangsidimpuankota.go.id/uploads/images/2026/09/image_750x_6a97e68448ab3.jpg',
            ],
            [
                'title' => 'GPM Serentak Digelar Se-Sumut, Pemko Padangsidimpuan Pastikan Pangan Terjangkau dan Pasokan Tersedia',
                'url' => 'https://web.padangsidimpuankota.go.id/GPM_Serentak_Digelar_Se_Sumut',
                'description' => 'Informasi terbaru Pemerintah Kota Padangsidimpuan.',
                'image' => 'https://web.padangsidimpuankota.go.id/uploads/images/2026/08/image_750x_6a954aa8c8eb0.jpg',
            ],
            [
                'title' => 'Tim PKK Provsu Evaluasi Pelaksanaan PAAR di Kecamatan Padangsidimpuan Batunadua',
                'url' => 'https://web.padangsidimpuankota.go.id/Tim_PKK_Provsu_Evaluasi_Pelaksanaan_PAAR',
                'description' => 'Informasi terbaru Pemerintah Kota Padangsidimpuan.',
                'image' => 'https://web.padangsidimpuankota.go.id/uploads/images/2026/08/image_750x_6a921ef7da057.jpg',
            ],
        ], 0, $limit);
    }

    private function imageFor(string $href): ?string
    {
        return match (true) {
            Str::contains($href, 'Dinas_PUTR_Sosialisasikan_Standar_Pelayanan_PBG') => 'https://web.padangsidimpuankota.go.id/uploads/images/2026/09/image_750x_6a97e68448ab3.jpg',
            Str::contains($href, 'GPM_Serentak_Digelar_Se_Sumut') => 'https://web.padangsidimpuankota.go.id/uploads/images/2026/08/image_750x_6a954aa8c8eb0.jpg',
            Str::contains($href, 'Tim_PKK_Provsu_Evaluasi') => 'https://web.padangsidimpuankota.go.id/uploads/images/2026/08/image_750x_6a921ef7da057.jpg',
            default => null,
        };
    }

    private function imageFrom(\DOMElement $link): ?string
    {
        $images = (new \DOMXPath($link->ownerDocument))->query(
            'ancestor::div[contains(concat(" ", normalize-space(@class), " "), " post-item-horizontal ")][1]//img[1]',
            $link
        );

        if ($images === false || ! $images->item(0) instanceof \DOMElement) {
            return null;
        }

        $image = $images->item(0);
        $source = trim($image->getAttribute('data-src')) ?: trim($image->getAttribute('src'));

        if ($source === '' || Str::contains($source, 'img_bg_md.png')) {
            return null;
        }

        return $this->absoluteUrl($source);
    }

    private function absoluteUrl(string $href): string
    {
        if (Str::startsWith($href, ['http://', 'https://'])) {
            return $href;
        }

        if (Str::startsWith($href, '//')) {
            return 'https:'.$href;
        }

        return 'https://web.padangsidimpuankota.go.id/'.ltrim($href, '/');
    }
}
