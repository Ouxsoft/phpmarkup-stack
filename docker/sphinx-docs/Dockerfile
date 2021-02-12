FROM debian:buster
#FROM sphinxdoc/sphinx
#FROM python:slim

LABEL os="debian" \
    service="doxyphp2sphinx"

RUN apt-get update \
 && apt-get install --no-install-recommends -y \
      graphviz \
      imagemagick \
      make \
      python3 \
      python3-pip \
      doxygen \
      bash \
      bash-completion \
      wget \
 && apt-get autoremove \
 && apt-get clean \
 && rm -rf /var/lib/apt/lists/*

RUN python3 -m pip install --no-cache-dir -U pip
RUN python3 -m pip install --no-cache-dir Sphinx==3.4.3 Pillow
RUN pip install sphinxcontrib-phpdomain \
 && pip install sphinx_rtd_theme \
 && pip install doxyphp2sphinx

# Need rstgenerator.py from https://github.com/silverfoxy/doxyphp2sphinx
# otherwise docs won't build
# PR made https://github.com/mike42/doxyphp2sphinx/pull/5

RUN apt-get update \
 && apt-get install --no-install-recommends -y \
    wget \
 && apt-get autoremove \
 && apt-get clean \
 && rm -rf /var/lib/apt/lists/* \
 && wget https://raw.githubusercontent.com/silverfoxy/doxyphp2sphinx/master/doxyphp2sphinx/rstgenerator.py \
    -O /usr/local/lib/python3.7/dist-packages/doxyphp2sphinx/rstgenerator.py

WORKDIR "/app/docs"

SHELL ["/bin/bash", "-c"]

#RUN /app/docs/build.sh