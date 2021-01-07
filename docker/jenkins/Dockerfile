FROM jenkinsci/blueocean:latest
#FROM jenkins/jenkins:lts

ENV JAVA_OPTS="-Djenkins.install.runSetupWizard=false"

COPY security.groovy /usr/share/jenkins/ref/init.groovy.d/security.groovy

ENV JENKINS_OPTS="--httpPort=8081"

#--argumentsRealm.roles.user=admin --argumentsRealm.passwd.admin=${JENKINS_PASSWORD} --argumentsRealm.roles.admin=admin"