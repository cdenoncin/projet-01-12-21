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
        REFERENCES Users (id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS Comments
(
    id        int(255) NOT NULL AUTO_INCREMENT,
    content   text,
    author_id int(255),
    post_id   int(255),
    PRIMARY KEY (id),
    CONSTRAINT fk_comment_author_id FOREIGN KEY (author_id)
        REFERENCES Users (id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_post_id FOREIGN KEY (post_id)
        REFERENCES Posts (id) ON DELETE CASCADE ON UPDATE CASCADE
);


INSERT INTO Users (first_name, last_name, mail, is_admin, password)
values ("Timothée", "DURAND", "timothee.durand70@gmail.com", 1, "123");
INSERT INTO Posts (title, content, thumbnail_url, publication_date, author_id)
values ("Test",
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ornare ante a erat aliquam, vitae eleifend diam hendrerit. Praesent pulvinar libero odio, quis euismod ipsum faucibus maximus. Aliquam feugiat neque urna, nec tincidunt nunc maximus quis. Maecenas euismod id metus nec bibendum. Mauris eu posuere sem, quis facilisis dui. Ut volutpat et lectus sit amet consequat. Curabitur quis erat sit amet tellus malesuada eleifend a vitae nisl.Aenean ut elit in metus accumsan porttitor id ut ligula. Phasellus facilisis lorem vestibulum arcu varius, ut sagittis est vehicula. Aenean massa leo, dictum dapibus ex quis, posuere hendrerit ante. Phasellus eleifend, elit consequat porta facilisis, est arcu tristique tellus, non pharetra mi mauris eget libero. Maecenas varius dignissim orci sit amet consectetur. Praesent eget consectetur lectus, sit amet consequat massa. Proin lorem nibh, sodales ut diam et, convallis mollis elit. Donec eget vehicula nunc. Cras laoreet purus urna, eget vulputate sem suscipit ac. Cras elementum lacus at dolor porta dignissim. Nullam nunc arcu, feugiat vitae consectetur nec, molestie vel metus. Sed eu consequat arcu, a efficitur ante. Fusce blandit ex at pretium auctor. Aliquam vestibulum vehicula ipsum. Fusce rhoncus accumsan urna, in tincidunt sapien consequat sit amet. Mauris vitae tempus ligula.",
        "/upload/mer.png", "2021-01-01 13:00:00", "1");
INSERT INTO Comments (content, author_id, post_id)
values ("Test", "1", "1");
