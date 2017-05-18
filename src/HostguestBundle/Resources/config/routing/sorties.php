<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('sorties_index', new Route(
    '/',
    array('_controller' => 'HostguestBundle:Sorties:index'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('sorties_show', new Route(
    '/{id}/show',
    array('_controller' => 'HostguestBundle:Sorties:show'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('sorties_new', new Route(
    '/new',
    array('_controller' => 'HostguestBundle:Sorties:new'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('sorties_search', new Route(
    '/search',
    array('_controller' => 'HostguestBundle:Sorties:search'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('sorties_edit', new Route(
    '/edit/{id}',
    array('_controller' => 'HostguestBundle:Sorties:edit'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('sorties_delete', new Route(
    '/{id}/delete',
    array('_controller' => 'HostguestBundle:Sorties:delete'),
    array(),
    array(),
    '',
    array(),
    array('DELETE')
));

return $collection;
