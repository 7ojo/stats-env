FROM debian:stretch
RUN apt-get update -qq
RUN apt-get install -qq -o=Dpkg::Use-Pty=0 -y\
 procps\
 collectd-core\
 netcat\
 inetutils-syslogd\
 libmicrohttpd12\
 libprotobuf-c1
