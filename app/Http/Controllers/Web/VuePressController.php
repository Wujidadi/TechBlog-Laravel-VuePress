<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;
use Illuminate\Contracts\View\View as WebPageView;
use Illuminate\Contracts\View\Factory as WebPageViewFactory;
use App\Enum\LegalFrontendAssetTypes;

class VuePressController extends Controller
{
    private const VIEW_PATH = 'vuepress';

    private $path;
    private $asset;
    private $assetExtension;

    public function index(HttpRequest $request, string $path = 'index'): WebPageView|WebPageViewFactory
    {
        $this->path = preg_replace(['/.html?$/', '/\/+$/'], '', $path);
        if ($page = $this->getPage()) return $page;
        abort(404);
    }

    public function getAsset(string $asset): HttpResponse
    {
        $this->asset = strtolower(preg_replace('/\?.*$/', '', $asset));
        if (!$this->isAssetTypeLegal()) {
            return abort(404);
        }

        $assetExtension = pathinfo($asset, PATHINFO_EXTENSION);

        $contents = File::get(public_path("/vuepress/assets/{$this->asset}" ));
        $response = Response::make($contents);
        switch ($assetExtension) {
            case 'css':
                $response->header('Content-Type', 'text/css');
                break;
            case 'js':
                $response->header('Content-Type', 'application/javascript');
                break;
            case 'svg':
                $response->header('Content-Type', 'image/svg+xml');
                break;
            case 'htm':
            case 'html':
                $response->header('Content-Type', 'text/html');
                break;
        }
        return $response;
    }

    private function getPage(): WebPageView|WebPageViewFactory|false
    {
        if (is_file(public_path(self::VIEW_PATH . "/{$this->path}.html"))) {
            return view($this->getView());
        }
        if (is_file(public_path(self::VIEW_PATH . "/{$this->path}/index.html"))) {
            return view($this->getView('index'));
        }
        return false;
    }

    private function getView(?string $subPage = null): string
    {
        return self::VIEW_PATH . '.' . preg_replace('/\//', '.', $this->path) . (is_null($subPage) ? '' : ".{$subPage}");
    }

    private function isAssetTypeLegal(): bool
    {
        $this->assetExtension = pathinfo($this->asset, PATHINFO_EXTENSION);
        return !is_null(LegalFrontendAssetTypes::tryFrom($this->assetExtension));
    }
}
