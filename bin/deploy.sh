#!/usr/bin/env bash

set -e

if [[ "false" != "$TRAVIS_PULL_REQUEST" ]]; then
	echo "Not deploying pull requests."
	exit
fi

if [[ "master" != "$TRAVIS_BRANCH" ]]; then
	echo "Not on the 'master' branch."
	exit
fi

rm -rf .git
rm -r .gitignore

echo ".eslintrc
.travis.yml
README.md
bin
gulpfile.js
node_modules
package.json
package-lock.json
phpcs.ruleset.xml
src
tests
tmp
.vscode" > .gitignore

git init
git config user.name "Olein-jp"
git config user.email "koji.kuno@gmail.com"
git add .
git commit -m "Update from travis $TRAVIS_COMMIT"
git push --force --quiet "https://${GH_TOKEN}@github.com/${TRAVIS_REPO_SLUG}.git" master:release > /dev/null 2>&1