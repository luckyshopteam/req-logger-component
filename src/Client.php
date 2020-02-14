<?php
/**
 * @copyright Copyright &copy; LuckyOnline, lucky.online, 2019
 * @package
 * @version   1.0.0
 */

namespace Lucky\RequestLogger;

use Lucky\RequestLogger\Entity\LogInterface;

/**
 * @author LuckyOnline
 * @since  1.0
 */
class Client implements ClientInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @param LogInterface $entity
     * @param string       $queue
     *
     * @return void
     */
    public function log(LogInterface $entity, string $queue = Queues::REQUEST_LOG_QUEUE): void
    {
        $this->entityManager->push($entity, $queue);
    }

    /**
     * @param EntityManagerInterface $manager
     *
     * @return ClientInterface
     */
    public function setEntityManager(EntityManagerInterface $manager): ClientInterface
    {
        $this->entityManager = $manager;

        return $this;
    }
}