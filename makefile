default: test

test:
	php run-test.php

doc:
	./build-doc
prod:
	git push
	update-defun-bubujka-org.sh
