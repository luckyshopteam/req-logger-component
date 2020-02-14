<?php
/**
 * @copyright Copyright &copy; LuckyOnline, lucky.online, 2019
 * @package
 * @version   1.0.0
 */

namespace Lucky\RequestLogger;

use Lucky\RequestLogger\Message\Queue;

/**
 * @author LuckyOnline
 * @since  1.0
 */
class ClientEntityManagerBuilder
{
    /**
     * @param array $config
     *
     * @return EntityManagerInterface
     */
    public function build(array $config): EntityManagerInterface
    {
        $manager = new EntityManager();

        $queue = $config['queue'] ?? [];
        $queue = is_object($queue) ? $queue : $this->createQueue($queue);

        return $manager->setQueue($queue);
    }

    /**
     * @param array $config
     *
     * @return Queue
     */
    public function createQueue($config)
    {
        return new Queue($config);
    }
}