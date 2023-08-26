<?php

namespace Hasnayeen\Mdb;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\GithubFlavoredMarkdownExtension;
use League\CommonMark\MarkdownConverter;

class MdbServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/mdb.php', 'mdb'
        );
    }
    public function boot(): void
    {
        Str::macro('mdb', function (string $string, array $config = []): string {
            $environment = new Environment($config);

            $extensions = config('mdb.extensions');

            $environment->addExtension(new CommonMarkCoreExtension());
            $environment->addExtension(new GithubFlavoredMarkdownExtension());
            $environment->addExtension(new BladeComponentExtension());

            foreach ($extensions as $extension) {
                $environment->addExtension(new $extension());
            }

            $converter = new MarkdownConverter($environment);

            return (string) $converter->convert($string);
        });
    }
}
