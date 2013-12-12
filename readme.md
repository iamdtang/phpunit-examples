How do I test this in PHPUnit?
==============================

### How do I mock a method on the object I am testing?

You can create a partial mock that stubs out a method. 

See partial-mocks/FacebookPageTest.php. 

Here, I stub out the _request_ method so that it doesnt make a network call. I mock it out and configure it to return a string of JSON in my test. I just want to test that the _fetch_ method calls _request_ AND parses json correctly. If you do this a lot, you might want to refactor your code so that the mocked method is on an object that gets injected into this class. However, sometimes you want to just use a partial mock to preserve the API. This is like spying in Javascript tests.


### Dependency Injection

See di/FacebookPageTest.php

Here I create a mock for the FileConnector class. The mock object's _get()_ method is configured to return some static JSON.


### Dependency Injection with Interfaces

See di-interfaces/FacebookPageTest.php

Here I create a mock object that implements RemoteConnectorInterface. The mock object's _get()_ method is configured to return some static JSON.


### Tips

As noted in the documentation, "By default, all methods of the given class are replaced with a test double that just returns NULL unless a return value is configured using will($this->returnValue()), for instance."

When using the mock builder, if you call _setMethods()_, only the methods specified here will be replaced with your configurable test double that you set up. The other methods will behave as normal. 