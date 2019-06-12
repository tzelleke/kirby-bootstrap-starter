<?php

if (!function_exists('mix')) {
    function mix($path)
    {
        static $manifest = [];

        $publicPath = option('kbs.mix-public-path', '/assets');

        // Get the manifest contents
        if (!$manifest) {
            $manifestPath = $publicPath . '/mix-manifest.json';
            if (!F::exists($manifestPath)) {
                if (option('debug')) {
                    throw new Exception('The Mix manifest does not exists.');
                } else {
                    return false;
                }
            }
            $manifest = json_decode(F::read($manifestPath), 'json');
        }
        // Check if the manifest contains the given $path
        if (!array_key_exists($path, $manifest)) {
            if (option('debug')) {
                throw new Exception("Unable to locate Mix file: {$path}.");
            } else {
                return false;
            }
        }
        // Get the actual file path for the given $path
        $assetPath = $publicPath . $manifest[$path];
        // Use the appropriate Kirby helper method to get the correct HTML tag
        $ext = F::extension($assetPath);
        if (Str::contains($ext, 'css')) {
            return css($assetPath);
        } elseif (Str::contains($ext, 'js')) {
            return js($assetPath);
        }

        if (option('debug')) {
            throw new Exception("File type not recognized");
        }

        return false;
    }
}