How do I test this?
===================

### How do I mock a method on the object I am testing?

You can use a partial mock where you stub out a single method. See FacebookPageTest.php. Here, I stub out the _request_ method so that it doesnt make a network call. I mock it out and configure it to return a string of JSON in my test. I just want to test that the _fetch_ method calls _request_ AND parses json correctly.