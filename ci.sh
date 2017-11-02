#!/bin/bash

set -eu

# If jenkins sets the branch, listen to it.
branch=${GIT_BRANCH:-$(git rev-parse --abbrev-ref HEAD)}
imgtag=${branch#*/}

# Getting private plugins from s3 bucket..
mkdir -p private-blog-plugins
rm -rf private-blog-plugins/*
aws s3 cp --recursive s3://partops/private-blog-plugins/ private-blog-plugins/

docker build --squash --pull -t partup/blog:$imgtag .
docker build --squash --pull -t partup/blogcache:$imgtag cache

tag=$(git describe --exact-match 2>/dev/null || echo "")
if [ $tag ]; then
  echo "On a tag, setting tags as well for tag '$tag'"
  docker tag partup/blog:$imgtag partup/blog:$tag
  docker tag partup/blogcache:$imgtag partup/blogcache:$tag

  docker push partup/blog:$tag
  docker push partup/blogcache:$tag
fi

docker push partup/blog:$imgtag
docker push partup/blogcache:$imgtag
