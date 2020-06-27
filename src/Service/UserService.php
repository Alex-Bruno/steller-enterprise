<?php


namespace App\Service;


use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\UsageTrackingTokenStorage;

class UserService
{
    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @var UsageTrackingTokenStorage
     */
    protected $tokenStorage;

    public function __construct(EntityManager $em, ContainerInterface $container, UsageTrackingTokenStorage $tokenStorage)
    {
        $this->em = $em;
        $this->container = $container;
        $this->tokenStorage = $tokenStorage;
    }

    public function verificPassword($password = null)
    {
        if (!$password) {
            return 'user.blank_password';
        }
        if (strlen($password) < 8) {
            return 'user.invalid_password_lengh';
        }
        if (is_numeric($password)) {
            return 'user.invalid_password_numeric';
        }
        return true;
    }
}