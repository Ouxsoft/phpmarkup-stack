# LivingMarkupDev

A stack environment dedicated to continuously deploying the [LivingMarkup](https://github.com/ouxsoft/LivingMarkup) 
package.

## Getting Started

Clone repo using [Git](https://git-scm.com/downloads).
```shell script
git clone --recurse-submodules git@github.com:ouxsoft/livingmarkup-dev.git
```

Start the stack environment using the shell script and [Docker](https://www.docker.com/products/docker-desktop).
```shell script
./stack start
```

After making code changes to `./app` sub module repository use pipeline to test and deploy.

| Service | URL | Username | Password |
| --- | --- | --- | --- |
| CI/CD Pipeline | http://cd.localhost/blue/ | admin | admin |


### Need help?
```shell script
./stack help
```