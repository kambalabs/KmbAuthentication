Kamba Authentication Core module
==================================
[![Build Status](https://secure.travis-ci.org/kambalabs/KmbAuthentication.png?branch=master)](http://travis-ci.org/kambalabs/KmbAuthentication)
[![Coverage Status](https://coveralls.io/repos/kambalabs/KmbAuthentication/badge.png?branch=master)](https://coveralls.io/r/kambalabs/KmbAuthentication)

This module provides basics for managing authentication in Kamba.
It assumes that another module will provide a class that implements Zend\Authentication\Adapter\AdapterInterface.
This class should be accessible through the 'KmbAuthentication\Adapter' key of the main Service Manager.