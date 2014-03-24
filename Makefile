.PHONY: init
init:
	php initdb.php
.PHONY: delete
delete:
	php deletedb.php
