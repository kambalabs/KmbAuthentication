Kamba Authentication Core module
==================================

This module provides basics for managing authentication in Kamba.
It assumes that another module will provide a class that implements Zend\Authentication\Adapter\AdapterInterface.
This class should be accessible through the 'KmbAuthentication\Adapter' key of the main Service Manager.
