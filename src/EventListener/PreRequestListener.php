<?php


namespace App\EventListener;

use App\Entity\Requests;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpKernel\Event\ControllerArgumentsEvent;
use Symfony\Component\Security\Core\Authentication\Token\Storage\UsageTrackingTokenStorage;

class PreRequestListener
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

    protected function createNewEntityManager()
    {

        return $this->em->create(
            $this->em->getConnection(),
            $this->em->getConfiguration(),
            $this->em->getEventManager()
        );
    }

    public function onKernelControllerarguments(ControllerArgumentsEvent $event)
    {
        try {
            $entity = new Requests();

            $entity->setRoute($event->getRequest()->getUri())
                ->setRouteName($event->getRequest()->attributes->get('_route'))
                ->setMethod($event->getRequest()->getMethod())
                ->setController($event->getRequest()->attributes->get('_controller'))
                ->setRouteParams($event->getRequest()->attributes->get('_route_params'))
                ->setFirewallContext($event->getRequest()->attributes->get('_firewall_context'))
                ->setAccessControlAtributes($event->getRequest()->attributes->get('_access_control_attributes'))
                ->setParamters($event->getRequest()->request->all())
                ->setQuery($event->getRequest()->query->all())
                ->setRemoteAddr($event->getRequest()->getClientIp())
                ->setFiles($event->getRequest()->files->all());

            if ($this->tokenStorage->getToken() and gettype($this->tokenStorage->getToken()->getUser()) != 'string') {
                $entity->setCreatedBy($this->tokenStorage->getToken()->getUser());
            }

            if ($event->getRequest()->getContent(false)) {
                $entity->setContent($event->getRequest()->getContent(false));
            }

            if ($entity->getRouteName() != '_wdt') {
                $em = $this->createNewEntityManager();
                $em->persist($entity);
                $em->flush();
            }
        } catch (\Exception $e) {

        }

        try {
            $em = $this->createNewEntityManager();
            $enterprise = $em->getRepository('App:Enterprise')->findOneBy([]);
            $session = new Session();
            $session->set('enterprise', $enterprise);
        }catch (\Exception $e) {

        }
    }
}