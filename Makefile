install:
	composer install

brain-games:
	./bin/brain-games

brain-even:
	./bin/brain-even

brain-gcd:
	./bin/brain-gcd

brain-gcd:
	./bin/brain-progression

validate:
	composer validate

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin
