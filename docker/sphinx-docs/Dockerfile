#FROM sphinxdoc/sphinx
FROM debian:buster
#FROM python:slim
LABEL maintainer="Sphinx Team <https://www.sphinx-doc.org/>"

WORKDIR /docs
RUN apt-get update \
 && apt-get install --no-install-recommends -y \
      graphviz \
      imagemagick \
      make \
      python3 \
      python3-pip \
 && apt-get autoremove \
 && apt-get clean \
 && rm -rf /var/lib/apt/lists/*

RUN python3 -m pip install --no-cache-dir -U pip
RUN python3 -m pip install --no-cache-dir Sphinx==3.4.3 Pillow
RUN pip install sphinxcontrib-phpdomain \
 && pip install sphinx_rtd_theme