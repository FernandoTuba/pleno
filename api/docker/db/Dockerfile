FROM postgres:11.5-alpine
ENV POSTGRES_DB=ist-api
ENV POSTGRES_PASSWORD=ist
ENV POSTGRES_USER=ist
COPY ./init.sql /docker-entrypoint-initdb.d/