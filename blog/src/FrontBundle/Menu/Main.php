<?php

namespace FrontBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class Main implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $menu->addChild('Page d\'accueil', array('route' => 'index'));
        $menu->addChild('Créer un compte', array('route' => 'user_new'));
        $menu->addChild('Connexion', array('route' => 'fos_user_security_login'));
        $menu->addChild('Créer un article', array('route' => 'post_new'));

        // access services from the container!
        $em = $this->container->get('doctrine')->getManager();

        // findMostRecent and Blog are just imaginary examples
        $post = $em->getRepository('CommonBundle:Post')->findMostRecent();

        if ($post) {
            $menu->addChild('Article le plus récent', array(
                'route' => 'post_show',
                'routeParameters' => array('id' => $post->getId())
            ));
        }

        // create another menu item
//        $menu->addChild('About Me', array('route' => 'about'));

        // you can also add sub level's to your menu's as follows
//        $menu['About Me']->addChild('Edit profile', array('route' => 'edit_profile'));

        // ... add more children

        return $menu;
    }
}