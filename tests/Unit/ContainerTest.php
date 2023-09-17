<?php

use Core\Container;

test('it can resovle sosmething out of the container', function () {
    $container = new Container();

    $container->bind('foo', fn () => 'bar');

    $result = $container->resolve('foo');
    expect($result)->toEqual('bar');
});
