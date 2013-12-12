How do I test this in PHPUnit?
==============================

### How do I mock a method on the object I am testing?

You can create a partial mock that stubs out a method. 

See partial-mocks/FacebookPageTest.php. 

Here, I stub out the _request_ method so that it doesnt make a network call. I mock it out and configure it to return a string of JSON in my test. I just want to test that the _fetch_ method calls _request_ AND parses json correctly. If you do this a lot, you might want to refactor your code so that the mocked method is on an object that gets injected into this class. However, sometimes you want to just use a partial mock to preserve the API. This is like spying in Javascript tests.


### Dependency Injection

See di/FacebookPageTest.php

Here I create a mock for the FileConnector class. The mock object's _get()_ method is configured with some expectations. It must be called _with()_ the correct url and it _will()_ return some static JSON.


### Dependency Injection with Interfaces

See di-interfaces/FacebookPageTest.php

Similar to the previous example, here I create a mock object that implements RemoteConnectorInterface. Now, anything that implements this interface can be injected into the FacebookPage class as a dependency.

### References

* [with()](http://phpunit.de/manual/current/en/test-doubles.html#test-doubles.mock-objects.examples.SubjectTest2.php)
* will()
	* $this->returnValue($someValue)
* expects()
	* $this->once()
	* $this->any()
	* $this->exactly(4)

### Tips

As noted in the documentation, "By default, all methods of the given class are replaced with a test double that just returns NULL unless a return value is configured using will($this->returnValue()), for instance."

When using the mock builder, if you call _setMethods()_, only the methods specified here will be replaced with your configurable test double that you set up. The other methods will behave as normal. 