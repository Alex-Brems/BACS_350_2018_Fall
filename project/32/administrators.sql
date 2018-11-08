-- Admin Table SQL

CREATE TABLE administrators (
    
    id          INT             NOT NULL  AUTO_INCREMENT,
    email       VARCHAR(255)    NOT NULL,    
    password    VARCHAR(255)    NOT NULL,
    firstName   VARCHAR(60),
    lastName    VARCHAR(60),
    PRIMARY KEY (id)
    
);

INSERT INTO administrators (id, email, password, firstName, lastName) VALUES
(1, 'me@here.com', '$2y$10$kt.ud3scq2nHS7HlHpcT6OB7ffrPUUO3w3fEAX8wdaE7733S.VzAO', 'Mark', 'Seaman');


