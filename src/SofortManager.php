<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Sofort.
 *
 * (c) Brian Faust <hello@basecode.sh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Artisanry\Sofort;

use GrahamCampbell\Manager\AbstractManager;
use Illuminate\Contracts\Config\Repository;
use Sofort\SofortLib\Sofortueberweisung;

class SofortManager extends AbstractManager
{
    /**
     * The factory instance.
     *
     * @var \Artisanry\Sofort\SofortFactory
     */
    private $factory;

    /**
     * Create a new Sofort manager instance.
     *
     * @param \Illuminate\Contracts\Config\Repository $config
     * @param \Artisanry\Sofort\SofortFactory         $factory
     */
    public function __construct(Repository $config, SofortFactory $factory)
    {
        parent::__construct($config);

        $this->factory = $factory;
    }

    /**
     * Create the connection instance.
     *
     * @param array $config
     *
     * @return mixed
     */
    protected function createConnection(array $config): Sofortueberweisung
    {
        return $this->factory->make($config);
    }

    /**
     * Get the configuration name.
     *
     * @return string
     */
    protected function getConfigName(): string
    {
        return 'laravel-sofort';
    }

    /**
     * Get the factory instance.
     *
     * @return \Artisanry\Sofort\SofortFactory
     */
    public function getFactory(): SofortFactory
    {
        return $this->factory;
    }
}
