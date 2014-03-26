.PHONY: init
init:
	php initdb.php
.PHONY: delete
delete:
	php deletedb.php
.PHONY: test_api
test_api:
	cd tests && php phpunit.phar --bootstrap autoload.php testApi && cd ..
