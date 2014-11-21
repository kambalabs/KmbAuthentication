<?php
/**
 * @copyright Copyright (c) 2014 Orange Applications for Business
 * @link      http://github.com/kambalabs for the sources repositories
 *
 * This file is part of Kamba.
 *
 * Kamba is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * (at your option) any later version.
 *
 * Kamba is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Kamba.  If not, see <http://www.gnu.org/licenses/>.
 */
namespace KmbAuthentication\Listener;

use KmbAuthentication\Controller\AuthenticatedControllerInterface;
use Zend\EventManager\AbstractListenerAggregate;
use Zend\EventManager\EventManagerInterface;
use Zend\Mvc\Controller\ControllerManager;
use Zend\Mvc\MvcEvent;

abstract class AbstractAuthenticationListener extends AbstractListenerAggregate
{
    protected $priority = -1;

    /**
     * Attach one or more listeners
     *
     * Implementors may add an optional $priority argument; the EventManager
     * implementation will pass this to the aggregate.
     *
     * @param EventManagerInterface $events
     *
     * @return void
     */
    public function attach(EventManagerInterface $events)
    {
        $events->attach(
            MvcEvent::EVENT_ROUTE,
            function (MvcEvent $event) {
                /** @var ControllerManager $controllerManager */
                $controllerManager = $event->getTarget()->getServiceManager()->get('ControllerManager');
                $routeMatch = $event->getRouteMatch();
                if (isset($routeMatch)) {
                    $controller = $controllerManager->get($routeMatch->getParam('controller'));
                    if ($controller instanceof AuthenticatedControllerInterface) {
                        $this->authenticate($event);
                    }
                }
            },
            $this->priority
        );
    }

    abstract public function authenticate(MvcEvent $event);
}
