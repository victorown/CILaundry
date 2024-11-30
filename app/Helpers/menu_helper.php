<?php
if (!function_exists('isActive')) {
    /**
     * Check if the current route matches the given path.
     *
     * @param string $route Path to compare with current route.
     * @return string Returns 'active current-page' if matches, otherwise empty string.
     */
    function isActive(string $route): string
    {
        $currentPath = service('uri')->getPath(); // Get the current URI path
        return $currentPath === $route ? 'active current-page' : '';
    }
}
