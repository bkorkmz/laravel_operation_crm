<?php /** @noinspection PhpInconsistentReturnPointsInspection */

use App\Models\Article;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

if (! function_exists('slug_format')) {
    /**
     * Get / set the specified configuration value.
     *
     * If an array is passed as the key, we will assume you want to set an array of values.
     */
    function slug_format($string, string $sparator = '-'): string
    {
        $base_string = $string;
        $string = preg_replace('/\s+/u', '-', trim($string));
        $string = str_replace('/', '-', $string);
        $string = str_replace('\\', '-', $string);
        $string = str_replace(['ü', 'Ü', 'ş', 'Ş', 'ı', 'İ', 'ç', 'Ç', 'ö', 'Ö', 'ğ', 'Ğ'], ['u', 'U', 's', 'S', 'i', 'I', 'c', 'C', 'o', 'O', 'g', 'G'], $string);
        $string = strtolower($string);

        return Str::slug($string, $sparator);
    }
}

if (! function_exists('menu')) {
    function menu()
    {

        $MenuJson = file_get_contents(base_path('resources/views/layouts/menu-data/menu.json'));

        return json_decode($MenuJson, true);
    }

}

if (! function_exists('permissionCheck')) {

    function permissionCheck($permission): bool
    {

        $isSuperAdmin = auth()->check() && auth()->user()->hasRole('Super admin');
        if ($isSuperAdmin) {
            return true;
        } elseif (auth()->user()->hasAnyPermission($permission) || $permission == '') {
            return true;
        } else {
            return false;
        }
    }

}

if (! function_exists('fileUpload')) {

    function fileUpload($file, $directory, $fileName = '', $disk = 'custom_disk'): array
    {
        //        $fileName = "";
        try {
            if ($fileName == '') {
                $filePath = $file->store($directory, $disk);
            } else {
                $fileName = $fileName.'_'.time();
                $extension = $file->getClientOriginalExtension();
                $filePath = $file->storeAs($directory, $fileName.'.'.$extension, $disk);
            }

            $path = '/storage/'.$filePath;
            $fullPath = Storage::path($filePath);
            //          $path = '/storage/'.$file->store($directory."/".$fileName);

            return [
                'success' => true,
                'path' => $path,
                'full_path' => $fullPath,
            ];
        } catch (Exception $e) {
            return [
                'success' => false,
                'message' => 'Dosya yükleme hatası: '.$e->getMessage(),
            ];
        }
    }

}

if (! function_exists('deleteOldPicture')) {

    function deleteOldPicture($path)
    {

        $publicPath = public_path($path);

        if (File::exists($publicPath)) {

            function deleteOldPicture($path): array
            {

                $publicPath = public_path($path);

                if (File::exists($publicPath)) {
                    try {
                        // Dosyayı sil
                        File::delete($publicPath);

                        return [
                            'success' => true,
                            'message' => 'Dosya başarıyla silindi.',
                        ];
                    } catch (\Exception $e) {
                        return [
                            'success' => false,
                            'message' => 'Dosya silme hatası: '.$e->getMessage(),
                        ];
                    }
                } else {
                    return [
                        'success' => false,
                        'message' => 'Dosya bulunamadı.',
                    ];
                }

            }

        }

    }

}

if (! function_exists('siteMap')) {

    function siteMap(): RedirectResponse
    {
        $urls = [
            [
                'date' => date("Y-m-d\Th:m:s+00:00"),
                'url' => request()->schemeAndHttpHost(),
                'priority' => '1.00',
            ],
            [
                'date' => date("Y-m-d\Th:m:s+00:00"),
                'url' => request()->schemeAndHttpHost().'/blog',
                'priority' => priorityStatus('/blog')],
        ];

        $article = Article::where('publish', 0)
            ->select(['slug', 'updated_at'])
            ->get();
        $articleCategories = Category::where('model', 'article')
            ->where('show', 1)
            ->whereHas('getArticle')
            ->select('id', 'name', 'slug', 'updated_at')
            ->orderBy('name', 'desc')
            ->get();

        $productCategories = Category::where('model', 'product')
            ->where('show', 1)
            ->whereHas('getProduct')
            ->select('id', 'name', 'slug', 'updated_at')
            ->orderBy('name', 'desc')
            ->get();

        $products = Products::where('status' ,1)
            ->where('stock', '>', 0)
            ->select(['id', 'name', 'slug', 'price','short_detail','photo', 'updated_at'])
            ->get();


        foreach ($products as $product) {
            $productSlug = ! blank($product->slug) ? $product->slug : slug_format($product->name);
            $urls[] = [
                'date' => date("Y-m-d\Th:m:s+00:00", $product->updated_at->timestamp),
                'url' => route('frontend.product_detail',$productSlug), //request()->schemeAndHttpHost().'/urunler/'.,

                'priority' => priorityStatus('urunler/'.$productSlug),
            ];
        }
        foreach ($productCategories as $cat) {
            $catSlug = ! blank($cat->slug) ? $cat->slug : slug_format($cat->name);
            $urls[] = [
                'date' => date("Y-m-d\Th:m:s+00:00", $cat->updated_at->timestamp),
                'url' => route('frontend.page',$catSlug),     //request()->schemeAndHttpHost().'/'.$catSlug.'/'.$cat->id,
                'priority' => priorityStatus($catSlug),
            ];
        }

        foreach ($article as $art) {
            $artSlug = ! blank($art->slug) ? $art->slug : slug_format($art->name);

            $urls[] = [
                'date' => date("Y-m-d\Th:m:s+00:00", $art->updated_at->timestamp),
                'url' => request()->schemeAndHttpHost().'/blog/'.$artSlug,
                'priority' => priorityStatus('/blog/'.$artSlug),
            ];
        }
        $sitemapContent = view('sitemap', compact('urls'))->render();
        file_put_contents(public_path('sitemap.xml'), $sitemapContent);

        return back();
    }

}

if (! function_exists('priorityStatus')) {
    function priorityStatus($url): string
    {
        $urlLength = strlen($url);

        // Belirli bir çarpanı kullanarak priority değerini hesapla
        $priority = 1.00 - ($urlLength * 0.01);

        // Priority değerini sınırla (0.00 - 1.00 arasında)
        $priority = max(0.00, min(1.00, $priority));

        return number_format($priority, 1); // 2 ondalık basamaklı olarak formatla

    }
}

if (! function_exists('categories')) {
    function categories($model, $limit = 10)
    {
        $categories = Category::parentNull()->where('model', $model)
            ->where('show', 1)
            ->select('id', 'name', 'slug', 'updated_at')
            ->orderBy('name', 'desc')->limit($limit)
            ->get();

        return $categories;
    }
}
