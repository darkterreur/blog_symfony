<?php

namespace AdminBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class Main implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $menu->addChild('Page admin', array('route' => 'index'));

        // access services from the container!
        $em = $this->container->get('doctrine')->getManager();

        // findMostRecent and Blog are just imaginary examples
        $post = $em->getRepository('CommonBundle:Post')->findMostRecent();

       // $menu->addChild('Article le plus récent', array(
       //     'route' => 'post_show',
       //     'routeParameters' => array('id' => $post->getId())
      //  ));
        $menu->addChild('Article le plus récent', array(
            'route' => 'post_show',
            'routeParameters' => array('id' => $post->getId())
        ));
        // create another menu item
//        $menu->addChild('About Me', array('route' => 'about'));

        // you can also add sub level's to your menu's as follows
//        $menu['About Me']->addChild('Edit profile', array('route' => 'edit_profile'));

        // ... add more children

        return $menu;
    }
}