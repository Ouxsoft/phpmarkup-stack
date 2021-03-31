<p align="center"><img src="https://github.com/Ouxsoft/phpmarkup/raw/master/docs/logo.jpg" width="350"></p>

# PHPMarkup Stack

A stack environment dedicated to continuously deploying the [PHPMarkup](https://github.com/Ouxsoft/phpmarkup) 
package.

## Getting Started

Clone repo using [Git](https://git-scm.com/downloads).
```shell script
git clone --recurse-submodules git@github.com:ouxsoft/phpmarkup-stack.git
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
