# Northwind 

I produced a UI using vanilla PHP, PDO and SQLite to read, create and delete data from a database. 

## Note

- Security is not taken into consideration as this is just a project to practice my SQL skills.

## Running Site

This site has been containerised using docker. To run the container, head to the terminal and run

```bash
cd northwind
```

```bash
docker build -t marvinobig/northwind .   
```

```bash
docker run -it --rm -p 8888:8080 marvinobig/northwind
```