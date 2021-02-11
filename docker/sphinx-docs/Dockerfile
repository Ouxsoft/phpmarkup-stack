FROM debian:buster
#FROM sphinxdoc/sphinx
#FROM python:slim
LABEL maintainer="Sphinx Team <https://www.sphinx-doc.org/>"

RUN apt-get update \
 && apt-get install --no-install-recommends -y \
      graphviz \
      imagemagick \
      make \
      python3 \
      python3-pip \
      doxygen \
      bash \
 && apt-get autoremove \
 && apt-get clean \
 && rm -rf /var/lib/apt/lists/*

RUN python3 -m pip install --no-cache-dir -U pip
RUN python3 -m pip install --no-cache-dir Sphinx==3.4.3 Pillow
RUN pip install sphinxcontrib-phpdomain \
 && pip install sphinx_rtd_theme \
 && pip install doxyphp2sphinx


# Need rstgenerator.py from https://github.com/silverfoxy/doxyphp2sphinx
# or it will not build

# to build docs run
# doxygen
# doxyphp2sphinx Ouxsoft::LivingMarkup

WORKDIR "/app/docs"