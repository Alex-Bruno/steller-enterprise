<?php

namespace App\Entity;

use App\Entity\traits\EntityTrait;
use App\Repository\RequestsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RequestsRepository::class)
 */
class Requests
{
    use EntityTrait;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $route;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $routeName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $method;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $controller;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $routeParams = [];

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $firewallContext;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $accessControlAtributes = [];

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $paramters = [];

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $query = [];

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $remoteAddr;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $files = [];

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $content = [];


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRoute(): ?string
    {
        return $this->route;
    }

    public function setRoute(?string $route): self
    {
        $this->route = $route;

        return $this;
    }

    public function getMethod(): ?string
    {
        return $this->method;
    }

    public function setMethod(?string $method): self
    {
        $this->method = $method;

        return $this;
    }

    public function getController(): ?string
    {
        return $this->controller;
    }

    public function setController(?string $controller): self
    {
        $this->controller = $controller;

        return $this;
    }

    public function getRouteParams(): ?array
    {
        return $this->routeParams;
    }

    public function setRouteParams(?array $routeParams): self
    {
        $this->routeParams = $routeParams;

        return $this;
    }

    public function getFirewallContext(): ?string
    {
        return $this->firewallContext;
    }

    public function setFirewallContext(?string $firewallContext): self
    {
        $this->firewallContext = $firewallContext;

        return $this;
    }

    public function getAccessControlAtributes(): ?array
    {
        return $this->accessControlAtributes;
    }

    public function setAccessControlAtributes(?array $accessControlAtributes): self
    {
        $this->accessControlAtributes = $accessControlAtributes;

        return $this;
    }

    /**
     * @return array
     */
    public function getParamters(): ?array
    {
        return $this->paramters;
    }

    /**
     * @param array $paramters
     */
    public function setParamters(?array $paramters): Requests
    {
        $this->paramters = $paramters;
        return $this;
    }

    /**
     * @return array
     */
    public function getQuery(): ?array
    {
        return $this->query;
    }

    /**
     * @param array $query
     */
    public function setQuery(?array $query): Requests
    {
        $this->query = $query;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRemoteAddr()
    {
        return $this->remoteAddr;
    }

    /**
     * @param mixed $remoteAddr
     */
    public function setRemoteAddr($remoteAddr): Requests
    {
        $this->remoteAddr = $remoteAddr;
        return $this;
    }

    /**
     * @return array
     */
    public function getFiles(): ?array
    {
        return $this->files;
    }

    /**
     * @param array $files
     */
    public function setFiles(?array $files): Requests
    {
        $this->files = $files;
        return $this;
    }

    /**
     * @return array
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param array $content
     */
    public function setContent($content): Requests
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRouteName()
    {
        return $this->routeName;
    }

    /**
     * @param mixed $routeName
     */
    public function setRouteName($routeName): Requests
    {
        $this->routeName = $routeName;
        return $this;
    }

}
