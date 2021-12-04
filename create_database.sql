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
    publication_date datetime,
    author_id        int(255),
    PRIMARY KEY (id),
    CONSTRAINT fk_author_id FOREIGN KEY (author_id)
    REFERENCES Users (id)  ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS Comments
(
    id        int(255) NOT NULL AUTO_INCREMENT,
    content   text,
    author_id int(255),
    post_id   int(255),
    PRIMARY KEY (id),
    CONSTRAINT fk_comment_author_id FOREIGN KEY (author_id)
        REFERENCES Users (id)  ON DELETE CASCADE ON UPDATE CASCADE ,
    CONSTRAINT fk_post_id FOREIGN KEY (post_id)
        REFERENCES Posts (id)  ON DELETE CASCADE ON UPDATE CASCADE
);


INSERT INTO Users (first_name, last_name, mail, is_admin, password) values ("Timothée","DURAND", "timothee.durand70@gmail.com", 1, "123");
INSERT INTO Posts (title, content, thumbnail_url, publication_date, author_id) values ("Test","Un bel article", "https://source.unsplash.com/random", "2021-01-01 13:00:00", "1");
INSERT INTO Comments (content, author_id, post_id) values ("Test","1", "1");
