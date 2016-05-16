#!/bin/bash

set -eu

# If jenkins sets the branch, listen to it.
branch=${GIT_BRANCH:-$(git rev-parse --abbrev-ref HEAD)}
imgtag=${branch#*/}

docker build --pull -t partup/blog:$imgtag .
docker build --pull -t partup/blogcache:$imgtag cache

tag=$(git describe --exact-match 2>/dev/null || echo "")
if [ $tag ]; then
  docker tag partup/blog:$imgtag partup/blog:$tag
  docker tag partup/blogcache:$imgtag partup/blogcache:$tag

  docker push partup/blog:$tag
  docker push partup/blogcache:$tag
fi

docker push partup/blog:$imgtag
docker push partup/blogcache:$imgtag
