<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Throwable;

class CityNewsService
{
    private const SOURCE_URL = 'https://web.padangsidimpuankota.go.id/berita';

    public function latest(int $limit = 3): array
    {
        $cacheKey = 'padangsidimpuan-city-news-v3-' . now()->toDateString() . '-' . $limit;

        return Cache::remember($cacheKey, now()->endOfDay(), function () use ($limit) {
            try {
                $response = Http::acceptHtml()->timeout(10)->get(self::SOURCE_URL);

                if ($response->failed()) {
                    return $this->fallbackNews($limit);
                }

                $document = new \DOMDocument();
                libxml_use_internal_errors(true);
                $document->loadHTML('<?xml encoding="UTF-8">' . $response->body());
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
                        'image' => $this->imageFor($href),
                    ];

                    if (count($news) === $limit) {
                        break;
                    }
                }

                return $news ?: $this->fallbackNews($limit);
            } catch (Throwable) {
                return $this->fallbackNews($limit);
            }
        });
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

    private function absoluteUrl(string $href): string
    {
        if (Str::startsWith($href, ['http://', 'https://'])) {
            return $href;
        }

        return 'https://web.padangsidimpuankota.go.id/' . ltrim($href, '/');
    }
}
