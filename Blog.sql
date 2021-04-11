CREATE TABLE Users (
    firstname VARCHAR(25),
    lastname VARCHAR(25),
    username VARCHAR(20),
    pass VARCHAR(255),
    profileImage LONGBLOB,
    isAdmin BOOLEAN,
    PRIMARY KEY (username)
);

CREATE TABLE Blogs (
    blogID VARCHAR(60),
    blogName VARCHAR(50),
    blogText VARCHAR(8000),
    blogImage LONGBLOB,
    uploadDate DATETIME,
    username VARCHAR(20),
    likes INT,
    views INT,
    PRIMARY KEY(blogID),
    FOREIGN KEY (username) REFERENCES Users(username)
);

CREATE TABLE Comments (
    blogID VARCHAR(60),
    username VARCHAR(20),
    commentText VARCHAR(1000),
    FOREIGN KEY (username) REFERENCES Users(username),
    FOREIGN KEY (blogID) REFERENCES Blogs(blogID)
);

CREATE TABLE Likes (
    liked BOOLEAN,
    username VARCHAR(20),
    blogID VARCHAR(60),
    FOREIGN KEY (username) REFERENCES Users(username),
    FOREIGN KEY (blogID) REFERENCES Blogs(blogID)
);