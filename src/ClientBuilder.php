<?php
/**
 * @copyright Copyright &copy; LuckyOnline, lucky.online, 2019
 * @package
 * @version   1.0.0
 */

namespace Lucky\RequestLogger;

/**
 * @author LuckyOnline
 * @since  1.0
 */
class ClientBuilder
{
    /**
     * Формирование клиента
     *
     * @param array $config
     * @return ClientInterface
     */
    public function build(array $config) :ClientInterface
    {
        $client = new Client();
        $entityManager = $config['entityManager'] ?? [];
        $entityManager = is_object($entityManager) ? $entityManager : $this->createEntityManager($entityManager);

        return $client->setEntityManager($entityManager);
    }

    /**
     * @param array $entityManager
     *
     * @return EntityManagerInterface
     */
    public function createEntityManager(array $entityManager)
    {
        return (new ClientEntityManagerBuilder())->build($entityManager);
    }
}