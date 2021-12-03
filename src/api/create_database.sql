CREATE DATABASE IF NOT EXISTS CMS;

CREATE TABLE IF NOT EXISTS Users
(
    id         int NOT NULL AUTO_INCREMENT,
    first_name varchar(255),
    last_name  varchar(255),
    mail       varchar(255),
    is_admin   boolean,
    password   varchar(255),
    PRIMARY KEY (id)
);


CREATE TABLE IF NOT EXISTS Posts
(
    id               int NOT NULL AUTO_INCREMENT,
    title            varchar(255),
    content          text,
    thumbnail_url    varchar(255),
    publication_date date,
    author_id        int(255),
    PRIMARY KEY (id),
    CONSTRAINT fk_author_id FOREIGN KEY (author_id)
        REFERENCES Users (id)
);

CREATE TABLE IF NOT EXISTS Comment
(
    id        int(255) AUTO_INCREMENT,
    content   text,
    author_id int(255),
    post_id   int(255),
    PRIMARY KEY (id),
    CONSTRAINT fk_comment_author_id FOREIGN KEY (author_id)
        REFERENCES Users (id),
    CONSTRAINT fk_post_id FOREIGN KEY (post_id)
        REFERENCES Posts (id)
)
