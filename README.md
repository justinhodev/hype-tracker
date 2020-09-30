# HypeTracker

**THIS PROJECT IS CURRENTLY BEING REWORKED, SEE [FEAT-ADD-LARAVEL](https://github.com/justinhodev/hype-tracker/tree/feat-add-laravel) BRANCH FOR CURRENT PROGRESS**

---

Full stack web application to read data from public APIs (Twitter, Reddit) and form visualizations

## Project Goals

Show data about sneakers and statistics about the sneaker’s attention / mentions on social media platforms such as Twitter, or Reddit. Learn and adopt SQL schemas and a RDBMS(MariaDB) in a full stack PHP application.

## Getting Started

1. Fork repo to local env
2. Insert SQL file into SQL db
3. Serve /public and /private file from htdocs of Apache Web server
 
## Preview
 
![Home Page](https://drive.google.com/uc?id=1xU7lYyvumVjkm1PG30kXKnk6x-kq2V6b)
 
![Details Page](https://drive.google.com/uc?id=1V51ncFXquCTAvmTnvHwCG9HVi4ARSBHf)
 
 
## Relational Schema

Sneaker (sneaker_id, brand_id, name, release_date, image, price) Brand (brand_id, name, logo)
Ranking (sneaker_id, score, number_of_mentions, platform) Watchlist (member_id, sneaker_id)
Member (member_id, firstname, lastname, email, password)

## ER Diagram
 
![ER Diagram for HypeTracker](https://drive.google.com/uc?id=19X_iqno1i3W6VNwfzVnspqPaOSlnhO2o)
 
## SQL Diagram
 
![SQL Diagram for HypeTracker](https://drive.google.com/uc?id=1FCBYIPStsIxyOIXcg5Hy2jnWGgCUFP5s)
