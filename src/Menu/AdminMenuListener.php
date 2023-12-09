<?php

namespace App\Menu;

use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

final class AdminMenuListener
{
    public function addAdminMenuItems(MenuBuilderEvent $event): void
    {
        $menu = $event->getMenu();

        $newSubmenu = $menu
            ->addChild('new')
            ->setLabel('MENU ADMIN PERSO')
        ;

        $newSubmenu
            ->addChild('new-subitem')
            ->setLabel('Création de pages')
            ->setUri('/admin/pages')
            ->setLabelAttribute('icon', 'book')
            ->setLabelAttribute('color', 'blue')
        ;
    }
}