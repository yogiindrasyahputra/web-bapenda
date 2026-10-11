<?php

namespace App\Http\Controllers;

use App\Models\Peraturan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;

class PeraturanController extends Controller
{
    public function index()
    {
        $peraturans = Peraturan::latest()->paginate(15);
        $isPajakDaerah = request()->query('jenis') === 'pajak-daerah';
        $isPajakP3b = request()->query('jenis') === 'p3b';
        $isPajakPusat = request()->query('jenis') === 'pajak-pusat';
        $isRekapPeraturan = request()->query('jenis') === 'rekap-peraturan';
        $newsCategory = $isPajakDaerah ? 'medan' : ($isPajakP3b ? 'bisnis' : ($isPajakPusat ? 'news' : 'sumut'));
        $newsSourceUrl = $newsCategory === 'news'
            ? 'https://kaldera.id/category/news/'
            : 'https://kaldera.id/category/' . $newsCategory . '/';
        $newsCategoryLabel = $isPajakDaerah ? 'PAJAK DAERAH' : ($isPajakP3b ? 'P3B' : ($isPajakPusat ? 'PAJAK PUSAT' : 'UU KONSOLIDASI'));
        $kalderaNews = $this->kalderaNews($newsCategory);

        return view('peraturan.index', compact('peraturans', 'isPajakDaerah', 'isPajakP3b', 'isPajakPusat', 'isRekapPeraturan', 'kalderaNews', 'newsCategory', 'newsCategoryLabel', 'newsSourceUrl'));
    }

    private function kalderaNews(string $category): array
    {
        $sourceUrl = $category === 'news'
            ? 'https://kaldera.id/category/news/'
            : 'https://kaldera.id/category/' . $category . '/';

        return Cache::remember('kaldera-news-cards-v4-' . $category, now()->addDay(), function () use ($sourceUrl, $category): array {
            try {
                $html = Http::timeout(8)
                    ->retry(2, 200)
                    ->get($sourceUrl)
                    ->throw()
                    ->body();

                libxml_use_internal_errors(true);
                $document = new \DOMDocument();
                $document->loadHTML('<?xml encoding="UTF-8">' . $html);
                $xpath = new \DOMXPath($document);
                $articles = [];

                foreach ($xpath->query('//a[contains(@href, "kaldera.id/")]') as $link) {
                    $url = trim($link->getAttribute('href'));
                    $title = trim(preg_replace('/\s+/', ' ', $link->textContent));
                    if ($url === '' || $title === '' || str_contains($url, '/category/') || str_contains($url, '/tag/')) {
                        continue;
                    }

                    $url = str_starts_with($url, '/') ? 'https://kaldera.id' . $url : $url;
                    if (isset($articles[$url]) || strlen($title) < 12) {
                        continue;
                    }

                    $image = null;
                    $parent = $link->parentNode;
                    for ($level = 0; $level < 4 && $parent; $level++, $parent = $parent->parentNode) {
                        $images = $xpath->query('.//img[@src or @data-src or @data-lazy-src]', $parent);
                        if ($images->length > 0) {
                            $image = $images->item(0)->getAttribute('data-src')
                                ?: $images->item(0)->getAttribute('data-lazy-src')
                                ?: $images->item(0)->getAttribute('src');
                            break;
                        }
                    }

                    $summary = 'Berita terbaru dari Kaldera.id.';
                    try {
                        $articleDocument = new \DOMDocument();
                        $articleDocument->loadHTML('<?xml encoding="UTF-8">' . Http::timeout(5)->get($url)->body());
                        $articleXpath = new \DOMXPath($articleDocument);
                        $imageMeta = $articleXpath->query('//meta[@property="og:image"]/@content');
                        $descriptionMeta = $articleXpath->query('//meta[@property="og:description"]/@content');
                        $image = $image ?: ($imageMeta->length ? trim($imageMeta->item(0)->nodeValue) : null);
                        $summary = $descriptionMeta->length
                            ? trim(preg_replace('/\s+/', ' ', html_entity_decode($descriptionMeta->item(0)->nodeValue, ENT_QUOTES | ENT_HTML5, 'UTF-8')))
                            : $summary;
                    } catch (\Throwable $exception) {
                    }

                    $articles[$url] = [
                        'title' => html_entity_decode($title, ENT_QUOTES | ENT_HTML5, 'UTF-8'),
                        'url' => $url,
                        'image' => $image ?: null,
                        'summary' => $summary,
                    ];

                    if (count($articles) === 18) {
                        break;
                    }
                }

                libxml_clear_errors();
                $articles = array_values($articles);
                $offset = ['sumut' => 0, 'medan' => 3, 'bisnis' => 6, 'news' => 9][$category] ?? 0;

                return array_slice($articles, $offset, 3) ?: array_slice($articles, 0, 3);
            } catch (\Throwable $exception) {
                report($exception);
                return [];
            }
        });
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:200',
            'nomor' => 'required|string|max:100',
            'tanggal' => 'required|date',
            'status' => 'required|in:aktif,nonaktif',
        ]);
        Peraturan::create($data);
        return back()->with('success', 'Peraturan berhasil ditambahkan.');
    }
}
