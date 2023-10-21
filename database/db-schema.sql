CREATE TABLE users (
    user_id INT NOT NULL,
    user_name TEXT,
    user_pass TEXT,
    PRIMARY KEY (user_id)
)


CREATE TABLE apods (
    apod_id SERIAL NOT NULL,
    copyright TEXT,
    photo_date DATE,
    explanation TEXT,
    hdurl TEXT,
    title TEXT,
    PRIMARY KEY (apod_id)
)

CREATE TABLE favorites (
    user_id INT NOT NULL,
    apod_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (apod_id) REFERENCES apods(apod_id)
)
