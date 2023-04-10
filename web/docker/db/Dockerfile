FROM postgres:11.5-alpine
ENV POSTGRES_DB=ist-web
ENV POSTGRES_PASSWORD=ist
ENV POSTGRES_USER=ist
COPY ./init.sql /docker-entrypoint-initdb.d/