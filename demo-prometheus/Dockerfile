FROM debian:stretch
RUN echo "deb http://ftp.debian.org/debian stretch-backports main" > /etc/apt/sources.list.d/stretch-backports.list
RUN apt-get update -qq
RUN apt-get install -qq -o=Dpkg::Use-Pty=0 -y\
 procps\
 netcat\
 inetutils-syslogd
RUN apt-get install -qq -o=Dpkg::Use-Pty=0 -y -t stretch-backports\
 prometheus
