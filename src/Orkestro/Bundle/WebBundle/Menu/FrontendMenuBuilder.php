<?php

namespace Orkestro\Bundle\WebBundle\Menu;

use Orkestro\Bundle\WebBundle\Event\ConfigureMenuEvent;
use Symfony\Component\HttpFoundation\Request;

class FrontendMenuBuilder extends AbstractMenuBuilder
{
    public function createMainMenu(Request $request)
    {
        $menu = $this->factory->createItem('root');

//        $menu->addChild('dashboard', array(
//                'route' => 'orkestro_backend_dashboard',
//            ))->setLabel($this->translate('orkestro.backend.dashboard'));

        $this->eventDispatcher->dispatch(ConfigureMenuEvent::FRONTEND_MAIN, new ConfigureMenuEvent($this->factory, $menu));

        return $menu;
    }
}