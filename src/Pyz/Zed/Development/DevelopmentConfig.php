<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace Pyz\Zed\Development;

use FilesystemIterator;
use Spryker\Zed\Development\DevelopmentConfig as SprykerDevelopmentConfig;

class DevelopmentConfig extends SprykerDevelopmentConfig
{
    /**
     * @return string
     */
    public function getCodingStandard(): string
    {
        return APPLICATION_ROOT_DIR . DIRECTORY_SEPARATOR . 'phpcs.xml';
    }

    /**
     * @param string $namespace
     *
     * @return string|null
     */
    public function getPathToInternalNamespace(string $namespace): ?string
    {
        $pathToSprykerRoot = $this->checkPathToSprykerRoot($namespace);
        if ($pathToSprykerRoot) {
            return $pathToSprykerRoot;
        }

        if (array_key_exists($namespace, $this->getPathsToInternalNamespace())) {
            $mergedInternalNamespacesToPathMapping =
                static::INTERNAL_NAMESPACES_TO_PATH_MAPPING + parent::INTERNAL_NAMESPACES_TO_PATH_MAPPING;

            if ($this->featureExists()) {
                $mergedInternalNamespacesToPathMapping[self::NAMESPACE_SPRYKER_FEATURE] = APPLICATION_ROOT_DIR . DIRECTORY_SEPARATOR . 'vendor/spryker/spryker/Features/';
            }

            return $mergedInternalNamespacesToPathMapping[$namespace];
        }

        return null;
    }

    /**
     * @return array<string>
     */
    public function getPathsToInternalNamespace(): array
    {
        $pathToSprykerRoot = $this->checkPathToSprykerRoot(static::NAMESPACE_SPRYKER);
        $sprykerNamespacePath = $pathToSprykerRoot ? [static::NAMESPACE_SPRYKER => $pathToSprykerRoot] : [];

        $pathsToInternalNamespace = $sprykerNamespacePath + static::INTERNAL_NAMESPACES_TO_PATH_MAPPING + parent::INTERNAL_NAMESPACES_TO_PATH_MAPPING;

        if ($this->featureExists()) {
            $pathsToInternalNamespace[self::NAMESPACE_SPRYKER_FEATURE] = APPLICATION_ROOT_DIR . DIRECTORY_SEPARATOR . 'vendor/spryker/spryker/Features/';
        }

        return $pathsToInternalNamespace;
    }

    /**
     * @project Only needed in nonsplit projects.
     *
     * @return bool
     */
    protected function featureExists(): bool
    {
        $featuresDir = APPLICATION_VENDOR_DIR . '/spryker/spryker/Features/';

        if (is_dir($featuresDir)) {
            $iterator = new FilesystemIterator($featuresDir, FilesystemIterator::SKIP_DOTS);
            foreach ($iterator as $fileinfo) {
                if ($fileinfo->isDir()) {
                    return true;
                }
            }
        }

        return false;
    }
}
