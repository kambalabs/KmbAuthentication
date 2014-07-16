<?php
namespace KmbAuthenticationTest\Model;

use KmbAuthentication\Model\User;

class UserTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function canAddRole()
    {
        $user = new User();
        $user->setRoles(array('guest'));

        $user->addRole('admin');

        $this->assertEquals(array('guest', 'admin'), $user->getRoles());
    }
}
